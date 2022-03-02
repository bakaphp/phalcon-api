<?php

namespace Gewaer\Providers;

use Canvas\Providers\EventsManagerProvider as CanvasEventsManagerProvider;

class EventsManagerProvider extends CanvasEventsManagerProvider
{
    /**
     * List of the listeners use by the app.
     *
     * [
     *  'eventName' => 'className',
     *  'subscription' => Subscription::class,
     *  'user' => User::class,
     * ];
     *
     * @var array
     */
    protected $listeners = [
    ];
}
