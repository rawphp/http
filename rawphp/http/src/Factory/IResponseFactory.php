<?php

namespace RawPHP\Http\Factory;

use Psr\Http\Message\ResponseInterface;

/**
 * Interface IResponseFactory
 *
 * @package RawPHP\Http\Factory
 */
interface IResponseFactory
{
    /**
     * @param int    $code
     * @param string $body
     * @param array  $headers
     *
     * @return ResponseInterface
     */
    public function create($code, $body, array $headers = []);
}
