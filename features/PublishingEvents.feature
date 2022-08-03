Feature: Publishing events
    In order to share knowledge and insights with the community
    As an Organizer
    I want to create and publish amazing events

    Scenario: Publishing an event
        Given I created an event with name "Superscript DDD Workshop"
        When I publish the event
        Then I should see the event published
