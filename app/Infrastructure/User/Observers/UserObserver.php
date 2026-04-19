<?php

namespace App\Infrastructure\User\Observers;

use App\Domain\User\Entities\User;
use App\Domain\User\Events\UserCreated;

class UserObserver
{
    public function creating(User $user): void
    {
        logger()->info('Creating user: ' . $user->name);
    }

    public function created(User $user): void
    {
        event(new UserCreated($user->email));
    }

    public function updating(User $user): void
    {
        logger()->info('Updating user: ' . $user->id);
    }

    public function updated(User $user): void
    {
        logger()->info('User updated: ' . $user->id);
    }

    public function deleting(User $user): void
    {
        logger()->info('Deleting user: ' . $user->id);
    }

    public function deleted(User $user): void
    {
        logger()->info('User deleted: ' . $user->id);
    }
}
