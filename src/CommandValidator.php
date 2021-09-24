<?php

namespace App;

use App\Exceptions\InvalidCommandLength;
use App\Exceptions\InvalidCommand;

/**
 * Validate Command
 */
class CommandValidator
{
    /**
     * Maximum allowed command length
     */
    const LENGTH_LIMIT = 100;

    /**
     * a list of valid commands
     */
    const VALID_COMMANDS = ['F', 'B', 'L', 'R'];

    /**
     * Validate the set of commands in the string format
     * @param string $command
     * @return bool   is a valid command
     * @throws InvalidCommand
     * @throws InvalidCommandLength
     */
    public function validate(string $command) : bool
    {
        $command = trim($command);
        if (strlen($command) > self::LENGTH_LIMIT) {
            throw new InvalidCommandLength("Command length Exceeded the limit of " . self::LENGTH_LIMIT);
        }

        $invalidCommands = str_ireplace(self::VALID_COMMANDS, '', $command);

        if ($invalidCommands !== '') {
            throw new InvalidCommand("Invalid commands {$invalidCommands}, Command should be one of " . implode('', self::VALID_COMMANDS));
        }

        return true;
    }
}