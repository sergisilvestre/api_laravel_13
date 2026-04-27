<?php

namespace App\Infrastructure\UserVeritication\Persistence\Eloquent;

use App\Domain\UserVerification\Entities\UserVerification;
use App\Infrastructure\Helpers\LogHelper;

class UserVerificationObserver
{
    /**
     * Handle the UserVerification "creating" event.
     */
    public function creating(UserVerification $userVerification): void
    {
        LogHelper::write('user_verifications', 'Creating user verification: ' . $userVerification->user_id);
    }

    /**
     * Handle the UserVerification "created" event.
     */
    public function created(UserVerification $userVerification): void
    {
        LogHelper::write('user_verifications', 'New user verification created: ' . $userVerification->user_id   . PHP_EOL);
    }

    /**
     * Handle the UserVerification "updating" event.
     */
    public function updating(UserVerification $userVerification): void
    {
        LogHelper::write('user_verifications', 'Updating user verification: ' . $userVerification->user_id);
    }

    /**
     * Handle the UserVerification "updated" event.
     */
    public function updated(UserVerification $userVerification): void
    {
        LogHelper::write('user_verifications', 'User verification updated: ' . $userVerification->user_id);
    }

    public function deleting(UserVerification $userVerification): void
    {
        LogHelper::write('user_verifications', 'Deleting user verification: ' . $userVerification->user_id);
    }

    /**
     * Handle the UserVerification "deleted" event.
     */
    public function deleted(UserVerification $userVerification): void
    {
        LogHelper::write('user_verifications', 'User verification deleted: ' . $userVerification->user_id);
    }
}
