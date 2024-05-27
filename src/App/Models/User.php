<?php

declare(strict_types=1);

namespace App\Models;

use Framework\Model;
use PDO;

class User extends Model
{
    private string $username;
    private string $email;
    private string $password;
    private int $isAdmin;

    protected function getTable(): string
    {
        return "users";
    }

    protected function validate(array $data): void
    {
        if (empty($data["username"])) {
            $this->addError("username", "Username is required");
        }

        if (empty($data["email"])) {
            $this->addError("email", "Email is required");
        } elseif (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
            $this->addError("email", "Email is not a valid email address");
        }

        if (empty($data["password"])) {
            $this->addError("password", "Password is required");
        } elseif (strlen($data["password"]) < 6) {
            $this->addError("password", "Password must be at least 6 characters long");
        }
    }


    public function getTotal(): int
    {
        $sql = "SELECT COUNT(*) AS total FROM {$this->getTable()}";

        $conn = $this->database->getConnection();
        $stmt = $conn->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return (int)$row["total"];
    }

    public function findByUsername(string $username): array|false
    {
        $sql = "SELECT * FROM {$this->getTable()} WHERE username = :username";

        $conn = $this->database->getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":username", $username, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$user) {
            return false;
        }
        return $user;
    }

    public function findByEmail(string $email): array|false
    {
        $sql = "SELECT * FROM {$this->getTable()} WHERE email = :email";

        $conn = $this->database->getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$user) {
            return false;
        }
        return $user;
    }

    public function createUser(array $data): bool
    {
        // Validate input data
        $this->validate($data);
        if (!empty($this->errors)) {
            return false;
        }
        // Check if username or email already exists
        if ($this->findByEmail($data['email']) || $this->findByUsername($data['username'])) {
            $this->addError('user', 'Username or Email already exists.');
            return false;
        }

        // Prepare SQL statement
        $sql = "INSERT INTO {$this->getTable()} (username, email, password) VALUES (:username, :email, :password)";

        // Get database connection
        $conn = $this->database->getConnection();
        $stmt = $conn->prepare($sql);

        // Bind values
        $stmt->bindValue(":username", $data['username'], PDO::PARAM_STR);
        $stmt->bindValue(":email", $data['email'], PDO::PARAM_STR);
        $stmt->bindValue(":password", password_hash($data['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);

        // Execute statement and handle errors
        if ($stmt->execute()) {
            return true;
        } else {
            $this->addError('database', 'Error creating user in the database.');
            return false;
        }
    }
}
