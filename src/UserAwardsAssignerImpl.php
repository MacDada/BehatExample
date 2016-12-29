<?php

declare(strict_types=1);

namespace Dvdnwk\BehatExample;

class UserAwardsAssignerImpl implements UserAwardsAssigner
{
    public function assignAward(User $user, int $place): void
    {
        switch ($place) {
            case 1:
                $user->addAward('car');
                break;
            case 2:
                $user->addAward('tv');
                break;
            default:
                throw new \InvalidArgumentException();
        }
    }
}
