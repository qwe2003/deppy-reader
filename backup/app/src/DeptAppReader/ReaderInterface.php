<?php

namespace DeptAppReader;

/**
 * 
 */
interface Reader
{
    /**
     * 
     */
    public function read(string $url, string $project, string $timeInterval);
}