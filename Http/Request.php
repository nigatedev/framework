<?php
/*
 * This file is part of the Nigatedev PHP framework package
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nigatedev\Framework\Http;

use GuzzleHttp\Psr7\ServerRequest;

/**
 * HTTP request
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
class Request
{
    /**
     * @var mixed $serverRequest
     */
    private $serverRequest;
  
    public function __construct()
    {
        $this->serverRequest = ServerRequest::fromGlobals();
    }
    /**
     * @return string
     */
    public function getMethod()
    {
        return strtolower($this->serverRequest->getMethod());
    }
  
    /**
     * @return string the path without ?
     */
    public function getPath()
    {
        $path = $this->serverRequest->getUri()->getPath() ?? "/";
        $pos = strpos($path, "?");
    
        if (!$pos) {
            return $path;
        }
        return substr($path, 0, $pos);
    }
}