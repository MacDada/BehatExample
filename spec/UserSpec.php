<?php

declare(strict_types=1);

namespace spec\Dvdnwk\BehatExample;

use Dvdnwk\BehatExample\User;
use PhpSpec\ObjectBehavior;

class UserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('');

        $this->shouldHaveType(User::class);
    }

    function it_has_a_name()
    {
        $this->beConstructedWith('John');

        $this->getName()->shouldReturn('John');
    }

    public function it_is_not_admin_by_default()
    {
        $this->beConstructedWith('John');

        $this->isAdmin()->shouldReturn(false);
    }

    function it_can_be_an_admin()
    {
        $this->beConstructedWith('John', true);

        $this->isAdmin()->shouldReturn(true);
    }
}
