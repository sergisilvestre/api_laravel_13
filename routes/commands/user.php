<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('user:remember-verify-token')->everyFiveSeconds();
