<?php

require __DIR__.'/vendor/autoload.php';

use App\GeneratePassword;

$password = new GeneratePassword();

echo $password->generate(50, true, true, true, true);
