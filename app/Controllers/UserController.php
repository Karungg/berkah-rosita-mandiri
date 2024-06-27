<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;

class UserController extends BaseController
{
    protected $db;

    protected $auth;

    protected $config;

    protected $helpers = ['form'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->config = config('auth');
        $this->auth = service('authentication');
    }

    public function index()
    {
        $users = $this->db
            ->query('SELECT * FROM users')
            ->getResultArray();

        return view('users/index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('users/create');
    }

    public function store()
    {
        $users = model(UserModel::class);

        $rules = [
            'username' => [
                'rules' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
                'errors' => [
                    'required' => 'Kolom Username harus diisi.',
                    'is_unique' => 'Username sudah tersedia.',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Kolom Email harus diisi.',
                    'valid_email' => 'Kolom Email harus berisi format email.',
                    'is_unique' => 'Email sudah tersedia.',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required' => 'Kolom Password harus diisi.',
                    'min_length' => 'Nomor Password berisi minimal 4 angka.',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Save the user
        $allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);
        $user = new User($this->request->getPost($allowedPostFields));

        $this->config->requireActivation === null ? $user->activate() : $user->generateActivateHash();

        // Ensure default group gets assigned if set
        if (!empty($this->config->defaultUserGroup)) {
            $users = $users->withGroup($this->config->defaultUserGroup);
        }

        if (!$users->save($user)) {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        if ($this->config->requireActivation !== null) {
            $activator = service('activator');
            $sent = $activator->send($user);

            if (!$sent) {
                return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
            }

            // Success!
            return redirect()->to(site_url('users'))->with('success', 'Tambah data user berhasil.');
        }

        // Success!
        return redirect()->to(site_url('users'))->with('success', 'Tambah data user berhasil.');
    }

    public function edit($id)
    {
        $user = $this->db->table('users')
            ->where('id', $id)
            ->get()
            ->getResultArray();

        return view('users/edit', [
            'user' => $user
        ]);
    }

    public function update()
    {
        if (!$this->request->is('put')) {
            return redirect()->to(site_url('users'));
        }

        if (!$this->validate([
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Kolom Email harus diisi.',
                    'valid_email' => 'Kolom Email harus berisi format email.',
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Username harus diisi.',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $passwordBeforeHash = $this->request->getPost('password');
        if (strlen($passwordBeforeHash) == 0) {
            $passwordBeforeHash = "12345678";
        }
        $password_hash = Password::hash($passwordBeforeHash);

        $this->db->table('users')
            ->where('id', $this->request->getPost('id'))
            ->update([
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'password_hash' => $password_hash,
                'updated_at' => Time::now()
            ]);

        return redirect()->to(site_url('users'))->with('success', 'Ubah data user berhasil.');
    }

    public function destroy($id)
    {
        if ($id == user_id()) {
            return redirect()->to(site_url('admin/users'))->with('error', 'Anda tidak dapat menghapus data anda sendiri.');
        }

        $this->db->table('auth_groups_users')->where('user_id', $id)->delete();
        $this->db->table('users')->where('id', $id)->delete();

        session()->setFlashdata('success', 'Data user berhasil dihapus.');

        return redirect()->to(base_url('users'));
    }
}
