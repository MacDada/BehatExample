<?php

declare(strict_types=1);

namespace Dvdnwk\BehatExample;

interface UserAwardsAssigner
{
    public function assignAward(User $user, int $place): void;
}
