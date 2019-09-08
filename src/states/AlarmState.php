<?php


namespace App\states;


class AlarmState implements State
{
    private $clock;
    private $mode = 'alarm';
    private $timeType = 'alarmTime';
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