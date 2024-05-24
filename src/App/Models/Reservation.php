<?php

declare(strict_types=1);

namespace App\Models;

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
    }

    private function isValidDate(string $date): bool
    {
    }

    private function isValidTime(string $time): bool
    {
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
}
