<?php

namespace spec\Dvdnwk\BehatExample;

use Dvdnwk\BehatExample\User;
use Dvdnwk\BehatExample\UserRepository;
use PhpSpec\ObjectBehavior;

class UserRepositorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(UserRepository::class);
    }

    function it_can_be_given_a_user(User $user)
    {
        $this->add($user);
    }

    function it_has_no_users_when_empty()
    {
        $this->findAll()->shouldReturn([]);
    }

    function it_returns_added_users(User $user1, User $user2)
    {
        $this->add($user1);
        $this->add($user2);

        $this->findAll()->shouldReturn([$user1, $user2]);
    }

    function it_doesnt_find_a_user_when_empty()
    {
        $this->findByName('Foo')->shouldReturn(null);
    }

    function it_finds_a_user_by_name()
    {
        $user = new User('Foo');

        $this->add($user);

        $this->findByName('Foo')->shouldReturn($user);
    }

    function it_finds_a_user_by_name_when_multiple_users()
    {
        $user = new User('Foo');

        $this->add(new User('Bar'));
        $this->add($user);

        $this->findByName('Foo')->shouldReturn($user);
    }
}
