//validation search form
function validate_form_search() {
    $('form[id="search-accommodation-form"]').validate({
        rules: {
            city: 'required',
            startDate: 'required',
            endDate: 'required',
            numberOfGuest: {
                digits: true
            }
        },
        messages: {
            city: '<span class="error">This field is required</span>',
            startDate: '<span class="error">This field is required</span>',
            endDate: '<span class="error">This field is required</span>',
            numberOfGuest: '<span class="error">This field is required</span>'
        },
        submitHandler: function(form) {
            // use ajax to send request to server
            var city = $('#city').val();
            var startDate = $('#startDate').val();
            var endDate = $('#endDate').val();
            var numberOfGuest = $('#numberOfGuest').val();
            $.ajax({
                url: 'list-accommodation-process.php',
                method: 'POST',
                data: {
                    city: city,
                    startDate: startDate,
                    endDate: endDate,
                    numberOfGuest: numberOfGuest
                },
                // get success message from server
                success: function(data) {
                $('#accommodation_data_list').html(data);
                }
            });
        }
    });
}