<?php

declare(strict_types=1);

namespace spec\Dvdnwk\BehatExample;

use Dvdnwk\BehatExample\PlaceAsAwardAssigner;
use Dvdnwk\BehatExample\User;
use Dvdnwk\BehatExample\UserAwardsAssigner;
use PhpSpec\ObjectBehavior;
use Webmozart\Assert\Assert;

class PlaceAsAwardAssignerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(PlaceAsAwardAssigner::class);
    }

    function it_is_assigner()
    {
        $this->shouldHaveType(UserAwardsAssigner::class);
    }

    function it_assigns_user_the_same_award_as_is_place()
    {
        $user = new User('Mary');

        $this->assignAward($user, 2);

        Assert::same(['2'], $user->getAwards());
    }
}
