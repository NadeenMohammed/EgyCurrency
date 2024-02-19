
<?php
/*
Plugin Name: Currency Exchange Board
Description: Display  currency exchange rates.
Version: 3.0
Author: Peter Essam
*/

// Add a menu item to the admin menu
function currency_exchange_settings_menu() {
    add_menu_page(
        'Currency Exchange Settings',
        'Currency Exchange',
        'manage_options',
        'currency-exchange-settings',
        'currency_exchange_settings_page'
    );
}
add_action('admin_menu', 'currency_exchange_settings_menu');

// Display the settings page
function currency_exchange_settings_page() {
    ?>
    <div class="wrap">
        <h2>Currency Exchange Settings</h2>
        <form method="post" action="options.php">
            <?php settings_fields('currency_exchange_settings_group'); ?>
            <?php do_settings_sections('currency-exchange-settings'); ?>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Register settings and fields
function currency_exchange_register_settings() {
    register_setting('currency_exchange_settings_group', 'currency_buy_rates');
    register_setting('currency_exchange_settings_group', 'currency_sell_rates');

    $currencies = array(
        'USD' => array('name' => 'United States Dollar', 'flag' => 'https://countryflags.net/rounded/us.svg'),
        'SAR' => array('name' => 'Saudi Riyal', 'flag' => 'https://countryflags.net/rounded/sa.svg'),
        'EUR' => array('name' => 'Euro', 'flag' => 'https://flagcdn.com/24x18/eu.png'),
        'AED' => array('name' => 'United Arab Emirates Dirham', 'flag' => 'https://countryflags.net/rounded/ae.svg'),
        'KWD' => array('name' => 'Kuwaiti Dinar', 'flag' => 'https://countryflags.net/rounded/kw.svg'),
        'GBP' => array('name' => 'British Pound Sterling', 'flag' => 'https://countryflags.net/rounded/gb.svg'),
        'OMR' => array('name' => 'Omani Rial', 'flag' => 'https://countryflags.net/rounded/om.svg'),
        'CNY' => array('name' => 'Chinese Yuan', 'flag' => 'https://countryflags.net/rounded/cn.svg'),
        'QAR' => array('name' => 'Qatari Riyal', 'flag' => 'https://countryflags.net/rounded/qa.svg'),
        'CAD' => array('name' => 'Canadian Dollar', 'flag' => 'https://countryflags.net/rounded/ca.svg'),
        'JOD' => array('name' => 'Jordanian Dinar', 'flag' => 'https://countryflags.net/rounded/jo.svg'),
        'AUD' => array('name' => 'Australian Dollar', 'flag' => 'https://countryflags.net/rounded/au.svg'),
        'BHD' => array('name' => 'Bahraini Dinar', 'flag' => 'https://countryflags.net/rounded/bh.svg'),
        'CHF' => array('name' => 'Swiss Franc', 'flag' => 'https://countryflags.net/rounded/ch.svg'),
        'JPY' => array('name' => 'Japanese Yen', 'flag' => 'https://countryflags.net/rounded/jp.svg'),
        'SEK' => array('name' => 'Swedish Krona', 'flag' => 'https://countryflags.net/rounded/se.svg'),
        'DKK' => array('name' => 'Danish Krone', 'flag' => 'https://countryflags.net/rounded/dk.svg'),
        'NOK' => array('name' => 'Norwegian Krone', 'flag' => 'https://countryflags.net/rounded/no.svg')
    );

    foreach ($currencies as $currency => $currency_data) {
        add_settings_section(
            'currency_section_' . $currency,
            $currency_data['name'] . ' Settings',
            'currency_section_callback',
            'currency-exchange-settings'
        );

        add_settings_field(
            'currency_buy_rate_' . $currency,
            'Buy Rate for ' . $currency_data['name'],
            'currency_buy_rate_callback',
            'currency-exchange-settings',
            'currency_section_' . $currency,
            array('currency' => $currency)
        );

        add_settings_field(
            'currency_sell_rate_' . $currency,
            'Sell Rate for ' . $currency_data['name'],
            'currency_sell_rate_callback',
            'currency-exchange-settings',
            'currency_section_' . $currency,
            array('currency' => $currency)
        );
    }
}
add_action('admin_init', 'currency_exchange_register_settings');

// Callback for each currency section
function currency_section_callback() {
    // This function intentionally left blank
}

// Callback for buy rate field
function currency_buy_rate_callback($args) {
    $currency = $args['currency'];
    $currency_buy_rates = get_option('currency_buy_rates');

    if (isset($currency_buy_rates[$currency])) {
        $buy_rate = esc_attr($currency_buy_rates[$currency]);
    } else {
        $buy_rate = '';
    }

    echo "<input type='text' name='currency_buy_rates[$currency]' value='$buy_rate' style='width: 100%;'>";
}

// Callback for sell rate field
function currency_sell_rate_callback($args) {
    $currency = $args['currency'];
    $currency_sell_rates = get_option('currency_sell_rates');

    if (isset($currency_sell_rates[$currency])) {
        $sell_rate = esc_attr($currency_sell_rates[$currency]);
    } else {
        $sell_rate = '';
    }

    echo "<input type='text' name='currency_sell_rates[$currency]' value='$sell_rate' style='width: 100%;'>";
}

// Shortcode to display currency exchange board
function display_currency_exchange_board() {
    $currencies = array(
        'USD' => array('name' => 'United States $', 'flag' => 'https://countryflags.net/rounded/us.svg'),
        'SAR' => array('name' => 'Saudi SR ', 'flag' => 'https://countryflags.net/rounded/sa.svg'),
        'EUR' => array('name' => 'Euro €', 'flag' => plugin_dir_url(__FILE__) . 'eu.svg'),
        'AED' => array('name' => 'United Arab Emirates DH ', 'flag' => 'https://countryflags.net/rounded/ae.svg'),
        'KWD' => array('name' => 'Kuwaiti KWD', 'flag' => 'https://countryflags.net/rounded/kw.svg'),
        'GBP' => array('name' => 'British Pound £', 'flag' => 'https://countryflags.net/rounded/gb.svg'),
        'OMR' => array('name' => 'Omani OMR', 'flag' => 'https://countryflags.net/rounded/om.svg'),
        'CNY' => array('name' => 'Chinese  ¥', 'flag' => 'https://countryflags.net/rounded/cn.svg'),
        'QAR' => array('name' => 'Qatari QR ', 'flag' => 'https://countryflags.net/rounded/qa.svg'),
        'CAD' => array('name' => 'Canadian $', 'flag' => 'https://countryflags.net/rounded/ca.svg'),
        'JOD' => array('name' => 'Jordanian JD', 'flag' => 'https://countryflags.net/rounded/jo.svg'),
        'AUD' => array('name' => 'Australian $', 'flag' => 'https://countryflags.net/rounded/au.svg'),
        'BHD' => array('name' => 'Bahraini BD', 'flag' => 'https://countryflags.net/rounded/bh.svg'),
        'CHF' => array('name' => 'Swiss Franc SFr', 'flag' => 'https://countryflags.net/rounded/ch.svg'),
        'JPY' => array('name' => 'Japanese ¥', 'flag' => 'https://countryflags.net/rounded/jp.svg'),
        'SEK' => array('name' => 'Swedish Krona SEK', 'flag' => 'https://countryflags.net/rounded/se.svg'),
        'DKK' => array('name' => 'Danish Krone kr', 'flag' => 'https://countryflags.net/rounded/dk.svg'),
        'NOK' => array('name' => 'Norwegian Krone kr', 'flag' => 'https://countryflags.net/rounded/no.svg')
    );

    $buy_rates = get_option('currency_buy_rates');
    $sell_rates = get_option('currency_sell_rates');

    echo '<div class="currency-board">';
    echo '<table style="border-collapse: collapse; width: 100%;">';
    echo '<thead>';
    echo '<tr>';
    echo '<th style="padding:0px 0px 0px 10px; "> Currency </th >';
    echo '<th> Buy</th>';
    echo '<th > Sell</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($currencies as $currency => $currency_data) {
        $buy_rate = isset($buy_rates[$currency]) ? floatval($buy_rates[$currency]) : 0;
        $sell_rate = isset($sell_rates[$currency]) ? floatval($sell_rates[$currency]) : 0;

        // Display the currency only if buy or sell rate is set
        if ($buy_rate > 0 || $sell_rate > 0) {
            echo '<tr>';
            echo "<td style='padding: 0px 10px;'><img src='{$currency_data['flag']}' alt='{$currency_data['name']}' style='margin-bottom:-5px; margin-right: 5px; width: 25px;'>{$currency_data['name']}</td>";
            echo "<td style='padding: 10px 0px;'>" . number_format($buy_rate, 2) . "</td>";
            echo "<td style=' padding: 10px 0px;'>" . number_format($sell_rate, 2) . "</td>";
            echo '</tr>';
        }
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}
add_shortcode('currency_exchange_board', 'display_currency_exchange_board');
