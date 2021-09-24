<?php

namespace App;

class Robot
{
    /**
     * The X-Axis position of the Robot
     * @var integer
     */
    protected $positionX = 0;

    /**
     * The Y-Axis position of the Robot
     * @var integer
     */
    protected $positionY = 0;

    /**
     * Move the Robot in the X Axis
     * @param    int $steps no of steps
     * @return   int  The current X position of the Robot
     */
    public function moveX(int $steps = 1) : int
    {
        $this->positionX += $steps;

        return $this->positionX;
    }

    /**
     * Move the Robot in the Y Axis
     * @param    int $steps no of steps
     * @return   int  The current Y position of the Robot
     */
    public function moveY(int $steps = 1) : int
    {
        $this->positionY += $steps;

        return $this->positionY;
    }

    /**
     * Getting the X-Axis, Y-Axis position of the Robot
     * @return array The current X, Y position
     */
    public function getPosition() : array
    {
        return [
            'X' => $this->positionX,
            'Y' => $this->positionY,
        ];
    }

    /**
     * resets the Robot position to 0, 0
     * @return void
     */
    public function reset()
    {
        $this->positionX = 0;
        $this->positionY = 0;
    }
}
