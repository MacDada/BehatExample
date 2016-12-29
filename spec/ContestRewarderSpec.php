<?php

declare(strict_types=1);

namespace spec\Dvdnwk\BehatExample;

use Dvdnwk\BehatExample\AuthorizationChecker;
use Dvdnwk\BehatExample\ContestRewarder;
use Dvdnwk\BehatExample\NotAuthorizedException;
use Dvdnwk\BehatExample\PlaceAsAwardAssigner;
use Dvdnwk\BehatExample\User;
use Dvdnwk\BehatExample\UserRepository;
use PhpSpec\ObjectBehavior;
use PhpSpec\Wrapper\Collaborator;
use Webmozart\Assert\Assert;

class ContestRewarderSpec extends ObjectBehavior
{
    function let(
        UserRepository $userRepository,
        AuthorizationChecker $authorizationChecker
    ) {
        $authorizationChecker->isGranted('admin')
            ->willReturn(false);

        $this->beConstructedWith(
            $userRepository,
            new PlaceAsAwardAssigner(),
            $authorizationChecker
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ContestRewarder::class);
    }

    function it_returns_no_places_when_none_were_given()
    {
        $this->getUsersPlaces()->shouldReturn([]);
    }

    function it_can_assign_places_to_users()
    {
        $this->assignPlaceToUser('John', 1);
        $this->assignPlaceToUser('Mark', 2);

        $this->getUsersPlaces()->shouldReturn([
            'John' => 1,
            'Mark' => 2,
        ]);
    }

    function it_gives_away_prizes_to_users(
        UserRepository $userRepository,
        AuthorizationChecker $authorizationChecker
    ) {
        $authorizationChecker->isGranted('admin')
            ->willReturn(true);

        $john = $this->mockUser($userRepository, 'John');
        $mark = $this->mockUser($userRepository, 'Mark');

        $this->assignPlaceToUser('John', 1);
        $this->assignPlaceToUser('Mark', 2);

        $this->giveAwayPrizes();

        Assert::same(['1'], $john->getAwards());
        Assert::same(['2'], $mark->getAwards());
    }

    function it_requires_admin_to_give_away_prizes_to_users()
    {
        $this->shouldThrow(NotAuthorizedException::class)
            ->during('giveAwayPrizes');
    }

    /**
     * @param UserRepository|Collaborator $userRepository
     * @param string                      $name
     * @return User
     */
    private function mockUser(Collaborator $userRepository, string $name): User
    {
        $user = new User($name);

        $userRepository
            ->findByName($name)
            ->willReturn($user);

        return $user;
    }
}
