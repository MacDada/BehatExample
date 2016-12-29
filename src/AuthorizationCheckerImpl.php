<?php

declare(strict_types=1);

namespace Dvdnwk\BehatExample;

class AuthorizationCheckerImpl implements AuthorizationChecker
{
    /**
     * @var User|null
     */
    private $user;

    public function __construct(?User $user)
    {
        $this->user = $user;
    }

    public function isGranted(string $role): bool
    {
        if (null === $this->user) {
            return false;
        }

        switch ($role) {
            case 'user':
                return true;
            case 'admin':
                return $this->user->isAdmin();
            default:
                return false;

        }
    }

    public function setUser(?User $user): void
    {
        $this->user = $user;
    }
}
