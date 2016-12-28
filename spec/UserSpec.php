<?php

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
}
