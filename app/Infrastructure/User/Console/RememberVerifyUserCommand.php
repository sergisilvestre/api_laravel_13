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
        logger('hello');
        parent::__construct();
    }

    public function __invoke(): void
    {
        logger('hello');
        LogHelper::write('scheduler', PHP_EOL . PHP_EOL . 'Running command: ' . $this->signature);
    }
}
