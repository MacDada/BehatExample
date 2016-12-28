<?php

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
     * @return array|User[]
     */
    public function findAll()
    {
        return $this->users;
    }

    /**
     * @param string $name
     * @return User|null
     */
    public function findByName($name)
    {
        foreach ($this->users as $user) {
            if ($user->getName() === $name) {
                return $user;
            }
        }

        return null;
    }
}
