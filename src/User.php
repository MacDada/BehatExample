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

    /**
     * @var array|string[]
     */
    private $awards = [];

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

    /**
     * @return string[]
     */
    public function getAwards(): array
    {
        return $this->awards;
    }

    public function addAward(string $award): void
    {
        $this->awards[] = $award;
    }
}
