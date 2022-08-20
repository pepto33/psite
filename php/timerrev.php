    <?php
    $datetime1 = new DateTime(date("Ymd")); //Получаем текущую дату
    $datetime2 = new DateTime('20220411'); //Дата акции
    $datetime3 = new DateTime(date("H:i:s")); //Получаем текущее время
    $datetime4 = new DateTime('23:59:59'); //Время, до которого действует акция
    $interval1 = $datetime2->diff($datetime1); // Считаем разницу для года, месяца и дня
    $interval2 = $datetime4->diff($datetime3); // И считаем разницу для времени
    // Здесь должна быть проверка, не отрицательный ли интервал, но это можно сделать через 10 месяцев, поэтому отложим пока

    echo $interval1->format('Прошло:' . '<br>' . '%m мес. %d д.'); // отправляем результаты обратно
    //echo $interval2->format(' %h ч. %i мин. %s сек.');
    ?>
