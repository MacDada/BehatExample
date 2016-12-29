<?php

namespace spec\Dvdnwk\BehatExample;

use Dvdnwk\BehatExample\NotAuthorizedException;
use PhpSpec\ObjectBehavior;

class NotAuthorizedExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(NotAuthorizedException::class);
    }

    function it_is_a_runtime_exception()
    {
        $this->shouldHaveType(\RuntimeException::class);
    }
}
