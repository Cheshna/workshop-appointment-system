$.ajax({
    url: '/choosedate.admin', // Replace with your endpoint URL
    method: 'GET',
    dataType: 'json',
    success: function(response) {
        // Dates fetched successfully
        var unavailableDates = response.dates;
         // Initialize the date picker
         $('#dateInput').datepicker({
            beforeShowDay: function(date) {
                var dateString = $.datepicker.formatDate('yy-mm-dd', date);
                return [unavailableDates.indexOf(dateString) === -1];
            }
        });
        // Use the dates as needed (e.g., disable them in the date picker)
        // console.log(unavailableDates);
    },
    error: function(xhr, status, error) {
        // Error occurred
        console.error(error);
    }
});
