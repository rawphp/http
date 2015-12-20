<?php

namespace spec\RawPHP\Http\Factory;

use GuzzleHttp\Psr7\Request;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RequestFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('RawPHP\Http\Factory\RequestFactory');
    }

    function it_creates_a_http_request()
    {
        $this->create('GET', 'http://example.com')->shouldReturnAnInstanceOf(Request::class);
    }
}
