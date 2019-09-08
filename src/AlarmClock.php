<?php

namespace App;

class AlarmClock
{
    private $clockTime = ['minutes' => 0, 'hours' => 12];
    private $alarmTime = ['minutes' => 0, 'hours' => 6];
    private $alarmOn = false;
    private $state;

    public function __construct()
    {
        $this->setNextState(states\ClockState::class);
    }

    /**
     * Установка режима
     *
     * @param null $className
     */
    public function setNextState($className = null)
    {
        //$className = $className ?? $this->state->getNextStateClassName();
        $this->state = new $className($this);
    }

    /**
     * Полечение текущего режима работы
     *
     * @return mixed
     */
    public function getCurrentMode()
    {
        return $this->state->getModeName();
    }

    /**
     * Переключение режимов
     */
    public function clickMode()
    {
        $nextState = $this->state->getNextStateClassName();
        $this->setNextState($nextState);
    }

    public function longClickMode()
    {
        $this->alarmOn = !$this->alarmOn;
    }

    /**
     *  Увеличение текущего времени на 1 минуту
     */
    public function tick()
    {
        $this->incrementM('clockTime');
        if ($this->clockTime['minutes'] === 0) {
            $this->incrementH('clockTime');
        }
        $this->state->tick();
    }
    public function incrementH($timeType)
    {
        $hoursCount = $this->$timeType['hours'];
        $this->$timeType['hours'] = ($hoursCount + 1) % 24;
    }
    public function incrementM($timeType)
    {
        $minutesCount = $this->$timeType['minutes'];
        $this->$timeType['minutes'] = ($minutesCount + 1) % 60;
    }

    public function clickH()
    {
        $this->state->incrementH();
    }
    public function clickM()
    {
        $this->state->incrementM();
    }

    /**
     * Проверка на вкл/выкл будильника
     *
     * @return bool
     */
    public function isAlarmOn()
    {
        return $this->alarmOn;
    }

    /**
     * Проверка на время срабатывания будильника
     *
     * @return bool
     */
    public function isAlarmTime()
    {
        return $this->clockTime['minutes'] === $this->alarmTime['minutes']
            && $this->clockTime['hours'] === $this->alarmTime['hours'];
    }

    public function getMinutes()
    {
        return $this->clockTime['minutes'];
    }
    public function getHours()
    {
        return $this->clockTime['hours'];
    }
    public function getAlarmHours()
    {
        return $this->alarmTime['hours'];
    }
    public function getAlarmMinutes()
    {
        return $this->alarmTime['minutes'];
    }
}
