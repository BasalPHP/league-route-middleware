<?php

namespace Basal\Middleware\LeagueRoute;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use League\Route\RouteCollection;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class LeagueRouteMiddleware.
 */
class LeagueRouteMiddleware implements MiddlewareInterface
{
    /** @var RouteCollection */
    private $route;

    /**
     * LeagueRouteMiddleware constructor.
     *
     * @param RouteCollection $route
     */
    public function __construct(RouteCollection $route)
    {
        $this->route = $route;
    }

    /**
     * @inheritDoc
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        return $this->route->dispatch($request, $delegate->process($request));
    }
}
