<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;
use App\Services\ContactForm\MailService;

class Reservations extends Controller
{
    public function __construct(private \App\Models\Reservation $model)
    {
    }

    public function index(): Response
    {
        $reserved_times = $this->model->getReservedTimes();

        return $this->view("Reservations/index.mvc.php", [
            "reserved_times" => $reserved_times,
            'errors' => $this->model->getErrors(),
        ]);
    }

    public function show(string $id): Response
    {
        $reservation = $this->getReservation($id);

        return $this->view("Reservations/show.mvc.php", [
            "reservation" => $reservation
        ]);
    }

    public function createReservation(): Response
    {
        $data = [
            "name" => $this->request->post["name"],
            "first_name" => $this->request->post["first_name"],
            "email" => $this->request->post["email"],
            "context" => $this->request->post["context"],
            "date" => $this->request->post["date"],
            "time" => $this->request->post["time"]
        ];

        $mailToClientContent = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Rendez-vous</title>
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
            Confirmation de votre rendez-vous
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
                Bonjour M. {$data["name"]},<br><br>
                Nous vous remercions d'avoir pris rendez-vous avec Céline Allainmat. Votre rendez-vous du {$data["date"]} à {$data["time"]} est désormais confirmé. Le rendez-vous aura lieu à l'adresse suivante : 123 Rue de la Psychologie, 75000 Paris.
                Si vous avez des questions ou besoin d'informations supplémentaires, n'hésitez pas à nous contacter par email à <a href="mailto:example@gmail.com">example@gmail.com</a> ou par téléphone au <a href="tel:+33617281822">06 17 28 18 22</a>.
                <br><br>
                Cordialement,
                <br><br>
                <em>Veuillez noter que ce message est généré automatiquement, merci de ne pas y répondre directement.</em>
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
    <title>Nouvelle Réservation</title>
</head>
<body>
    <h2>Nouvelle Réservation Confirmée</h2>
    <p>Une nouvelle réservation a été confirmée avec les détails suivants :</p>
    <ul>
        <li>Nom : {$data["name"]}</li>
        <li>Prénom : {$data["first_name"]}</li>
        <li>Email : {$data["email"]}</li>
        <li>Contexte : {$data["context"]}</li>
        <li>Date : {$data["date"]}</li>
        <li>Heure : {$data["time"]}</li>
    </ul>
</body>
</html>
HTML;

        $mailService = new MailService();

        // Encode the subject to ensure correct character encoding
        $encodedSubjectToSelf = "=?UTF-8?B?" . base64_encode("Nouvelle réservation confirmée le {$data["date"]} à {$data["time"]}") . "?=";
        $encodedSubjectToClient = "=?UTF-8?B?" . base64_encode("Votre rendez-vous est confirmé - (réponse automatisée)") . "?=";

        $mailToSelf = $mailService->sendMail($_ENV["MAIL_RECEIVER"], $encodedSubjectToSelf, $mailToSelfContent);
        $mailToClient = $mailService->sendMail($data["email"], $encodedSubjectToClient, $mailToClientContent);

        if ($this->model->createReservation($data)) {
            return $this->view("/Reservations/success.mvc.php");
        } else {
            return $this->view("Reservations/index.mvc.php", [
                "errors" => $this->model->getErrors(),
                "reservation" => $data
            ]);
        }
    }

    public function edit(string $id): Response
    {
        $reservation = $this->getReservation($id);

        return $this->view("Reservations/edit.mvc.php", [
            "reservation" => $reservation
        ]);
    }

    public function update(string $id): Response
    {
        $reservation = $this->getReservation($id);

        $reservation["name"] = $this->request->post["name"];
        $reservation["first_name"] = $this->request->post["first_name"];
        $reservation["email"] = $this->request->post["email"];
        $reservation["context"] = $this->request->post["context"];
        $reservation["date"] = $this->request->post["date"];
        $reservation["time"] = $this->request->post["time"];

        if ($this->model->update($id, $reservation)) {
            return $this->redirect("/reservations/{$id}/show");
        } else {
            return $this->view("Reservations/edit.mvc.php", [
                "errors" => $this->model->getErrors(),
                "reservation" => $reservation
            ]);
        }
    }

    public function delete(string $id): Response
    {
        $reservation = $this->getReservation($id);

        return $this->view("Reservations/delete.mvc.php", [
            "reservation" => $reservation
        ]);
    }

    public function destroy(string $id): Response
    {
        $this->model->delete($id);

        return $this->redirect("/reservations/index");
    }

    private function getReservation(string $id): array
    {
        $reservation = $this->model->find($id);

        if ($reservation === false) {
            throw new PageNotFoundException("Reservations not found");
        }

        return $reservation;
    }

    // Method to display the success confirmation page
    public function success(): Response
    {
        return $this->view("Reservations/success.mvc.php");
    }
}
