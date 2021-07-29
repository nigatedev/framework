<?php
/*
 * This file is part of the Nigatedev PHP framework core Application
 *
 *  (c) Abass Ben Cheik <abass@todaysdev.com>
 */

namespace Nigatedev\Core\Http;

/**
 * Response class
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
class Response
{
    /**
     * Set header code status
     *
     * @avr int $code
     *
     * @return new status code
     */
    public function setStatusCode(int $code)
    {
        return http_response_code($code);
    }
}
