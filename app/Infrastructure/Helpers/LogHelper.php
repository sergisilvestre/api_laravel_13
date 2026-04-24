<?php

namespace App\Infrastructure\Helpers;

use Illuminate\Support\Facades\Log;

class LogHelper
{
    /**
     * Log a message to a specific channel.
     *
     * @param string $channel
     * @param string $message
     * @return void
     */
    public static function write(string $channel, string $message): void
    {
        Log::channel($channel)->info($message);
    }
}
