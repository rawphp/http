<?php

namespace RawPHP\Http\Factory;

use GuzzleHttp\Client;
use RawPHP\Http\Handler\IHandler;

/**
 * Interface IClientFactory
 *
 * @package RawPHP\Http\Factory
 */
interface IClientFactory
{
    /**
     * @param array $config
     *
     * @return Client
     */
    public function create(array $config = []);

    /**
     * @return IHandler
     */
    public function getHandler();

    /**
     * @param IHandler $handler
     *
     * @return IClientFactory
     */
    public function setHandler(IHandler $handler);
}
