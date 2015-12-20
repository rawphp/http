<?php

namespace RawPHP\Http\Factory;

use GuzzleHttp\Psr7\Request;

/**
 * Interface IRequestFactory
 *
 * @package RawPHP\Http\Factory
 */
interface IRequestFactory
{
    /**
     * @param string $method
     * @param string $url
     * @param array  $headers
     * @param string $body
     *
     * @return Request
     */
    public function create($method, $url, array $headers = [], $body = null);
}
