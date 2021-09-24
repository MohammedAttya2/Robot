<?php

namespace App;

/**
 * Parse a string set of commands into an array
 */
class CommandParser
{
    /**
     * Parse a string set of commands into an array
     * @param  string $command string set of commands
     * @return array   array set of commands
     */
    public function parse(string $command) : array
    {
        $parsedCommand = str_split($command);
        return array_values(array_filter($parsedCommand));
    }
}