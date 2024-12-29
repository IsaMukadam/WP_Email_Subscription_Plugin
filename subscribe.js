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
                    alert('Subscription successful!');
                },
                error: function(error) {
                    alert('There was an error, please try again later.');
                }
            });
        } else {
            alert('Please enter a valid email.');
        }
    });
});
