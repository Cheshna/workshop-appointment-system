<?php
function build_calendar($month, $year)
{

    //First of all we'll create an array containing names of all days in a week.
    $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
    //months
    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
    //no. of days in month
    $numberDays = date('t', $firstDayOfMonth);

    //getting some information of first day of this month 
    $dateComponents = getdate($firstDayOfMonth);

    //getting the name of this mont
    $monthName = $dateComponents['month'];

    //getting the index value
    $dayOfWeek = $dateComponents['wday'];

    //getting current date 
    $dateToday = date('Y-m-d');

    //Html table 
    $calendar = "<table class='table table-bordered'>";
    $calendar .= "<center><h2> $monthName $year</h2>";

    $calendar .= "<a class='btn btn-xs btn-primary' href='?month=" . date('m', mktime
    (
        0,
        0,
        0, $month - 1,
        1,
        $year
    )
    ) . "&year=" . date('Y', mktime(0, 0, 0, $month - 1, 1, $year)) . "'>Previous Month</a>";

    $calendar .= " <a class='btn btn-xs btn-primary' href='?month=" . date('m') . "&year=" . date('Y') . "'>Currrent Month</a>";

    $calendar .= " <a class='btn btn-xs btn-primary' href='?month=" . date('m', mktime
    (
        0,
        0,
        0, $month + 1,
        1,
        $year
    )
    ) . "&year=" . date('Y', mktime(0, 0, 0, $month + 1, 1, $year)) . "'>Next Month</a></center><br>";

    $calendar .= "<tr>";
    //calender header

    foreach ($daysOfWeek as $day) {
        $calendar .= "<th class='header'>$day</th>";
    }

    //rest of calender 

    //initiate the day counter,starting with the 1st






    $currentDay = 1;

    $calendar .= "<tr></tr>";

    //The variable SdayOfWeek will make sure that there must be only 7 columns on our table



    if ($dayOfWeek > 0) {
        for ($k = 0; $k < $dayOfWeek; $k++) {
            $calendar .= "<td class='empty'></td>";
        }

    }
    // $currentDay = 1; 
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);

    while ($currentDay <= $numberDays) {

        //if seventh column (saturday) reached, start a new row

        if ($dayOfWeek == 7) {

            $dayOfWeek = 0;

            $calendar .= "</tr><tr>";

        }
        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";
        $dayname = strtolower(date('l', strtotime($date)));
        $eventNum = 0;
        $today = $date == date('Y-m-d') ? "today" : "";
        if ($date < date('Y-m-d')) {
            $calendar .= "<td><h4>$currentDay</h4><button class='btn btn-danger btn-xs'>N/A</button>";
        } else {
            $calendar .= "<td class='$today'><h4>$currentDay</h4><a href='trybooking.php?date=" . $date . "'
         class='btn btn-success btn-xs'>Book</button>";
        }


        $calendar .= "</td>";

        //incrementing the counters
        $currentDay++;
        $dayOfWeek++;

    }

    //completing the row of last week in month,if neccesary 
    if ($dayOfWeek != 7) {
        $remainingDays = 7 - $dayOfWeek;
        for ($i = 0; $i < $remainingDays; $i++) {
            $calendar .= "<td></td>";

        }
    }
    $calendar .= "</tr>";
    $calendar .= "</table>";
    echo $calendar;


}
?>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        table {
            table-layout: fixed;

        }

        td {
            width: :33%;
        }

        .today {
            background: yellow;

        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                $dateComponents = getdate();
                if (isset($_GET['month']) && isset($_GET['year'])) {
                    $month = $_GET['month'];
                    $year = $_GET['year'];
                } else {
                    $month = $dateComponents['mon'];
                    $year = $dateComponents['year'];
                }
                echo build_calendar($month, $year);
                ?>

            </div>

        </div>

    </div>

</body>

</html>