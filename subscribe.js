jQuery(document).ready(function($) {
    // Handle form submission via AJAX
    $('.subscribe-form').submit(function(e) {
        e.preventDefault();
        
        var email = $('input[name="email"]').val();
        
        if (email) {
            $.ajax({
                url: '', // Handle form in the same page
                method: 'POST',
                data: { email: email, subscribe_form_submit: true },
                success: function(response) {
                    // If the form is successfully submitted, refresh the page
                    window.location.reload();
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        } else {
            console.log('Please enter a valid email.');
        }
    });
});
