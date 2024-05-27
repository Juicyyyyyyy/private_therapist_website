<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Models\Mail;
use Framework\Controller;

class Mails extends Controller
{
    public function __construct(private Mail $model)
    {
    }

    public function index()
    {
        if (isset($_SESSION['user_id'])) {
            if ($this->model->isAdmin($_SESSION['user_id'])) {
                $mails = $this->model->getmails();

                return $this->view('Admin/mails.mvc.php', ['mails' => $mails,]);
            }
        }
        return $this->redirect('/login');
    }
}