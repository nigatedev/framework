<?php
/*
 * This file is part of the Nigatedev PHP framework package 
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 */
 
 use Nigatedev\Dumper\Dumper;
 
 function dump($data)
 {
   echo (new Dumper())->dumper($data);
 }
 
 function dd($data)
 {
   die((new dumper())->dumper($data));
 }