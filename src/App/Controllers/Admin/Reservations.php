<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Models\Reservation;
use Framework\Controller;

class Reservations extends Controller
{
    public function __construct(private Reservation $model)
    {
    }

    public function index()
    {
        if (isset($_SESSION['user_id'])) {
            if ($this->model->isAdmin($_SESSION['user_id'])) {
                $reservations = $this->model->getReservations();

                return $this->view('Admin/reservations.mvc.php', ['reservations' => $reservations,]);
            }
        }
        return $this->redirect('/login');
    }

    public function edit($id)
    {
        $id = intval($id);
        if (isset($_SESSION['user_id'])) {
            if ($this->model->isAdmin($_SESSION['user_id'])) {
                $reservation = $this->model->getReservationById($id);

                if (!$reservation) {
                    return $this->redirect('/admin/reservations');
                }

                return $this->view('Admin/edit_reservation.mvc.php', ['reservation' => $reservation]);
            }
        }
        return $this->redirect('/login');
    }

    public function update($id)
    {
        $id = intval($id);
        if (isset($_SESSION['user_id'])) {
            if ($this->model->isAdmin($_SESSION['user_id'])) {
                $data = [
                    'name' => $this->request->post["name"],
                    'first_name' => $this->request->post["first_name"],
                    'email' => $this->request->post["email"],
                    'context' => $this->request->post["context"],
                    'date' => $this->request->post["date"],
                    'time' => $this->request->post["time"]
                ];

                if ($this->model->updateReservation($id, $data)) {
                    return $this->redirect('/admin/reservations');
                } else {
                    $reservation = $this->model->getReservationById($id);
                    return $this->view('Admin/edit_reservation.mvc.php', [
                        'reservation' => $reservation,
                        'errors' => $this->model->getErrors()
                    ]);
                }
            }
        }
        return $this->redirect('/login');
    }
}