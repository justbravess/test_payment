<?php
require_once (dirname(__FILE__) . '/../components/libs/stripe-php-4.3.0/init.php');

$stripe = array(
  "secret_key"      => "sk_test_BQokikJOvBiI2HlWgH4olfQ2",
  "publishable_key" => "pk_test_6pRNASCoBOKtIshFeQd4XMUh"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);

?>