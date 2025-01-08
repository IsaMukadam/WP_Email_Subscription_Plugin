<?php
/**
 * Plugin Name: My Subscribe Form
 * Description: A simple subscription form plugin for your WordPress site.
 * Version: 1.0
 * Author: Your Name
 */

// Register plugin styles and scripts
function my_subscribe_form_enqueue_assets() {
    wp_enqueue_style('my-subscribe-form-style', plugin_dir_url(__FILE__) . 'style.css');
    wp_enqueue_script('my-subscribe-form-script', plugin_dir_url(__FILE__) . 'subscribe.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'my_subscribe_form_enqueue_assets');

// Shortcode to display the subscription form
function my_subscribe_form_shortcode() {
    ob_start();
    ?>
    <div class="subscribe">
        <div class="subscribe-content">
            <h2>Subscribe Now</h2>
            <p>Join our community and receive an email notification whenever we publish a new post. Stay inspired, stay informed!</p>
            <form class="subscribe-form" action="" method="POST">
                <input type="email" name="email" placeholder="Enter your email address" required>
                <button type="submit" name="subscribe_form_submit">Subscribe Now</button>
            </form>
        </div>
    </div>
    <?php
    // Handle form submission and send email
    if (isset($_POST['subscribe_form_submit'])) {
        $email = sanitize_email($_POST['email']);
        if (is_email($email)) {
            // Send the email to your address
            $to = 'EMAIL HERE';  // Your email address
            $subject = 'New Subscriber';
            $message = "New subscriber: " . $email;
            $headers = array('Content-Type: text/html; charset=UTF-8');

            // Send the email
            wp_mail($to, $subject, $message, $headers);

            echo '<p>Thank you for subscribing!</p>';
        } else {
            echo '<p>Invalid email address. Please try again.</p>';
        }
    }
    return ob_get_clean();
}
add_shortcode('subscribe_form', 'my_subscribe_form_shortcode');
?>

