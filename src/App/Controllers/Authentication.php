<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\Controller;
use Framework\Request;
use Framework\Response;
use App\Models\User;

class Authentication extends Controller
{
    public function __construct(private User $model)
    {
    }

    public function showRegisterForm(): Response
    {
        return $this->view('Authentication/register.mvc.php');
    }

    public function register(): Response
    {
        $data = [
            'username' => $this->request->post['username'] ?? '',
            'email' => $this->request->post['email'] ?? '',
            'password' => $this->request->post['password'] ?? '',
        ];

        if ($this->model->createUser($data)) {
            // Authenticate the user immediately after successful registration
            $this->authenticate($data['username'], $data['password']);
            return $this->redirect('/');
        } else {
            return $this->view('Authentication/register.mvc.php', [
                'errors' => $this->model->getErrors(),
                'data' => $data,
            ]);
        }
    }

    public function showLoginForm(): Response
    {
        if (isset($_SESSION['user_id'])) {
            if ($this->model->isAdmin($_SESSION['user_id'])) {
                return $this->view('Admin/index.mvc.php');
            }
        }

        return $this->view('Authentication/login.mvc.php');
    }

    public function login(): Response
    {
        $username = $this->request->post['username'] ?? '';
        $password = $this->request->post['password'] ?? '';

        if ($this->authenticate($username, $password)) {
            return $this->redirect('/admin');
        } else {
            return $this->view('Authentication/login.mvc.php', [
                'error' => 'Invalid credentials',
                'username' => $username,
            ]);
        }
    }

    public function logout(): Response
    {
        $this->clearAuthentication();
        return $this->redirect('/');
    }

    protected function authenticate(string $username, string $password): bool
    {
        $user = $this->model->findByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            return true;
        }

        return false;
    }

    protected function clearAuthentication(): void
    {
        unset($_SESSION['user_id']);
    }

}
