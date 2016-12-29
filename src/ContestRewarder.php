<?php

declare(strict_types=1);

namespace Dvdnwk\BehatExample;

class ContestRewarder
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var UserAwardsAssigner
     */
    private $userAwardsAssigner;

    /**
     * @var AuthorizationChecker
     */
    private $authorizationChecker;

    /**
     * todo: it should be not an array but a repository
     *
     * @var array
     */
    private $usersPlaces = [];

    public function __construct(
        UserRepository $userRepository,
        UserAwardsAssigner $userAwardsAssigner,
        AuthorizationChecker $authorizationChecker
    ) {
        $this->userRepository = $userRepository;
        $this->userAwardsAssigner = $userAwardsAssigner;
        $this->authorizationChecker = $authorizationChecker;
    }

    public function getUsersPlaces(): array
    {
        return $this->usersPlaces;
    }

    public function assignPlaceToUser($userName, $place): void
    {
        $this->usersPlaces[$userName] = $place;
    }

    /**
     * @throws NotAuthorizedException
     */
    public function giveAwayPrizes(): void
    {
        if (!$this->authorizationChecker->isGranted('admin')) {
            throw new NotAuthorizedException();
        }

        foreach ($this->usersPlaces as $userName => $place) {
            $user = $this->userRepository->findByName($userName);

            $this->userAwardsAssigner->assignAward($user, $place);
        }
    }
}
