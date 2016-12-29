<?php

declare(strict_types=1);

namespace spec\Dvdnwk\BehatExample;

use Dvdnwk\BehatExample\AuthorizationChecker;
use Dvdnwk\BehatExample\AuthorizationCheckerImpl;
use Dvdnwk\BehatExample\User;
use PhpSpec\ObjectBehavior;

class AuthorizationCheckerImplSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(null);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(AuthorizationCheckerImpl::class);
    }

    function it_is_authorization_checker()
    {
        $this->shouldHaveType(AuthorizationChecker::class);
    }

    public function it_grants_user_role_for_a_user()
    {
        $user = new User('');

        $this->beConstructedWith($user);

        $this->isGranted('user')
            ->shouldReturn(true);
    }

    public function it_does_not_grant_user_role_when_no_user()
    {
        $this->isGranted('user')
            ->shouldReturn(false);
    }

    public function it_grants_admin_role_when_user_is_admin()
    {
        $user = new User('', true);

        $this->beConstructedWith($user);

        $this->isGranted('admin')
            ->shouldReturn(true);
    }

    public function ir_does_not_grant_admin_role_when_no_user()
    {
        $this->isGranted('admin')
            ->shouldReturn(false);
    }

    public function it_does_not_grant_admin_role_when_user_is_not_admin()
    {
        $user = new User('');

        $this->beConstructedWith($user);

        $this->isGranted('admin')
            ->shouldReturn(false);
    }

    public function it_does_not_grant_unknown_roles_even_for_admins()
    {
        $user = new User('', true);

        $this->beConstructedWith($user);

        $this->isGranted('foo')
            ->shouldReturn(false);
    }

    public function it_allows_for_user_to_be_set()
    {
        $user = new User('');

        $this->setUser($user);

        $this->isGranted('user')
            ->shouldReturn(true);
    }

    public function it_allows_for_user_to_be_removed()
    {
        $user = new User('');

        $this->beConstructedWith($user);

        $this->setUser(null);

        $this->isGranted('user')
            ->shouldReturn(false);
    }
}
