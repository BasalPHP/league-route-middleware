<?php

namespace Basal\Middleware\LeagueRoute\Provider;

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
            RouteCollection::class => [$this, 'getRouteCollection'],
        ];
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
