<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Models\User;
use Framework\Controller;
use Framework\Response;

class Authentication extends Controller
{
    public function __construct(private User $model)
    {
    }

    public function index()
    {
        echo "Hello from a namespaced controller";
    }

    public function isAdmin(): Response
    {
        if (isset($_SESSION['user_id'])) {
            if ($this->model->isAdmin($_SESSION['user_id'])) {
                return $this->view('Admin/index.mvc.php');
            }
        }

        return $this->redirect('/login');
    }
}