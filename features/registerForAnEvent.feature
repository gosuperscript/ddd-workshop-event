Feature: Register for an event
  As a guest
  I want to register myself for an event
  So that I can attend the event

  Scenario: Registration happy path
    Given There is a published event with a capacity of 50
    When I register myself
    Then I should be registered
    And The capacity should be reduced by 1

  Scenario: Registration with capacity full
    Given There is a published event with a capacity of 1
    And And there is a registration
    When I register myself
    Then I should not be registered
