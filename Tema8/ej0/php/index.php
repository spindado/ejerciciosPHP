<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css" />
    <title>Document</title>
</head>

<body>

    <?php
    //setlocale(LC_TIME, "es_ES");
    //$time2 =  gmdate("h:i:s", time() + 3600 * ($timezone));
    //$tomorrow = date("d") + 1 . date("-m-") . date("y");
    //$time = date("h:i:s");
    //$today = date("d.m.y");

    date_default_timezone_set('Europe/Madrid');
    $today = new DateTime();
    $today = date_format($today, 'd/m/Y');
    $tomorrow = new DateTime();
    $tomorrow = date_format($tomorrow, date('d') + 1 . '-m-Y');
    $time = new DateTime();
    $time = date_format($time, 'h:i:s');
    $nexWeek = new DateTime();
    date_add($nexWeek, date_interval_create_from_date_string('7 days'));
    $nexWeek = date_format($nexWeek, 'd-m-y');

    //----------------------

    $nexMonday = date('d/m/Y', strtotime("next Monday"));


    echo <<< HDR
    <table>
        <tr>
            <th>Date</th>
            <th>Resultado</th>

        </tr>
        <tr>
            <td>Today</td>
            <td>$today</td>
        </tr>
        <tr>
            <td>Tomorrow</td>
            <td>$tomorrow</td>

        </tr>
        <tr>
            <td>Local Time</td>
            <td>$time</td>
            
        </tr>
        <tr>
            <td>Next Week</td>
            <td>$nexWeek</td>

        </tr>
        <tr>
            <td>Next Moonday</td>
            <td>$nexMonday</td>

        </tr>
    </table>

HDR;

    ?>

</body>

</html>