<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
    $(document).ready(function() {
        // Fetch the unavailable dates from the database or any other storage mechanism
        // and store them in a variable called 'unavailableDates'

        $('#calendar').fullCalendar({
            dayRender: function(date, cell) {
                var dateString = date.format('YYYY-MM-DD');
                if (unavailableDates.includes(dateString)) {
                    cell.addClass('disabled');
                }
            },
            // Add other FullCalendar options and callbacks as needed
        });
    });
</script>

</head>
<body>
    <div id="calendar"></div>
</body>
</html>
<!-- customer.blade.php -->


