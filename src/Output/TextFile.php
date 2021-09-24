<?php

namespace App\Output;

use App\Robot;
use Exception;

/**
 * Generate the Robot position in a text file format
 */
class TextFile extends AbstractOutput
{

    /**
     * @var Robot
     */
    protected $robot;

    /**
     * The output file path
     * @var string
     */
    protected $file;

    /**
     * @param Robot $robot
     */
    public function __construct(Robot $robot)
    {
        $this->robot = $robot;
        $this->file = __DIR__ . '/../../outputs/' . uniqid('robot_', true) . '.txt';
    }

    /**
     * Generate the output into a text file
     * @param string $command the input string command
     * @return string  The generated Text file
     * @throws Exception
     */
    public function generateOutput(string $command) : string
    {
        $handle = fopen($this->file, 'w');
        if (!is_writable($this->file)) {
            throw new Exception("Cannot open file {$this->file}", 1);
        }

        $position = $this->robot->getPosition();
        $text = $this->formatPosition($position, $command);

        fwrite($handle, $text);
        fclose($handle);

        return $this->file;
    }
}
