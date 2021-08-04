<?php
/*
 * This file is part of the Nigatedev PHP framework core Application
 *
 *  (c) Abass Ben Cheik <abass@todaysdev.com>
 */

namespace Nigatedev\Core\Http;

use GuzzleHttp\Psr7\ServerRequest;

/**
 * HTTP request
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
class Request
{
  
    private $serverRequest;
  
    public function __construct()
    {
        $this->serverRequest = ServerRequest::fromGlobals();
    }
    /**
     * @return The method from the REQUEST_METHOD
     */
    public function getMethod()
    {
        return strtolower($this->serverRequest->getMethod());
    }
  
    /**
     * @return The path from the REQUEST_URI
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
