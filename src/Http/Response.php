<?php
/*
 * This file is part of the Nigatedev PHP framework core Application
 *
 *  (c) Abass Ben Cheik <abass@todaysdev.com>
 */

namespace Nigatedev\Http;

use GuzzleHttp\Psr7\Response as serverResponse;

/**
 * Response class
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
class Response extends serverResponse
{
    /**
     * Set header code status
     *
     * @avr int|bool $code
     *
     * @return int|bool new status code
     */
    public function setStatusCode(int $code)
    {
        return http_response_code($code);
    }
}
