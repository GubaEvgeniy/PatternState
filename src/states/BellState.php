<?php


namespace App\states;


class BellState implements State
{
    private $clock;
    private $mode = 'bell';
    private $nextStateClass = ClockState::class;

    public function __construct($clock)
    {
        $this->clock = $clock;
    }

    public function getModeName()
    {
        return $this->mode;
    }

    public function getNextStateClassName()
    {
        return $this->nextStateClass;
    }

    public function incrementH()
    {
        return false;
    }

    public function incrementM()
    {
        return false;
    }

    public function tick()
    {
        $this->clock->setNextState($this->nextStateClass);
    }
}