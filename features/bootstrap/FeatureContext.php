<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Dvdnwk\BehatExample\ContestRewarder;
use Dvdnwk\BehatExample\User;
use Dvdnwk\BehatExample\UserRepository;

class FeatureContext implements Context
{
    /**
     * @var User
     */
    private $user;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var ContestRewarder
     */
    private $contestRewarder;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->contestRewarder = new ContestRewarder();
    }

    /**
     * @Given I am a user
     */
    public function iAmAUser()
    {
        $this->user = new User('');
    }

    /**
     * @When I order to give away prizes
     */
    public function iOrderToGiveAwayPrizes()
    {
        throw new PendingException();
    }

    /**
     * @Then I should be denied
     */
    public function iShouldBeDenied()
    {
        throw new PendingException();
    }

    /**
     * @Given I am an admin
     */
    public function iAmAnAdmin()
    {
        throw new PendingException();
    }

    /**
     * @Given there is user :name
     */
    public function thereIsUser($name)
    {
        $this->userRepository->add(new User($name));
    }

    /**
     * @When I assign user :name place :place
     */
    public function iAssignUserPlace($name, $place)
    {
        throw new PendingException();
    }

    /**
     * @Then user :name should be given :awardName
     */
    public function userShouldBeGiven($name, $awardName)
    {
        throw new PendingException();
    }

    /**
     * @Then user :name should not be given anything
     */
    public function userShouldNotBeGivenAnything($name)
    {
        throw new PendingException();
    }
}
