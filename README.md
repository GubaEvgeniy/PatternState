[Полное описание решение задачи и теория](https://gist.github.com/GubaEvgeniy/a7018a0c877c34a0781d456724dedda7)

# Описание Паттерна Состояние на примере будильника

Реализуйте логику работы часов.

В режиме настройки будильника (alarm), часы и минуты изменяются независимо и никак друг на друга не влияют (как и в большинстве реальных будильников). То есть если происходит увеличение минут с 59 до 60 (сброс на 00), то цифра с часами остается неизменной.

Интерфейсными методами часов являются:

* `clickMode()` - нажатие на кнопку `Mode`
* `longClickMode()` - долгое нажатие на кнопку `Mode`
* `clickH()` - нажатие на кнопку `H`
* `clickM()` - нажатие на кнопку `M`
* `tick()` - при вызове, увеличивает время на одну минуту. Если новое время совпало со временем на будильнике, то часы переключаются в режим срабатывания будильника (`bell`).
* `isAlarmOn()` - показывает включен ли режим будильника
* `isAlarmTime()` - возвращает `true`, если время на часах совпадает со временем на будильнике
* `getMinutes()` - возвращает минуты, установленные на часах
* `getHours()` - возвращает часы, установленные на часах
* `getAlarmMinutes()` - возвращает минуты, установленные на будильнике
* `getAlarmHours()` - возвращает часы, установленные на будильнике
* `getCurrentMode()` - возвращает текущий режим (alarm | clock | bell)

**AlarmClock.php**

Реализуйте интерфейсные методы и логику работы часов.

**states/AlarmState.php**, **states/BellState.php**, **states/ClockState.php**

Реализуйте логику состояний.