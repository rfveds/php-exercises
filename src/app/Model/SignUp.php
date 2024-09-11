<?php

declare(strict_types=1);

namespace App\Model;

class SignUp extends Model
{
    public function __construct(
        private readonly User $user
    ) {
        parent::__construct();
    }

    public function register(string $email, string $name, string $password): int
    {
        try {
            $this->db->beginTransaction();

            $userId = $this->user->create($email, $name, $password);

            $this->db->commit();
        } catch (\Throwable $e) {
            if ($this->db->inTransaction()) {
                $this->db->rollBack();
            }
            throw $e;
        }

        return $userId;
    }

}