<?php

declare(strict_types=1);

namespace Dvdnwk\BehatExample;

class PlaceAsAwardAssigner implements UserAwardsAssigner
{
    public function assignAward(User $user, int $place): void
    {
        $user->addAward((string) $place);
    }
}
