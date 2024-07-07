<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('budoy', function () {
    Artisan::call('db:seed');
});
