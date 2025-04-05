<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login'); // Menampilkan halaman login
    }

    public function processLogin()
    {
        $session = session();
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                // Simpan data user ke session
                $session->set([
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'isLoggedIn' => true
                ]);

                return redirect()->to('/dashboard');
            } else {
                return redirect()->back()->with('error', 'Password salah');
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak ditemukan');
        }
    }

    public function register()
    {
        return view('auth/register'); // Menampilkan halaman register
    }

    public function processRegister()
    {
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');

        // Validasi
        if ($password !== $confirmPassword) {
            return redirect()->back()->with('error', 'Konfirmasi password tidak cocok');
        }

        // Cek apakah username sudah digunakan
        if ($userModel->where('username', $username)->first()) {
            return redirect()->back()->with('error', 'Username sudah digunakan');
        }

        // Simpan ke database
        $userModel->insert([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT), // Hash password
            'role' => 'user'
        ]);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
