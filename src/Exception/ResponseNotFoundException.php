<?php

namespace RawPHP\Http\Exception;

use Exception;
use Psr\Http\Message\RequestInterface;

/**
 * Class ResponseNotFoundException
 *
 * @package RawPHP\Http\Exception
 */
class ResponseNotFoundException extends Exception
{
    /** @var  RequestInterface */
    protected $request;

    /**
     * ResponseNotFoundException constructor.
     *
     * @param RequestInterface $request
     * @param string           $message
     */
    public function __construct(RequestInterface $request, $message = 'Request not Found')
    {
        parent::__construct($message, 404, null);
    }

    /**
     * @return RequestInterface
     */
    public function getRequest()
    {
        return $this->request;
    }
}
