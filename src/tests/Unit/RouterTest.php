<?php

declare(strict_types=1);

namespace Unit;

use App\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    public function test_it_registers_a_route(): void
    {
        // given that we have a router object
        $router = new Router();

        // when we call a register method
        $router->register('get', '/test', ['TestController', 'test']);

        $expected = [
            'get' => [
                '/test' => ['TestController', 'test']
            ]
        ];
        // then we assert route was registered
        $this->assertEquals($expected, $router->routes());
    }

    public function test_it_registers_a_post_route(): void
    {
        // given that we have a router object
        $router = new Router();

        // when we call a register method
        $router->post('/test', ['TestController', 'test']);

        $expected = [
            'post' => [
                '/test' => ['TestController', 'test']
            ]
        ];
        // then we assert route was registered
        $this->assertEquals($expected, $router->routes());
    }

    public function test_it_registers_a_get_route(): void
    {
        // given that we have a router object
        $router = new Router();

        // when we call a register method
        $router->get('/test', ['TestController', 'test']);

        $expected = [
            'get' => [
                '/test' => ['TestController', 'test']
            ]
        ];
        // then we assert route was registered
        $this->assertEquals($expected, $router->routes());
    }
}