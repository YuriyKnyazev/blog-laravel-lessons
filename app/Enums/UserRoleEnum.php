<?php

namespace App\Enums;

use Hamcrest\Core\IsNotTest;

enum UserRoleEnum: int
{
    case ADMIN = 1;
    case USER = 2;
}
