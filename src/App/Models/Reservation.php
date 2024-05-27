<?php

declare(strict_types=1);

namespace App\Models;

use DateTime;
use Framework\Model;
use PDO;

class Reservation extends Model
{
    protected function getTable(): string
    {
        return "reservations";
    }

    protected function validate(array $data): void
    {

        // Vérifier que la date est au bon format : 04/25/2024
        if (!$this->isValidDate($data['date'])) {
            $this->addError('date', 'La date doit être au format MM/DD/YYYY.');
        }

        // Vérifier que le temps est au format 16:00
        if (!$this->isValidTime($data['time'])) {
            $this->addError('time', 'Le temps doit être au format HH:MM.');
        }

        // Vérifier que la date est supérieure à la date du jour
        $currentDate = new DateTime();
        $reservationDate = DateTime::createFromFormat('m/d/Y', $data['date']);
        if (!$reservationDate || $reservationDate <= $currentDate) {
            $this->addError('date', 'La date doit être postérieure à la date du jour.');
        }

        // Vérifier que la date choisie n'est pas plus de 2 mois après la date actuelle
        $twoMonthsLater = (clone $currentDate)->modify('+2 months');
        if ($reservationDate > $twoMonthsLater) {
            $this->addError('date', 'La date ne peut pas être plus de deux mois après la date actuelle.');
        }

        // Vérifier que la date est bien un string
        if (!is_string($data['date'])) {
            $this->addError('date', 'La date doit être une chaîne de caractères.');
        }

        // Vérifier que le créneau n'a pas encore été réservé
        if ($this->isTimeReserved($data['date'], $data['time'])) {
            $this->addError('time', 'Ce créneau est déjà réservé.');
        }
    }

    private function isValidDate(string $date): bool
    {
        $d = DateTime::createFromFormat('m/d/Y', $date);
        return $d && $d->format('m/d/Y') === $date;
    }

    private function isValidTime(string $time): bool
    {
        return preg_match('/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/', $time) === 1;
    }

    private function isTimeReserved(string $date, string $time): bool
    {
        $sql = "SELECT COUNT(*) FROM {$this->getTable()} WHERE date = :date AND time = :time";
        $conn = $this->database->getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":date", $date, PDO::PARAM_STR);
        $stmt->bindValue(":time", $time, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function getReservedTimes(): array
    {
        $sql = "SELECT date, time FROM {$this->getTable()} WHERE date >= :today";
        $conn = $this->database->getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":today", date('Y-m-d'), PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createReservation(array $data): bool
    {
        // Validate input data
        $this->validate($data);
        if (!empty($this->errors)) {
            return false;
        }

        // Prepare SQL statement
        $sql = "INSERT INTO {$this->getTable()} (name, first_name, email, context, date, time) VALUES (:name, :first_name, :email, :context, :date, :time)";

        // Get database connection
        $conn = $this->database->getConnection();
        $stmt = $conn->prepare($sql);

        // Bind values
        $stmt->bindValue(":name", $data['name'], PDO::PARAM_STR);
        $stmt->bindValue(":first_name", $data['first_name'], PDO::PARAM_STR);
        $stmt->bindValue(":email", $data['email'], PDO::PARAM_STR);
        $stmt->bindValue(":context", $data['context'], PDO::PARAM_STR);
        $stmt->bindValue(":date", $data['date'], PDO::PARAM_STR);
        $stmt->bindValue(":time", $data['time'], PDO::PARAM_STR);

        // Execute statement and handle errors
        if ($stmt->execute()) {
            return true;
        } else {
            $this->addError('database', 'Error creating reservation in the database.');
            return false;
        }
    }

    public function getReservations(): array
    {
        $sql = "SELECT * FROM {$this->getTable()}";

        $conn = $this->database->getConnection();
        $stmt = $conn->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateReservation(int $id, array $data): bool
    {

        $sql = "UPDATE {$this->getTable()} SET name = :name, first_name = :first_name, email = :email, context = :context, date = :date, time = :time WHERE id = :id";
        $conn = $this->database->getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":name", $data['name'], PDO::PARAM_STR);
        $stmt->bindValue(":first_name", $data['first_name'], PDO::PARAM_STR);
        $stmt->bindValue(":email", $data['email'], PDO::PARAM_STR);
        $stmt->bindValue(":context", $data['context'], PDO::PARAM_STR);
        $stmt->bindValue(":date", $data['date'], PDO::PARAM_STR);
        $stmt->bindValue(":time", $data['time'], PDO::PARAM_STR);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            $this->addError('database', 'Error updating reservation in the database.');
            return false;
        }
    }

    public function getReservationById(int $id): array | false
    {
        $sql = "SELECT * FROM {$this->getTable()} WHERE id = :id";
        $conn = $this->database->getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
