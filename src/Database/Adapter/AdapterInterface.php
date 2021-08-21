<?php
/*
 * This file is part of the Nigatedev PHP framework package
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 */

namespace Nigatedev\Database\Adapter;

use PDO;

/**
 * Adapter Interface
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
interface AdapterInterface
{
 public function setFetchMode(string $fetch): void;
}