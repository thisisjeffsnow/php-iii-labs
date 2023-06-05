<?php

class Event
{
    protected $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
}

class EventManager
{
    protected $events = [];
    protected $eventClass;
    public function __construct(Event $class)
    {
        $this->eventClass = $class;
    }
    public function trigger($event)
    {
        return call_user_func([$this->events[$event], $event], $this->eventClass);
    }
    public function attach($event, $listener)
    {
        $this->events[$event] = $listener;
        return $listener;
    }
}

// Class runner

// An anonymous event class listener example
$listener = new class
{
    public function startup(Event $e)
    {
        echo "The big event \" {" .  $e->getName() . "} \" is happening!";
    }
};
// Get the event manager and attach an event.
$eman = new EventManager(new Event('startup'));
$eman->attach('startup', $listener);
//Do something that triggers the event
$eman->trigger('startup');
