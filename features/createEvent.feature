Feature: Create event
  Organize an event
  As a Oraganizer
  I want to create events

  Scenario: Publishing an event
    Given I created an event with name "DDD Europe"
    When I publish the event
    Then I should see the event published
