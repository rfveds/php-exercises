<?php

declare(strict_types=1);

namespace Tests\DataProviders;

class RouterDataProvider
{
    public static function routeNotFoundCases(): array
    {
        return [
            ['/test', 'get'],
            ['/test', 'post'],
            ['/test', 'put'],
            ['/test', 'delete'],
        ];
    }
}