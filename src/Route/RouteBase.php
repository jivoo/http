<?php
// Jivoo HTTP 
// Copyright (c) 2016 Niels Sonnich Poulsen (http://nielssp.dk)
// Licensed under the MIT license.
// See the LICENSE file or http://opensource.org/licenses/MIT for more information.
namespace Jivoo\Http\Route;

/**
 * Implements
 */
abstract class RouteBase implements Route
{
    protected $query = [];
    
    protected $parameters = [];
    
    protected $fragment = '';
    
    public function getQuery()
    {
        return $this->query;
    }
    
    public function withQuery(array $query)
    {
        $route = clone $this;
        $route->query = $query;
        return $route;
    }

    public function getParameters()
    {
        return $this->parameters;
    }
    
    public function withParameters(array $parameters)
    {
        $route = clone $this;
        $route->parameters = $parameters;
        return $route;
    }

    public function getFragment()
    {
        return $this->fragment;
    }
    
    public function withFragment($fragment)
    {
        $route = clone $this;
        $route->fragment = $fragment;
        return $route;
    }
    
    public function withoutAttributes()
    {
        $route = clone $this;
        $route->fragment = '';
        $route->query = [];
        $route->parameters = [];
        return $route;
    }
    
    public static function stripAttributes($routeString, &$route, $withParameters = true)
    {
        $regex = '/^(.*?)(?:\?([^?#]*))?(?:#([^#?]*))?$/';
        preg_match($regex, $routeString, $matches);
        if (isset($matches[2])) {
            parse_str($matches[2], $query);
            $route['query'] = $query;
        }
        if (isset($matches[3])) {
            $route['fragment'] = $matches[3];
        }
        if ($withParameters) {
            // TODO
        }
        return $matches[1];
    }
}
