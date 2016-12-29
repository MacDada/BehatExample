<?php

declare(strict_types=1);

namespace Dvdnwk\BehatExample;

interface AuthorizationChecker
{
    public function isGranted(string $role): bool;
}
