Feature: Register for an event
    In order to up my career by engaging with the community
    As an attendee
    I want to register myself for an event

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
