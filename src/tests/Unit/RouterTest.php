<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Container;
use App\Exceptions\RouteNotFoundException;
use App\Router;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use Tests\DataProviders\RouterDataProvider;

#[CoversClass(Router::class)]
class RouterTest extends TestCase
{
    private Router $router;
    protected function setUp(): void
    {
        parent::setUp();

        $container = new Container();

        $this->router = new Router($container);
    }

    public function test_it_registers_a_route(): void
    {
        $this->router->register('get', '/test', ['TestController', 'test']);

        $expected = [
            'get' => [
                '/test' => ['TestController', 'test']
            ]
        ];
        $this->assertEquals($expected, $this->router->routes());
    }

    public function test_it_registers_a_post_route(): void
    {
        $this->router->post('/test', ['TestController', 'test']);

        $expected = [
            'post' => [
                '/test' => ['TestController', 'test']
            ]
        ];
        $this->assertEquals($expected, $this->router->routes());
    }

    public function test_it_registers_a_get_route(): void
    {
        $this->router->get('/test', ['TestController', 'test']);

        $expected = [
            'get' => [
                '/test' => ['TestController', 'test']
            ]
        ];
        $this->assertEquals($expected, $this->router->routes());
    }

    public function there_are_no_routes_when_router_is_created(): void
    {
        $container = new Container();
        $router = new Router($container);
        $this->assertEmpty(($router->routes()));
    }


    #[DataProviderExternal(RouterDataProvider::class, 'routeNotFoundCases')]
    public function test_it_throws_route_not_found_exception(
        string $requestUri,
        string $requestMethod
    ): void {
        $testClass = new class() {
            public function delete(): bool
            {
                return true;
            }
        };

        $this->router->get('/test', [$testClass::class, 'put']);
        $this->router->post('/test', ['TestController', 'post']);

        $this->expectException(RouteNotFoundException::class);
        $this->router->resolve($requestUri, $requestMethod);
    }

    public function test_it_resolves_route_from_a_closure(): void
    {
        $this->router->get('/test', fn() => [1, 2, 3]);

        $this->assertEquals(
            [1, 2, 3],
            $this->router->resolve('/test', 'get')
        );
    }

    public function test_it_resolves_route(): void
    {
        $testClass = new class() {
            public function index(): array
            {
                return [1, 2, 3];
            }
        };

        $this->router->get('/test', [$testClass::class, 'index']);

        $this->assertEquals(
            [1, 2, 3],
            $this->router->resolve('/test', 'get')
        );
    }
}