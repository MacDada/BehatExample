Feature: giving awards
  In order to reward users for participating in a contest
  Admins should be able to award them

  Scenario: Only admins can award users
    Given I am a user
    When I order to give away prizes
    Then I should be denied

  Scenario: Admins can award users for the first place
    Given I am an admin
    And there is user "Alice"
    When I assign user "Alice" place "1"
    Then user "Alice" should be given "car"

  Scenario: Admin can award user for the second place
    Given I am an admin
    And there is user "Bob"
    When I assign user "Bob" place "2"
    Then user "Bob" should be given "tv"

  Scenario: No award for a third place
    Given I am an admin
    And there is user "Foo"
    When I assign user "Foo" place "3"
    Then user "Foo" should not be given anything
