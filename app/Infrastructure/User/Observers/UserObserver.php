<?php

namespace App\Infrastructure\User\Observers;

use App\Domain\User\Entities\User;
use App\Domain\User\Events\UserCreated;
use App\Infrastructure\Helpers\LogHelper;

class UserObserver
{
    public function creating(User $user): void
    {
        LogHelper::write('users', PHP_EOL);
        LogHelper::write('users', 'Creating user: ' . $user->name);
    }

    public function created(User $user): void
    {
        LogHelper::write('users', 'New user created: ' . $user->email);
        
        event(new UserCreated($user->email, $user->name));
    }

    // public function updating(User $user): void
    // {
    //     LogHelper::write('users', 'Updating user: ' . $user->id);
    // }

    // public function updated(User $user): void
    // {
    //     LogHelper::write('users', 'User updated: ' . $user->id);
    // }

    // public function deleting(User $user): void
    // {
    //     LogHelper::write('users', 'Deleting user: ' . $user->id);
    // }

    // public function deleted(User $user): void
    // {
    //     LogHelper::write('users', 'User deleted: ' . $user->id);
    // }
}
