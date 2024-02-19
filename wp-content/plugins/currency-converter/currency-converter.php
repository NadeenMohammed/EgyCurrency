
<?php
/*
Plugin Name: Calculate Currency Rate 
description: A simple Calculate Currency Rate plugin.
Version: 1.0
Author: nadeen
*/

function currency_converter_shortcode() {
    // Enqueue the JavaScript file and localize the ajaxurl variable
    wp_enqueue_script('currency_converter_js', plugins_url('currency-converter.js', __FILE__), array('jquery'), '1.0', true);
    wp_localize_script('currency_converter_js', 'currency_converter_ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));
    
    ob_start();
    ?>

    <style>
            form{
                border:1px solid gray;
                padding:20px;
                display:flex;
                flex-direction: column ;
                width:100%;
                border-radius:10px;

            }

            label{
                font-size:18px;
                color:black;
                font-weight:500;
                padding:10px ;
            }


            #convert-button{
                background-color:transparent;
                border:1px solid #cb1f1f;
                color:black;
                width:20%;
                padding:10px 0px;
                border-radius:10px;
            }

</style>
    <form id="currency-converter"  >
        <h3 style="text-align : center;">Calculate Currency Rate</h3>
        <p style="text-align : center;">write your amount and wait a second</p>

        <label> Amount : </label>
        <input type="text" id="amount" placeholder="Enter amount">

        <label> From: </label>
        <select id="currency-from">
            <option value="USD">United States Dollar</option>
            <option value="SAR">Saudi Riyal</option>
            <option value="EGP">Egyption Pound</option>
            <option value="Eur">Euro</option>
            <option value="AED">United Arab Emirates Dirham</option>
            <option value="KWD">Kuwaiti Dinar</option>
            <option value="GBP">British Pound Sterling</option>
            <option value="OMR">Omani Rial</option>
            <option value="CNY">Chinese Yuan</option>
            <option value="QAR">Qatari Riyal</option>
            <option value="CAD">Canadian Dollar</option>
            <option value="JOD">Jordanian Dinar</option>
            <option value="AUD">Australian Dollar</option>
            <option value="BHD">Bahraini Dinar</option>
            <option value="CHF">Swiss Franc</option>
            <option value="JPY">Japanese Yen</option>
            <option value="SEK">Swedish Krona</option>
            <option value="DKK">Danish Krone</option>
            <option value="NOK">Norwegian Krone</option>


        </select>
        <label> To : </label>
        <select id="currency-to">
        <option value="EGP">Egyption Pound</option>
        <option value="USD">United States Dollar</option>
            <option value="SAR">Saudi Riyal</option>
            <option value="Eur">Euro</option>
            <option value="AED">United Arab Emirates Dirham</option>
            <option value="KWD">Kuwaiti Dinar</option>
            <option value="GBP">British Pound Sterling</option>
            <option value="OMR">Omani Rial</option>
            <option value="CNY">Chinese Yuan</option>
            <option value="QAR">Qatari Riyal</option>
            <option value="CAD">Canadian Dollar</option>
            <option value="JOD">Jordanian Dinar</option>
            <option value="AUD">Australian Dollar</option>
            <option value="BHD">Bahraini Dinar</option>
            <option value="CHF">Swiss Franc</option>
            <option value="JPY">Japanese Yen</option>
            <option value="SEK">Swedish Krona</option>
            <option value="DKK">Danish Krone</option>
            <option value="NOK">Norwegian Krone</option>
        </select>
        <input type="button" id="convert-button" value="Convert">
        <label> Result : </label>
        <input type="text" id="result" readonly>
    </form>

<?php
    return ob_get_clean();
}
add_shortcode('currency_converter', 'currency_converter_shortcode');

function currency_converter_ajax_callback() {
    $amount = isset($_POST['amount']) ? floatval($_POST['amount']) : 0;
    $from = isset($_POST['from_currency']) ? sanitize_text_field($_POST['from_currency']) : '';
    $to = isset($_POST['to_currency']) ? sanitize_text_field($_POST['to_currency']) : '';

    // Validate input
    if ($amount <= 0 || !in_array($from, array(
        'USD', 'SAR', 'EUR', 'AED','EGP', 'KWD', 'GBP', 'OMR', 'CNY', 'QAR', 'CAD', 'JOD', 'AUD', 'BHD', 'CHF', 'JPY', 'SEK', 'DKK', 'NOK'
        )) || !in_array($to, array(
           'EGP', 'USD', 'SAR', 'EUR', 'AED', 'KWD', 'GBP', 'OMR', 'CNY', 'QAR', 'CAD', 'JOD', 'AUD', 'BHD', 'CHF', 'JPY', 'SEK', 'DKK', 'NOK'
            ))) {
        wp_send_json("Invalid input.");
    }

    $api_key = 'a830998e5453e63e5bdbe4af';
    $api_url = "https://open.er-api.com/v6/latest/{$from}?apikey={$api_key}";

    $response = wp_remote_get($api_url);
    
    if (is_wp_error($response)) {
        wp_send_json("Error occurred while fetching data.");
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body);

    if ($data && isset($data->rates->$to)) {
        $rate = $data->rates->$to;
        $total= $amount * $rate ;
        $converted = $total ;
        wp_send_json($converted);
    } else {
        wp_send_json("Invalid currency code or conversion rate not available.");    
    }
}

add_action('wp_ajax_currency_converter', 'currency_converter_ajax_callback');
add_action('wp_ajax_nopriv_currency_converter', 'currency_converter_ajax_callback');


?>


