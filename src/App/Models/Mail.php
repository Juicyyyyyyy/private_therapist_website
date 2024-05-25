<?php

declare(strict_types=1);

namespace App\Models;

use DateTime;
use Framework\Model;
use PDO;

class Mail extends Model
{
    private string $name;
    private string $first_name;
    private string $email;
    private string $message;
    private string $datetime;

    protected function getTable(): string
    {
        return "mails";
    }

    protected function validate(array $data): void
    {
    }

    public function saveMail(array $data): bool
    {
        // Validate input data
        $this->validate($data);
        if (!empty($this->errors)) {
            return false;
        }

        // Prepare SQL statement
        $sql = "INSERT INTO {$this->getTable()} (name, first_name, email, message, datetime) VALUES (:name, :first_name, :email, :message, :datetime)";

        // Get database connection
        $conn = $this->database->getConnection();
        $stmt = $conn->prepare($sql);

        // Bind values
        $stmt->bindValue(":name", $data['name'], PDO::PARAM_STR);
        $stmt->bindValue(":first_name", $data['first_name'], PDO::PARAM_STR);
        $stmt->bindValue(":email", $data['email'], PDO::PARAM_STR);
        $stmt->bindValue(":message", $data['message'], PDO::PARAM_STR);
        $stmt->bindValue(":datetime", $data['datetime'], PDO::PARAM_STR);

        // Execute statement and handle errors
        if ($stmt->execute()) {
            return true;
        } else {
            $this->addError('database', 'Error creating reservation in the database.');
            return false;
        }
    }

    public function getmails(): array
    {
        $sql = "SELECT * FROM {$this->getTable()}";

        $conn = $this->database->getConnection();
        $stmt = $conn->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
