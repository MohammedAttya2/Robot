<?php

namespace App;

use App\Exceptions\InvalidCommand;
/**
 * Given a Robot and a set of commands
 * Move the robot into the final position following the set of commands
 */
class CommandHandler
{
    /**
     * Robot
     * @var Robot
     */
    protected $robot;

    /**
     * Array set of commands
     * @var array
     */
    protected $commands;

    /**
     * Array map of each commands and the corresponding steps for each
     */
    const COMMANDS_STEPS_MAP = [
        'F' => 1,
        'B' => -1,
        'R' => 1,
        'L' => -1,
    ];

    /**
     * Array map of each commands and the corresponding Axis for each
     */
    const COMMANDS_AXISES_MAP = [
        'F' => 'Y',
        'B' => 'Y',
        'R' => 'X',
        'L' => 'X',
    ];

    /**
     * @param Robot $robot
     * @param array $commands
     */
    public function __construct(Robot $robot, array $commands)
    {
        $this->robot = $robot;
        $this->commands = array_map('strtoupper', $commands);
    }

    /**
     * Move the Robot following the set of commands
     * @return bool true if the robot move successfully
     * @throws InvalidCommand
     */
    public function process() : bool
    {
        foreach ($this->commands as $command) {
            if (is_array($command)) {
                throw new InvalidCommand("A Command must be a string");
            }

            if (
                empty(self::COMMANDS_STEPS_MAP[$command]) ||
                empty(self::COMMANDS_AXISES_MAP[$command])
            ) {
                throw new InvalidCommand("Invalid Command: {$command}, Command should be one of 'FBLR'");
            }

            $steps = self::COMMANDS_STEPS_MAP[$command];
            $axis = self::COMMANDS_AXISES_MAP[$command];

            if ($axis === 'X') {
                $this->robot->moveX($steps);
            } elseif ($axis === 'Y') {
                $this->robot->moveY($steps);
            }
        }

        return true;
    }
}
