<?php

declare(strict_types=1);

namespace spec\Dvdnwk\BehatExample;

use Dvdnwk\BehatExample\ContestRewarder;
use PhpSpec\ObjectBehavior;

class ContestRewarderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ContestRewarder::class);
    }
}
