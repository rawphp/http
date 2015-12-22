<?php

namespace RawPHP\Http\Handler;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RawPHP\Http\Exception\ResponseNotFoundException;
use Rawphp\Http\Exception\TooManyMatchesException;
use RawPHP\Http\Util\RequestMap;

/**
 * Class PredictedHandler
 *
 * @package RawPHP\Http\Handler
 */
class PredictedHandler implements IHandler
{
    /** @var  array */
    protected $matchers = [];
    /** @var  RequestMap[] */
    protected $maps = [];
    /** @var  ResponseInterface */
    protected $lastResponse;
    /** @var  bool */
    protected $allowMultiple = false;

    /**
     * PredictedHandler constructor.
     *
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        if (!empty($options['allow_multiple'])) {
            $this->allowMultiple = (bool)$options['allow_multiple'];
        }

        if (!empty($options['matchers'])) {
            foreach ($options['matchers'] as $key => $matcher) {
                $this->addMatcher($key, $matcher);
            }
        }
    }

    /**
     * Invoke handler.
     *
     * @param RequestInterface $request
     * @param array            $options
     *
     * @return ResponseInterface
     * @throws ResponseNotFoundException
     * @throws TooManyMatchesException
     */
    public function __invoke(RequestInterface $request, array $options)
    {
        $possibles = $this->getResponse($request, $this->maps);

        if (empty($possibles)) {
            throw new ResponseNotFoundException($request);
        }

        if (1 === count($possibles)) {
            $this->lastResponse = $possibles[0]->getResponse();
        } elseif (1 < count($possibles) && $this->allowMultiple) {
            $this->lastResponse = $possibles[0]->getResponse();
        } else {
            throw new TooManyMatchesException();
        }

        return $this->lastResponse;
    }

    /**
     * @param RequestInterface $request
     * @param RequestMap[]     $possibles
     *
     * @return RequestMap[]
     */
    protected function getResponse(RequestInterface $request, array $possibles)
    {
        foreach ($this->matchers as $matcher) {
            $possibles = $matcher($request, $possibles);
        }

        return $possibles;
    }

    /**
     * @param RequestMap $requestMap
     *
     * @return PredictedHandler
     */
    public function addRequestMap(RequestMap $requestMap)
    {
        $this->maps[] = $requestMap;

        return $this;
    }

    /**
     * @return array
     */
    public function getMatchers()
    {
        return $this->matchers;
    }

    /**
     * @param string   $name
     * @param callable $matcher
     *
     * @return PredictedHandler
     */
    public function addMatcher($name, $matcher)
    {
        if (is_callable($matcher)) {
            $this->matchers[$name] = $matcher;
        }

        return $this;
    }

    /**
     * @param string $name
     *
     * @return PredictedHandler
     */
    public function removeMatcher($name)
    {
        foreach ($this->matchers as $key => $matcher) {
            if ($name === $key) {
                unset($this->matchers[$key]);

                break;
            }
        }

        return $this;
    }

    /**
     * @return ResponseInterface
     */
    public function getLastResponse()
    {
        return $this->lastResponse;
    }
}
