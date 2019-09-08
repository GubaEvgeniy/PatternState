<?php


namespace App\states;


class ClockState implements State
{
    private $clock;
    private $mode = 'clock';
    private $timeType = 'clockTime';
    private $nextStateClass = AlarmState::class;

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
        $this->clock->incrementH($this->timeType);
    }

    public function incrementM()
    {
        $this->clock->incrementM($this->timeType);
    }

    public function tick()
    {
        if ($this->clock->isAlarmOn() && $this->clock->isAlarmTime()) {
            $this->clock->setNextState(BellState::class);
        }
    }
}