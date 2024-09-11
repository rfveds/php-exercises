<?php

namespace App\Model;

class User extends Model
{
    public function create(string $email, string $name, string $password, bool $isActive = true): int
    {
        $stmt = $this->db->prepare(
            'INSERT INTO users (email, name, is_active, password, created_at) VALUES (?, ?, ?, ?, NOW())'
        );
        $stmt->execute([$email, $name, $password, $isActive]);

        return (int)$this->db->lastInsertId();
    }

    public function findById(int $userId): array
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$userId]);

        return $stmt->fetch() ?: [];
    }
}