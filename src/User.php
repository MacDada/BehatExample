<?php

declare(strict_types=1);

namespace Dvdnwk\BehatExample;

class User
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var bool
     */
    private $admin;

    public function __construct(string $name, bool $admin = false)
    {
        $this->name = $name;
        $this->admin = $admin;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isAdmin(): bool
    {
        return $this->admin;
    }
}
