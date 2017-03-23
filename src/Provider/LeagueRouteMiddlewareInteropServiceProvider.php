<?php

namespace Basal\Middleware\LeagueRoute\Provider;

use Basal\Middleware\LeagueRoute\LeagueRouteMiddleware;
use Interop\Container\ContainerInterface;
use Interop\Container\ServiceProviderInterface;
use League\Route\RouteCollection;

/**
 * Class LeagueRouteMiddlewareInteropServiceProvider.
 */
final class LeagueRouteMiddlewareInteropServiceProvider implements ServiceProviderInterface
{
    /**
     * @return array
     */
    public function getServices()
    {
        return [
            LeagueRouteMiddleware::class => [$this, 'getMiddleware'],
            RouteCollection::class => [$this, 'getRouteCollection'],
        ];
    }

    /**
     * @param ContainerInterface $container
     *
     * @return LeagueRouteMiddleware
     */
    public static function getMiddleware(ContainerInterface $container)
    {
        return new LeagueRouteMiddleware($container->get(RouteCollection::class));
    }

    /**
     * @param ContainerInterface $container
     *
     * @return RouteCollection
     */
    public static function getRouteCollection(ContainerInterface $container)
    {
        return new RouteCollection($container);
    }
}
