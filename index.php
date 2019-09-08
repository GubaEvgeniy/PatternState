<?php

// Подключение автозагрузки через composer
require __DIR__ . '/vendor/autoload.php';

use App\AlarmClock;

$clock = new AlarmClock();

$clock->longClickMode();
for ($i = 0; $i < 18 * 60; $i++) {
    $clock->tick();
}
$clock->clickM();
$clock->clickH();
$clock->tick();
?>


<pre>

    <?php

    var_dump($clock->getCurrentMode());
    ?>

</pre>
