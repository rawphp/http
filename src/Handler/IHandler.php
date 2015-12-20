<?php

namespace RawPHP\Http\Handler;

use OutOfBoundsException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Interface IHandler
 *
 * @package RawPHP\Http\Handler
 */
interface IHandler
{
    /**
     * Invoke handler.
     *
     * @param RequestInterface $request
     * @param array            $options
     *
     * @return ResponseInterface
     * @throws OutOfBoundsException
     */
    public function __invoke(RequestInterface $request, array $options);
}
