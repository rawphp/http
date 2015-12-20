<?php

namespace RawPHP\Http\Factory;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ResponseFactory
 *
 * @package RawPHP\Http\Factory
 */
class ResponseFactory implements IResponseFactory
{
    /**
     * @param int    $code
     * @param string $body
     * @param array  $headers
     *
     * @return ResponseInterface
     */
    public function create($code, $body, array $headers = [])
    {
        return new Response($code, $headers, $body);
    }
}
