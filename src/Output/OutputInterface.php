<?php

namespace App\Output;

use App\Robot;

interface OutputInterface
{   
    /**
     * @param Robot $robot
     */
    public function __construct(Robot $robot);

    /**
     * Generate the output
     * @param  string $command the input string command
     * @return string  The generated Output
     */
    public function generateOutput(string $command) : string;
}