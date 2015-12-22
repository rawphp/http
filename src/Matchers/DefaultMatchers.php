<?php

namespace RawPHP\Http\Matchers;

use Psr\Http\Message\RequestInterface;
use RawPHP\Http\Util\RequestMap;

/**
 * Class DefaultMatchers
 *
 * @package RawPHP\Http\Matchers
 */
class DefaultMatchers
{
    /**
     * Match Url.
     *
     * @param RequestInterface $request
     * @param array            $maps
     *
     * @return RequestMap[]
     */
    public function matchUrl(RequestInterface $request, array $maps)
    {
        $matched = [];

        $uri = (string)$request->getUri();

        /** @var RequestMap $map */
        foreach ($maps as $map) {
            if ((string)$map->getRequest()->getUri() === $uri) {
                $matched[] = $map;
            }
        }

        return $matched;
    }

    /**
     * Match method.
     *
     * @param RequestInterface $request
     * @param array            $maps
     *
     * @return RequestMap[]
     */
    public function matchMethod(RequestInterface $request, array $maps)
    {
        $matched = [];

        $method = $request->getMethod();

        /** @var RequestMap $map */
        foreach ($maps as $map) {
            if ($map->getRequest()->getMethod() === $method) {
                $matched[] = $map;
            }
        }

        return $matched;
    }
}
