<?php

namespace RawPHP\Http\Factory;

use GuzzleHttp\Psr7\Request;

/**
 * Class RequestFactory
 *
 * @package RawPHP\Http\Factory
 */
class RequestFactory implements IRequestFactory
{
    /**
     * @param string $method
     * @param string $url
     * @param array  $headers
     * @param string $body
     *
     * @return Request
     */
    public function create($method, $url, array $headers = [], $body = null)
    {
        return new Request($method, $url, $headers, $body);
    }
}
