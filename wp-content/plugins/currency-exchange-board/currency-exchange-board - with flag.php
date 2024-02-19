<?php
/*
Plugin Name: Currency bank Exchange Board
Description: Display currency bank exchange rates.
Version: 1.0
Author: Nadeen
*/

// Add a menu item to the admin menu
function currency_bank_exchange_settings_menu() {
    add_menu_page(
        'Currency bank Exchange Settings',
        'Currency bank Exchange',
        'manage_options',
        'currency-bank-exchange-settings',
        'currency_bank_exchange_settings_page'
    );
}
add_action('admin_menu', 'currency_bank_exchange_settings_menu');

// Display the settings page
function currency_bank_exchange_settings_page() {
    ?>
    <div class="wrap">
        <h2>Currency bank Exchange Settings</h2>
        <form method="post" multiple action="options.php">
            <?php settings_fields('currency_bank_exchange_settings_group'); ?>
            <?php do_settings_sections('currency-bank-exchange-settings'); ?>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Register settings and fields
function currency_bank_exchange_register_settings() {
    register_setting('currency_bank_exchange_settings_group', 'currency_exchange_SVG');
    $currencies = array(
        'USD', 'SAR', 'EUR', 'AED', 'KWD', 'GBP', 'OMR', 'CNY', 'QAR', 'CAD', 'JOD', 'AUD', 'BHD', 'CHF', 'JPY', 'SEK', 'DKK', 'NOK'
    );

    foreach ($currencies as $currency) {
        add_settings_section(
            'currency_bank_section_' . $currency,
            $currency . ' Settings',
            'currency_bank_section_callback',
            'currency-bank-exchange-settings'
        );

        add_settings_field(
            'currency_SVGS_' . $currency,
            'SVGS for ' . $currency,
            'currency_SVGS_callback',
            'currency-bank-exchange-settings',
            'currency_bank_section_' . $currency,
            array('currency' => $currency)
        );

    }
}
add_action('admin_init', 'currency_bank_exchange_register_settings');

// Callback for each currency section
function currency_bank_section_callback() {
    // This function intentionally left blank
}


// Callback for currency SVGS field
function currency_SVGS_callback($args) {
    $currency = $args['currency'];
    $currency_exchange_SVG = get_option('currency_exchange_SVG');

    if (isset($currency_exchange_SVG[$currency])) {
        $currency_SVGS = esc_url($currency_exchange_SVG[$currency]);
    } else {
        $currency_SVGS = '';
    }

    echo '<input type="text" name="currency_exchange_SVG[' . $currency . ']" value="' . $currency_SVGS . '" style="width: 100%;" />';
    echo '<p><em>Enter the URL of the SVG file for ' . $currency . '</em></p>';
}


// Shortcode to display currency exchange board
function display_currency_bank_exchange_board() {
    $currencies = array(
        'USD', 'SAR', 'EUR', 'AED', 'KWD', 'GBP', 'OMR', 'CNY', 'QAR', 'CAD', 'JOD', 'AUD', 'BHD', 'CHF', 'JPY', 'SEK', 'DKK', 'NOK'
    );

    $exchange_rates = get_currency_exchange_rates();
    $exchange_rates_buy = get_currency_exchange_rates_buy();

    echo '<div class="currency-board">';
    echo '<table style="border-collapse: collapse; width: 100%;">';
    echo '<thead >';
    echo '<tr >';
    echo '<th style="padding-left:50px;"> Flag </th >';
    echo '<th  > Currency </th>';
    echo '<th > Buy </th>';
    echo '<th > Sell </th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($currencies as $currency) {
        $reciprocal_rate = isset($exchange_rates[$currency]) ? number_format(1/ $exchange_rates[$currency] - 0.056 , 2) : 0;
        $reciprocal_rate_buy = isset($exchange_rates_buy[$currency]) ? number_format( 1 /$exchange_rates_buy[$currency] * 1.002 , 2) : 0;
        $currency_exchange_SVG = get_option('currency_exchange_SVG');
        $currency_SVGS = isset($currency_exchange_SVG[$currency]) ? esc_url($currency_exchange_SVG[$currency]) : '';

        // $fullPath = get_attached_file($currency_exchange_SVG[$currency]);

        // var_dump($currency_exchange_SVG[$currency]);
        // die();
       

        echo '<tr >';
        echo "<td style='width:7%; padding-left:50px;'><img  src='$currency_SVGS'/></td>";
        echo "<td >{$currency}/EGP</td>";
        echo "<td style='text-align: left; '>{$reciprocal_rate_buy}</td>";
        echo "<td style='text-align: left; padding: 10px;'>{$reciprocal_rate}</td>";
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} 
add_shortcode('currency_bank_exchange_board', 'display_currency_bank_exchange_board');

// Function to fetch currency exchange rates
function get_currency_exchange_rates() {
    $api_key = 'a830998e5453e63e5bdbe4af';
    $base_currency = 'EGP';

    $api_url = "https://open.er-api.com/v6/latest/{$base_currency}?apikey={$api_key}";
   
    $response = wp_remote_get($api_url);

    if (is_wp_error($response)) {
        return array();
    }

    $data = wp_remote_retrieve_body($response);
    $exchange_rates = json_decode($data, true);

    if (!$exchange_rates || !isset($exchange_rates['rates'])) {
        return array();
    }

    return $exchange_rates['rates'];
}


function get_currency_exchange_rates_buy() {
    $api_key = 'a830998e5453e63e5bdbe4af';
    $base_currency = 'EGP';

    $api_url = "https://open.er-api.com/v6/latest/{$base_currency}?apikey={$api_key}";
   
    $response = wp_remote_get($api_url);

    if (is_wp_error($response)) {
        return array();
    }

    $data = wp_remote_retrieve_body($response);
    $exchange_rates_buy = json_decode($data, true);

    if (!$exchange_rates_buy || !isset($exchange_rates_buy['rates'])) {
        return array();
    }

    return $exchange_rates_buy['rates'];
}

