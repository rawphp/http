<?php

namespace spec\RawPHP\Http\Factory;

use GuzzleHttp\Client;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use RawPHP\Http\Handler\IHandler;

class ClientFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('RawPHP\Http\Factory\ClientFactory');
    }

    function it_creates_a_http_client()
    {
        $this->create()->shouldReturnAnInstanceOf(Client::class);
    }

    function its_handler_is_mutable(IHandler $handler)
    {
        $this->getHandler()->shouldReturn(null);
        $this->setHandler($handler);
        $this->getHandler()->shouldReturn($handler);
    }
}
