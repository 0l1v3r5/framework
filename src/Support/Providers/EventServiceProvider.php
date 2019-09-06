<?php

namespace AvoRed\Framework\Support\Providers;

use Illuminate\Support\Facades\Event;
use AvoRed\Framework\User\Observers\UserObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        $this->registerUserModelObserver();
    }

    /**
     * Register User Created Event Listener.
     * @return void
     */
    public function registerUserModelObserver()
    {
        $user = config('avored.model.user');

        try {
            $model = resolve($user);
        } catch (\ReflectionException $e) {
            $model = null;
        }

        if ($model !== null) {
            $model->observe(UserObserver::class);
        }
    }
}
