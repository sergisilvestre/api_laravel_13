<?php

namespace App\Infrastructure\User\Console;

use App\Infrastructure\Helpers\LogHelper;
use Illuminate\Console\Command;

class RememberVerifyUserCommand extends Command
{
    protected $signature = 'user:remember-verify-token';
    protected $description = 'Remember the verification token for a user';


    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): void
    {
        LogHelper::write('scheduler', 'Running command: ' . $this->signature. PHP_EOL);
    }
}
