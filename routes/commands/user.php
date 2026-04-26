<?php

use App\Infrastructure\User\Console\RememberVerifyUserCommand;
use Illuminate\Support\Facades\Schedule;

Schedule::command(RememberVerifyUserCommand::class)->daily('12:00');
