<?php

namespace spec\Dvdnwk\BehatExample;

use Dvdnwk\BehatExample\User;
use Dvdnwk\BehatExample\UserAwardsAssignerImpl;
use PhpSpec\ObjectBehavior;
use Webmozart\Assert\Assert;

class UserAwardsAssignerImplSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(UserAwardsAssignerImpl::class);
    }

    function it_assigns_car_for_the_first_place()
    {
        $user = new User('');

        $this->assignAward($user, 1);

        Assert::same(['car'], $user->getAwards());
    }

    function it_assigns_tv_for_the_second_place()
    {
        $user = new User('');

        $this->assignAward($user, 2);

        Assert::same(['tv'], $user->getAwards());
    }

    function it_throws_on_other_places_than_first_and_second()
    {
        $user = new User('');

        $this->shouldThrow(\InvalidArgumentException::class)
            ->during('assignAward', [$user, 3]);
    }
}
