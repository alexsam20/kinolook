<?php

namespace Kernel\Auth;

use Kernel\Config\ConfigInterface;
use Kernel\Database\DatabaseInterface;
use Kernel\Session\SessionInterface;

class Auth implements AuthInterface
{
    public function __construct(
        private readonly DatabaseInterface $db,
        private readonly SessionInterface  $session,
        private readonly ConfigInterface   $config
    )
    {
    }

    public function attempt(string $username, string $password): bool
    {
        $user = $this->db->first($this->table(), [
            $this->username() => $username,
        ]);

        if (!$user) {
            return false;
        }

        if (!password_verify($password, $user[$this->password()])) {
            return false;
        }

        $this->session->set($this->sessionField(), $user['id']);

        return true;
    }

    public function logout(): void
    {
        // TODO: Implement logout() method.
    }

    public function check(): bool
    {
        // TODO: Implement check() method.
    }

    public function user(): ?array
    {
        // TODO: Implement user() method.
    }

    public function table(): string
    {
        return $this->config->get('auth.table', 'users');
    }

    public function username(): string
    {
        return $this->config->get('auth.username', 'email');
    }

    public function password(): string
    {
        return $this->config->get('auth.password', 'password');
    }

    public function sessionField(): string
    {
        return $this->config->get('auth.session_field', 'user_id');
    }
}