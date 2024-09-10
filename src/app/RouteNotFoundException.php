<?php

namespace App;

class RouteNotFoundException extends \Exception
{
    protected $message = 'Route not found';
}