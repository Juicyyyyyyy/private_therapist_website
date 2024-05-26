<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Mail;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;
use App\Services\ContactForm\MailService;

class ContactForm extends Controller
{
    public function __construct(private Mail $model)
    {
    }

    public function sendContactForm()
    {

        $data = [
            "name" => $this->request->post["name"],
            "first_name" => $this->request->post["first_name"],
            "email" => $this->request->post["email"],
            "message" => $this->request->post["message"],
            "datetime" => date('Y-m-d H:i:s'),
        ];

        $mailService = new MailService();
        $mailToClientContent = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Email</title>
    <style>
        .bg-gray-100 {
            background-color: #F3F4F6;
        }
        .container {
            margin-left: auto;
            margin-right: auto;
            padding-left: 1rem;
            padding-right: 1rem;
            padding-top: 2.5rem;
            padding-bottom: 2.5rem;
            max-width: 28rem;
            background-color: #FFF;
            border-width: 1px;
            border-style: solid;
            border-color: #D1D5DB;
            border-radius: 0.375rem;
        }
        .text-2xl {
            font-size: 1.5rem;
            line-height: 2rem;
            font-weight: 600;
        }
        .font-bold {
            font-weight: 700;
        }
        .text-gray-700 {
            color: #4B5563;
        }
        .mb-4 {
            margin-bottom: 2rem;
        }
        .flex {
            display: flex;
        }
        .justify-center {
            justify-content: center;
        }
        .mb-6 {
            margin-bottom: 1.5rem;
        }
        .w-40 {
            width: 10rem;
        }
        .h-auto {
            height: auto;
        }
        .rounded {
            border-radius: 0.375rem;
        }
        .content {
            margin-bottom: 2rem;
        }
        .text-base {
            font-size: 1rem;
            line-height: 1.5rem;
        }
        .text-gray-600 {
            color: #6B7280;
        }
        .signature {
            margin-bottom: 0;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-10 bg-white max-w-md rounded-lg border border-gray-300">
        <h1 class="text-2xl font-bold text-gray-700 mb-4" style="text-align: center;">
            Votre message a bien été reçu
        </h1>
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tr>
                <td align="center">
                    <img src="https://cdn.dribbble.com/users/104235/screenshots/9154634/media/b70d24cd469085ece6d83633b6e58a29.png?resize=1000x750&vertical=center" alt="Corentin Dupaigne" class="w-40 h-auto rounded">
                </td>
            </tr>
        </table>
        <div class="content mb-8">
            <p class="text-base text-gray-600">
                Bonjour M.{$data["name"]},<br><br>
                Je vous remercie de m'avoir contactée. Je reviendrai vers vous d'ici peu.
                <br><br>
                Bien cordialement,
                <br><br>
                <em>Ceci est un mail automatisé. Merci de ne pas y répondre directement.</em>
            </p>
        </div>
        <div class="signature">
            <p class="text-base font-bold text-gray-700">
                Céline Allainmat
            </p>
        </div>
    </div>
</body>
</html>
HTML;

        $mailToSelfContent = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        .container {
            font-family: Arial, sans-serif;
            margin: 0 auto;
            padding: 20px;
            max-width: 600px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
        }
        .content {
            margin-bottom: 20px;
        }
        .content p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Nouveau message reçu, envoyé depuis le formulaire du site </h2>
        <div class="content">
            <p><strong>Name:</strong> {$data['first_name']} {$data['name']}</p>
            <p><strong>Email:</strong> {$data['email']}</p>
            <p><strong>Message:</strong> {$data['message']}</p>
            <p><strong>Received on:</strong> {$data['datetime']}</p>
        </div>
    </div>
</body>
</html>
HTML;

        // Encode the subject to ensure correct character encoding
        $encodedSubjectToSelf = "=?UTF-8?B?" . base64_encode("Nouveau message de {$data['first_name']} {$data['name']}") . "?=";
        $encodedSubjectToClient = "=?UTF-8?B?" . base64_encode("Votre mail a bien été reçu - (réponse automatisée)") . "?=";

        $mailToSelf = $mailService->sendMail($_ENV["MAIL_RECEIVER"], $encodedSubjectToSelf, $mailToSelfContent);
        $mailToClient = $mailService->sendMail($data["email"], $encodedSubjectToClient, $mailToClientContent);

        if ($mailToSelf && $mailToClient) {

            $this->model->saveMail($data);
            return $this->view("Home/success_contact_form.mvc.php");
        } else {
            $this->model->addError('error', "Il y a eu une erreur lors de l'envoi du mail, veuillez réessayer plus tard ou bien m'envoyer un mail sur mon mail personnel : example@gmail.com");
            return $this->view("Home/index.mvc.php", [
                "errors" => $this->model->getErrors(),
            ]);
        }
    }

    public function success(): Response
    {
        return $this->view("Home/success.mvc.php");
    }
}
