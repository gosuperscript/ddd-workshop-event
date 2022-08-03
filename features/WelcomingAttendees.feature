Feature: Welcoming attendees
    In order to let the event flow smoothly and as planned
    As a bouncer
    I want to let exactly the right attendees in

    Scenario: Attendee is on the list
        Given an attendee is registered
        When the attendee wants to enter
        Then the attendee is welcomed

    Scenario: Attendee had previously entered
        Given an attendee is registered
        When the attendee wants to enter
        Then the attendee is welcomed

    Scenario: Attendee is not on the list
        Given an attendee was never registered
        When the attendee wants to enter
        Then the attendee is bounced
