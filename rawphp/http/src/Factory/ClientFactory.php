<?php

namespace RawPHP\Http\Factory;

use GuzzleHttp\Client;
use RawPHP\Http\Handler\DefaultHandler;
use RawPHP\Http\Handler\IHandler;

/**
 * Class ClientFactory
 *
 * @package RawPHP\Http\Factory
 */
class ClientFactory implements IClientFactory
{
    /** @var  IHandler */
    protected $handler;

    /**
     * @param array $config
     *
     * @return Client
     */
    public function create(array $config = [])
    {
        if (null === $this->handler) {
            $this->handler = DefaultHandler::create();
        }

        return new Client(
            array_merge_recursive(
                [
                    'verify'  => false,
                    'handler' => $this->handler,
                ],
                $config
            )
        );
    }

    /**
     * @return IHandler
     */
    public function getHandler()
    {
        return $this->handler;
    }

    /**
     * @param IHandler $handler
     *
     * @return IClientFactory
     */
    public function setHandler(IHandler $handler)
    {
        $this->handler = $handler;

        return $this;
    }
}
