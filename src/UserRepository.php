<?php

declare(strict_types=1);

namespace Dvdnwk\BehatExample;

class UserRepository
{
    /**
     * @var array|User[]
     */
    private $users = [];

    /**
     * @param User $user
     */
    public function add(User $user)
    {
        $this->users[] = $user;
    }

    /**
     * @return User[]
     */
    public function findAll(): array
    {
        return $this->users;
    }

    public function findByName(string $name): ?User
    {
        foreach ($this->users as $user) {
            if ($user->getName() === $name) {
                return $user;
            }
        }

        return null;
    }
}
