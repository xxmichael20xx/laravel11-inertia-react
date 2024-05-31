<?php

namespace App\Exceptions;

use Exception;

class CannotDeleteSuperAdminException extends Exception
{
    public function __construct()
    {
        parent::__construct("Cannot delete super admin!");
    }
}
