<?php

use Behat\Behat\Context\Context;
use Carbon\Carbon;
use Domains\Event\Commands\CreateEvent;
use Domains\Event\Commands\PublishEvent;
use Domains\Event\Events\EventPublished;
use Domains\Registration\Commands\RegisterAttendee;
use Domains\Registration\Events\AttendeeNotRegistered;
use Domains\Registration\Events\AttendeeRegistered;
use Domains\Registration\Events\AvailableCapacityReduced;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use League\Tactician\CommandBus;
use Ramsey\Uuid\Uuid;
use Tests\TestCase;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends TestCase implements Context
{
    use RefreshDatabase;

    private string $organizationId;

    private CommandBus $commandBus;
    private string $eventId;
    private string $attendeeId;
    private array $events = [];

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        parent::__construct();
        parent::setUp();

        $this->eventId = Uuid::uuid4()->toString();
        $this->organizationId = Uuid::uuid4()->toString();
        $this->attendeeId = Uuid::uuid4()->toString();

        $this->commandBus = resolve(CommandBus::class);
        Event::listen('*', function ($event) {
            $this->events[] = $event;
        });
    }

    /**
     * @Given I created an event with name :eventName
     */
    public function iCreatedAnEventWithName($eventName)
    {
        $this->commandBus->handle(new CreateEvent(
            $this->eventId,
            $this->organizationId,
            $eventName,
            'Amsterdam, Netherlands',
            new Carbon('2022-09-09'),
            10000
        ));
    }

    /**
     * @When I publish the event
     */
    public function iPublishTheEvent()
    {
        $this->commandBus->handle(new PublishEvent($this->eventId));
    }

    /**
     * @Then I should see the event published
     */
    public function iShouldSeeTheEventPublished()
    {
        $this->assertContains(EventPublished::class, $this->events);
    }

    /**
     * @Given There is a published event with a capacity of :capacity
     */
    public function thereIsAPublishedEventWithACapacityOf(int $capacity)
    {
        event(new EventPublished(
            $this->eventId,
            $capacity
        ));
    }

    /**
     * @When I register myself
     */
    public function iRegisterMyself()
    {
        $this->commandBus->handle(new RegisterAttendee($this->eventId, $this->attendeeId, 'John Doe'));
    }

    /**
     * @Then I should be registered
     */
    public function iShouldBeRegistered()
    {
        $this->assertContains(AttendeeRegistered::class, $this->events);
    }

    /**
     * @Given The capacity should be reduced by 1
     */
    public function theCapacityShouldBeReducedBy()
    {
        $this->assertContains(AvailableCapacityReduced::class, $this->events);
    }

    /**
     * @Given And there is a registration
     */
    public function andThereIsARegistration()
    {
        $this->commandBus->handle(new RegisterAttendee($this->eventId, Uuid::uuid4()->toString(), "Random guest" . random_int(1, 100)));
    }

    /**
     * @Then I should not be registered
     */
    public function iShouldNotBeRegistered()
    {
        $this->assertContains(AttendeeNotRegistered::class, $this->events);
    }
}
