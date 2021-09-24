<?php

namespace App\Output;

use App\Robot;

abstract class AbstractOutput implements OutputInterface
{
    /**
     * @param Robot $robot
     */
    abstract public function __construct(Robot $robot);

    /**
     * Format the Robot position
     * @param  array  $position The robot X, Y position
     * @param  string $command  string set of commands
     * @return string        formatted output
     */
    public function formatPosition(array $position, string $command) : string
    {
        return "{$command} => x={$position['X']} y={$position['Y']}";
    }
}
