<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

class Reservations extends Controller
{
    public function __construct(private \App\Models\Reservation $model)
    {
    }

    public function index(): Response
    {
        $reservations = $this->model->getReservations();

        return $this->view("Reservations/index.mvc.php", [
            "reservations" => $reservations
        ]);
    }

    public function show(string $id): Response
    {
        $reservation = $this->getReservation($id);

        return $this->view("Reservations/show.mvc.php", [
            "reservation" => $reservation
        ]);
    }

    public function new(): Response
    {
        return $this->view("Reservations/new.mvc.php");
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

        if ($this->model->createReservation($data)) {
            return $this->view("/Reservations/success.mvc.php");
        } else {
            return $this->view("Reservations/new.mvc.php", [
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
