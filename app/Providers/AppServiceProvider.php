<?php

namespace App\Providers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //maakt een nieuw onderdeel aan voor waar een gebruiker toegang kan hebben.
        //Gebruikt de user die ingelogd is en kijkt naar de groep waarvan je iets wil doen.
        Gate::define('edit-group', function (User $user, Group $group) {
            //je hebt toegang tot het bewerken van de groep zodra de user die ingelogd is hetzelfde is als degene die de group heeft aangemaakt.
            return $group->user->is($user) || $user->role === 'admin';
        });

        Gate::define('access-dashboard', function ($user) {
            return $user->role === 'admin';
        });

    }
}
