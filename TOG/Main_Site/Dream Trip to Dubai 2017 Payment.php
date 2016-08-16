<?php
/* Template Name: Dream Trip to Dubai 2017 Payment
 * Develope by:siddharth singh
 * Email:siddharthsingh91@gmail.com
 * Author url:fileworld.in
 * @link http://fileworld.in
 * @package Siddharth Singh
 * @subpackage Siddharth Custom page
 * @since Custom Page 1.0
 */ 
 get_header(); ?>
<script src="<?php bloginfo('template_directory'); ?>/js/sidd-barcelona.js" type="text/javascript"></script>
<?php
	if(!empty($_POST)) {
	$data = $_POST;
	$os0 = $_POST["os0"];
	$planText = "Select Plan One";
	if($os0 == "" || $os0 == 0)
	{
	$os0 = $_POST["os1"];
	$planText = "Select Plan Two";
	if($os0 == "" || $os0 == 0){
	$os0 = $_POST["os2"];
	$planText = "Select Plan three";
	if($os0 == "" || $os0 == 0){
	$os0 = $_POST["os3"];
	$planText = "Select Plan four";
	
	if($os0 == "" || $os0 == 0){
	$os0 = $_POST["os4"];
	$planText = "Select Plan five";
	
	if($os0 == "" || $os0 == 0){
	$os0 = $_POST["os5"];
	$planText = "Select Plan six";
	}
	
	if($os0 == "" || $os0 == 0){
	$os0 = $_POST["os6"];
	$planText = "Select Plan seven";
	}
	
	if($os0 == "" || $os0 == 0){
	$os0 = $_POST["os7"];
	$planText = "Select Plan Eight";
	}
	
	if($os0 == "" || $os0 == 0){
	$os0 = $_POST["os8"];
	$planText = "Select Plan Nine";
	}
	
	}
	
	}
	
	}
	}

  //$os0 = "0.1"; // testing

  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $name = $first_name." ".$last_name;

  $card_number = $_POST["card_number"];
  $card_password = $_POST["card_password"];
  $exp_month = $_POST["exp_month"];
  $exp_year = $_POST["exp_year"];
  if(strlen($exp_year) != 2)
    $exp_year = substr($exp_year,-2);

  //Uncomment the endpoint desired.
//Production URL
$url = 'https://www.myvirtualmerchant.com/VirtualMerchant/process.do';
//Demo URL
//$url = 'https://demo.myvirtualmerchant.com/VirtualMerchantDemo/process.do';
//Configuration parameters.
$ssl_merchant_id = "609925";//"004842";609925
$ssl_user_id = "Webpage";//"webpage";Webpage
$ssl_pin = "6241";//"Q7D7F8";6241
$ssl_show_form = 'false';
$ssl_result_format = 'HTML';
$ssl_test_mode = 'false ';
$ssl_receipt_link_method = 'REDG';
$ssl_receipt_link_url = 'http://traveloganza.com/t.php';
$ssl_transaction_type = 'CCSALE';
$ssl_cvv2cvc2_indicator = '1';
$ssl_first_name = $first_name;
$ssl_last_name = $last_name;

$ssl_card_number = $card_number;
$ssl_exp_date = $exp_month.$exp_year;
$ssl_amount = $os0;
$ssl_cvv2cvc2 = $card_password;


$data = "";
$data = "Client Name: $first_name $last_name\n\nCharge: $os0\n\nPlain: $planText";
file_put_contents("test.txt", $data);
//die;

//Declares base URL in the event that you are using the VM payment form.
if($ssl_show_form == 'true')
{
echo "<html><head><base href='" . $url . "'></base></head>";
}
//Dynamically builds POST request based on the information being passed into the script.
$queryString = "";
foreach($_REQUEST as $key => $value)
{
if($queryString != "")
{
$queryString .= "&";
}
$queryString .= $key . "=" . urlencode($value);
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $queryString .
"&ssl_merchant_id=$ssl_merchant_id".
"&ssl_user_id=$ssl_user_id".
"&ssl_pin=$ssl_pin".
"&ssl_transaction_type=$ssl_transaction_type".
"&ssl_cvv2cvc2_indicator=$ssl_cvv2cvc2_indicator".
"&ssl_cvv2cvc2=$ssl_cvv2cvc2".
"&ssl_show_form=$ssl_show_form".
"&ssl_result_format=$ssl_result_format".
"&ssl_test_mode=$ssl_test_mode".
"&ssl_receipt_link_method=$ssl_receipt_link_method".
"&ssl_card_number=$ssl_card_number".
"&ssl_exp_date=$ssl_exp_date".
"&ssl_amount=$ssl_amount".
"&ssl_first_name=$ssl_first_name".
"&ssl_last_name=$ssl_last_name".
"&ssl_receipt_link_url=$ssl_receipt_link_url");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_VERBOSE, true);
$result = curl_exec($ch);
curl_close($ch);
die;}?>
<div class="row margin-bottom-60 margin-side-none"> 
  <!--Heading top start-->
  <?php get_template_part( 'secondary', 'menu' ); ?>
  <!--Heading top end-->
  
  <div class="container  margin-bottom-60" role="main">
    <div class="row"> 
      <!--left section start-->
      <?php get_template_part( 'left', 'sidebar' );?>
      <!--left section end--> 
      
      <!--Main contant start-->
      <div class="col-md-6">
        <div class="section">
          <div class="style7" align="center">Dream Trip To Beijing China Payment <br />
            OCTOBER 04 - 10, 2016</div>
          <p class="blogtitle" align="center">Pay by PayPal</p>
          <div align="center"><img src="<?php bloginfo('template_directory'); ?>/images/paypal.jpg" /> </div>
          <div align="center"> If you have a PayPal account, use this option to make a payment. <br />
          </div>
          <div>&nbsp;</div>
          Payment Plan a start 
          <!--Payment Plan a start-->
          <div class="payment-plan-a">
            <h1>PAYMENT, Plan A (Early Bird)</h1>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
              <input type="hidden" name="cmd" value="_xclick">
              <input type="hidden" name="business" value="accounts@traveloganza.com">
              <input type="hidden" name="lc" value="US">
              <input type="hidden" name="item_name" value="1 Traveler">
              <input type="hidden" name="button_subtype" value="services">
              <div align="left">
                <input type="hidden" name="on0" value="1 Traveler">
                <strong>1 Traveler</strong>
                <select name="os0" class="textfeild1">
                  <option value="Full payment">Full payment $2,985.00 USD</option>
                  <option value="1st Deposit">Or: 1st Deposit: $585  USD</option>
                  <option value="Full Balance">Full Balance: $2,400 USD</option>
                  <option value="2st deposit">2st deposit $800.00 USD</option>
                  <option value="3st deposit">3st deposit $800.00 USD</option>
                  <option value="4st deposit">4st deposit $800.00 USD</option>
                  <option value="OPTIONAL Single occupancy">OPTIONAL Single occupancy:$980 (additional) USD</option>
                  <option value="CME for Physicians">CME for Physicians:$300 USD</option>
                  <option value="CEU/CME for non-Physicians">CEU/CME for non-Physicians:$200  USD</option>
                </select>
              </div>
              <input type="hidden" name="currency_code" value="USD">
              <input type="hidden" name="option_select0" value="Full payment">
              <input type="hidden" name="option_amount0" value="3074.55">
              <input type="hidden" name="option_select1" value="Or: 1st Deposit">
              <input type="hidden" name="option_amount1" value="602.55">
              <input type="hidden" name="option_select2" value="Full Balance">
              <input type="hidden" name="option_amount2" value="2472">
              <input type="hidden" name="option_select3" value="2st deposit">
              <input type="hidden" name="option_amount3" value="824">
              <input type="hidden" name="option_select4" value="3nd deposit">
              <input type="hidden" name="option_amount4" value="824">
              <input type="hidden" name="option_select5" value="4rd deposit">
              <input type="hidden" name="option_amount5" value="824">
              <input type="hidden" name="option_select6" value="OPTIONAL Single occupancy">
              <input type="hidden" name="option_amount6" value="1009.4">
              <input type="hidden" name="option_select7" value="CME for Physicians">
              <input type="hidden" name="option_amount7" value="329.4">
              <input type="hidden" name="option_select8" value="CEU/CME for non-Physicians">
              <input type="hidden" name="option_amount8" value="206">
              <input type="hidden" name="option_index" value="0">
              <input type="image" src="<?php bloginfo('template_directory'); ?>/images/paynow.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
              <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
            <div>&nbsp;</div>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
              <input type="hidden" name="cmd" value="_xclick">
              <input type="hidden" name="business" value="accounts@traveloganza.com">
              <input type="hidden" name="lc" value="US">
              <input type="hidden" name="item_name" value="2 Travelers">
              <input type="hidden" name="button_subtype" value="services">
              <input type="hidden" name="no_note" value="0">
              <input type="hidden" name="currency_code" value="USD">
              <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
              <div align="left">
                <input type="hidden" name="on0" value="2 Travelers">
                <strong>2 Travelers</strong>
                <select name="os0" class="textfeild1">
                  <option value="Full payment">Full payment $5,970.00 USD</option>
                  <option value="OR 1st Deposit">OR 1st Deposit: $1,170.00 USD</option>
                  <option value="Full Balance">Full Balance: $4,800.00 USD</option>
                  <option value="2st deposit">OR 2st deposit $1,600.00 USD</option>
                  <option value="3nd deposit">3nd deposit $1,600.00 USD</option>
                  <option value="4rd deposit">4nd deposit $1,600.00 USD</option>
                </select>
              </div>
              <input type="hidden" name="currency_code" value="USD">
              <input type="hidden" name="option_select0" value="Full  payment">
              <input type="hidden" name="option_amount0" value="6149.1">
              <input type="hidden" name="option_select1" value="OR 1st Deposit">
              <input type="hidden" name="option_amount1" value="1205.1">
              <input type="hidden" name="option_select2" value="Full Balance">
              <input type="hidden" name="option_amount2" value="4944">
              <input type="hidden" name="option_select3" value="2nd deposit">
              <input type="hidden" name="option_amount3" value="1648.00">
              <input type="hidden" name="option_select4" value="3nd deposit">
              <input type="hidden" name="option_amount4" value="1648.00">
              <input type="hidden" name="option_select5" value="4rd deposit">
              <input type="hidden" name="option_amount5" value="1648.00">
              <input type="hidden" name="option_index" value="0">
              <input type="image" src="<?php bloginfo('template_directory'); ?>/images/paynow.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
              <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
            <div>&nbsp;</div>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
              <input type="hidden" name="cmd" value="_xclick">
              <input type="hidden" name="business" value="accounts@traveloganza.com">
              <input type="hidden" name="lc" value="US">
              <input type="hidden" name="item_name" value="2 Travelers">
              <input type="hidden" name="button_subtype" value="services">
              <input type="hidden" name="no_note" value="0">
              <input type="hidden" name="currency_code" value="USD">
              <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
              <div align="left">
                <input type="hidden" name="on0" value="2 Travelers">
                <strong>3 Travelers</strong>
                <select name="os0" class="textfeild1">
                  <option value="Full payment">Full payment $8,955.00 USD</option>
                  <option value=">OR  1st Deposit">OR  1st Deposit:$1,755.00 USD</option>
                  <option value="Full Balance">Full Balance $7,200.00 USD</option>
                  <option value="2nd deposit">OR 2nd deposit $2,400.00 USD</option>
                  <option value="3nd deposit">3nd deposit $2,400.00 USD</option>
                  <option value="4rd deposit">4nd deposit $2,400.00 USD</option>
                </select>
              </div>
              <input type="hidden" name="currency_code" value="USD">
              <input type="hidden" name="option_select0" value="Full  payment">
              <input type="hidden" name="option_amount0" value="9223.65">
              <input type="hidden" name="option_select1" value=">OR  1st Deposit">
              <input type="hidden" name="option_amount1" value="1807.65">
              <input type="hidden" name="option_select2" value="Full Balance">
              <input type="hidden" name="option_amount2" value="7416">
              <input type="hidden" name="option_select3" value="OR 2nd deposit">
              <input type="hidden" name="option_amount3" value="2472">
              <input type="hidden" name="option_select4" value="3nd deposit">
              <input type="hidden" name="option_amount4" value="2472">
              <input type="hidden" name="option_select5" value="4rd deposit">
              <input type="hidden" name="option_amount5" value="2472">
              <input type="hidden" name="option_index" value="0">
              <input type="image" src="<?php bloginfo('template_directory'); ?>/images/paynow.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
              <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
          </div>
          <!--Payment Plan a end--> 
          
          <!--Payment Plan b start-->
          <!--<div class="payment-plan-b">
            <h1>PAYMENT, Plan B (Regular)</h1>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
              <input type="hidden" name="cmd" value="_xclick">
              <input type="hidden" name="business" value="accounts@traveloganza.com">
              <input type="hidden" name="lc" value="US">
              <input type="hidden" name="item_name" value="1 Traveler">
              <input type="hidden" name="button_subtype" value="services">
              <div align="left">
                <input type="hidden" name="on0" value="1 Traveler">
                <strong>1 Traveler</strong>
                <select name="os0" class="textfeild1">
                  <option value="Full payment">Full payment $3,185.00 USD</option>
                  <option value="1st Deposit">1st Deposit $725 USD</option>
                  <option value="Full Balance">Full Balance $2,460  USD</option>
                  <option value="OR 2nd Deposit">OR 2nd Deposit $750.00 USD</option>
                  <option value="3rd deposit">3rd deposit $750.00 USD</option>
                  <option value="4th deposit">4th deposit $750.00 USD</option>
                  <option value="5th deposit">5th deposit $210.00 USD</option>
                  <option value="OPTIONAL: Single occupancy:">OPTIONAL: Single occupancy: $680 (additional) USD</option>
                  <option value="CME for Physicians	">CME for Physicians $300.00 USD</option>
                  <option value="CEU/CME for non-Physicians">CEU/CME for non-Physicians $200.00 USD</option>
                </select>
              </div>
              <input type="hidden" name="currency_code" value="USD">
              <input type="hidden" name="option_select0" value="Full payment">
              <input type="hidden" name="option_amount0" value="3280.55">
              <input type="hidden" name="option_select1" value="1st Deposit">
              <input type="hidden" name="option_amount1" value="746.75">
              <input type="hidden" name="option_select2" value="Full Balance">
              <input type="hidden" name="option_amount2" value="2533.8">
              <input type="hidden" name="option_select5" value="OR 2nd deposit">
              <input type="hidden" name="option_amount5" value="772.5">
              <input type="hidden" name="option_select6" value="3rd deposit">
              <input type="hidden" name="option_amount6" value="772.5">
              <input type="hidden" name="option_select7" value="4th deposit">
              <input type="hidden" name="option_amount7" value="772.5">
              <input type="hidden" name="option_select8" value="5th deposit">
              <input type="hidden" name="option_amount8" value="216.3">
              <input type="hidden" name="option_select9" value="OPTIONAL: Single occupancy">
              <input type="hidden" name="option_amount9" value="700.4">
              <input type="hidden" name="option_select9" value="CME for Physicians">
              <input type="hidden" name="option_amount9" value="309">
              <input type="hidden" name="option_select9" value="CEU/CME for non-Physicians">
              <input type="hidden" name="option_amount9" value="206">
              <input type="hidden" name="option_index" value="0">
              <input type="image" src="<?php bloginfo('template_directory'); ?>/images/paynow.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
              <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
            <div>&nbsp;</div>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
              <input type="hidden" name="cmd" value="_xclick">
              <input type="hidden" name="business" value="accounts@traveloganza.com">
              <input type="hidden" name="lc" value="US">
              <input type="hidden" name="item_name" value="2 Travelers">
              <input type="hidden" name="button_subtype" value="services">
              <input type="hidden" name="no_note" value="0">
              <input type="hidden" name="currency_code" value="USD">
              <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
              <div align="left">
                <input type="hidden" name="on0" value="2 Travelers">
                <strong>2 Travelers</strong>
                <select name="os0" class="textfeild1">
                  <option value="Full payment">Full payment $6,370.00 USD</option>
                  <option value="OR 1st Deposit">OR 1st Deposit: $1,450.00 USD</option>
                  <option value="Full Balance">Full Balance: $4,920.00 USD</option>
                  <option value="2st deposit">OR 2st deposit $1,500.00 USD</option>
                  <option value="3nd deposit">3nd deposit $1,500.00 USD</option>
                  <option value="4th deposit">4th deposit $1,500.00 USD</option>
                  <option value="5th deposit">5th deposit $1,500.00 USD</option>
                </select>
              </div>
              <input type="hidden" name="currency_code" value="USD">
              <input type="hidden" name="option_select0" value="Full  payment">
              <input type="hidden" name="option_amount0" value="6561.1">
              <input type="hidden" name="option_select1" value="OR 1st Deposit">
              <input type="hidden" name="option_amount1" value="1493.5">
              <input type="hidden" name="option_select2" value="Full Balance">
              <input type="hidden" name="option_amount2" value="5067.6">
              <input type="hidden" name="option_select3" value="2nd deposit">
              <input type="hidden" name="option_amount3" value="1545.00">
              <input type="hidden" name="option_select4" value="3nd deposit">
              <input type="hidden" name="option_amount4" value="1545.00">
              <input type="hidden" name="option_select5" value="4rd deposit">
              <input type="hidden" name="option_amount5" value="1545.00">
              <input type="hidden" name="option_select5" value="5th deposit">
              <input type="hidden" name="option_amount5" value="432.6">
              <input type="hidden" name="option_index" value="0">
              <input type="image" src="<?php bloginfo('template_directory'); ?>/images/paynow.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
              <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
            <div>&nbsp;</div>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
              <input type="hidden" name="cmd" value="_xclick">
              <input type="hidden" name="business" value="accounts@traveloganza.com">
              <input type="hidden" name="lc" value="US">
              <input type="hidden" name="item_name" value="2 Travelers">
              <input type="hidden" name="button_subtype" value="services">
              <input type="hidden" name="no_note" value="0">
              <input type="hidden" name="currency_code" value="USD">
              <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
              <div align="left">
                <input type="hidden" name="on0" value="2 Travelers">
                <strong>3 Travelers</strong>
                <select name="os0" class="textfeild1">
                  <option value="Full payment">Full payment $9,555.00 USD</option>
                  <option value=">OR  1st Deposit">OR  1st Deposit:$2,175.00 USD</option>
                  <option value="Full Balance">Full Balance $7,380.00 USD</option>
                  <option value="2nd deposit">OR 2nd deposit $2,250.00 USD</option>
                  <option value="3rd deposit">3rd deposit $2,250.00 USD</option>
                  <option value="4th deposit">4th deposit $2,250.00 USD</option>
                  <option value="5th deposit">5th deposit $750.00 USD</option>
                </select>
              </div>
              <input type="hidden" name="currency_code" value="USD">
              <input type="hidden" name="option_select0" value="Full  payment">
              <input type="hidden" name="option_amount0" value="9841.65">
              <input type="hidden" name="option_select1" value=">OR  1st Deposit">
              <input type="hidden" name="option_amount1" value="2240.25">
              <input type="hidden" name="option_select2" value="Full Balance">
              <input type="hidden" name="option_amount2" value="7601.4">
              <input type="hidden" name="option_select3" value="OR 2nd deposit">
              <input type="hidden" name="option_amount3" value="2317.5">
              <input type="hidden" name="option_select4" value="3rd deposit">
              <input type="hidden" name="option_amount4" value="2317.5">
              <input type="hidden" name="option_select5" value="4th deposit">
              <input type="hidden" name="option_amount5" value="2317.5">
              <input type="hidden" name="option_select5" value="5th deposit">
              <input type="hidden" name="option_amount5" value="772.5">
              <input type="hidden" name="option_index" value="0">
              <input type="image" src="<?php bloginfo('template_directory'); ?>/images/paynow.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
              <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
          </div>-->
          <!--Payment Plan b end--> 
          
          <!--Payment Plan c start-->
          <!--<div class="payment-plan-c">
            <h1>PAYMENT, Plan C ( (Late Entry)</h1>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
              <input type="hidden" name="cmd" value="_xclick">
              <input type="hidden" name="business" value="accounts@traveloganza.com">
              <input type="hidden" name="lc" value="US">
              <input type="hidden" name="item_name" value="1 Traveler">
              <input type="hidden" name="button_subtype" value="services">
              <div align="left">
                <input type="hidden" name="on0" value="1 Traveler">
                <strong>1 Traveler</strong>
                <select name="os0" class="textfeild1">
                  <option value="Full payment">Full payment $3,335.00 USD</option>
                  <option value="OPTIONAL: Single occupancy:">OPTIONAL: Single occupancy: $680 (additional) USD</option>
                  <option value="CME for Physicians	">CME for Physicians $300.00 USD</option>
                  <option value="CEU/CME for non-Physicians">CEU/CME for non-Physicians $200.00 USD</option>
                </select>
              </div>
              <input type="hidden" name="currency_code" value="USD">
              <input type="hidden" name="option_select0" value="Full payment">
              <input type="hidden" name="option_amount0" value="3435.05">
              <input type="hidden" name="option_select9" value="OPTIONAL: Single occupancy">
              <input type="hidden" name="option_amount9" value="700.4">
              <input type="hidden" name="option_select9" value="CME for Physicians">
              <input type="hidden" name="option_amount9" value="309">
              <input type="hidden" name="option_select9" value="CEU/CME for non-Physicians">
              <input type="hidden" name="option_amount9" value="206">
              <input type="hidden" name="option_index" value="0">
              <input type="image" src="<?php bloginfo('template_directory'); ?>/images/paynow.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
              <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
            <div>&nbsp;</div>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
              <input type="hidden" name="cmd" value="_xclick">
              <input type="hidden" name="business" value="accounts@traveloganza.com">
              <input type="hidden" name="lc" value="US">
              <input type="hidden" name="item_name" value="2 Travelers">
              <input type="hidden" name="button_subtype" value="services">
              <input type="hidden" name="no_note" value="0">
              <input type="hidden" name="currency_code" value="USD">
              <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
              <div align="left">
                <input type="hidden" name="on0" value="2 Travelers">
                <strong>2 Travelers</strong>
                <select name="os0" class="textfeild1">
                  <option value="Full payment">Full payment $6,670.00 USD</option>
                </select>
              </div>
              <input type="hidden" name="currency_code" value="USD">
              <input type="hidden" name="option_select0" value="Full  payment">
              <input type="hidden" name="option_amount0" value="6870.1">
              <input type="hidden" name="option_index" value="0">
              <input type="image" src="<?php bloginfo('template_directory'); ?>/images/paynow.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
              <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
            <div>&nbsp;</div>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
              <input type="hidden" name="cmd" value="_xclick">
              <input type="hidden" name="business" value="accounts@traveloganza.com">
              <input type="hidden" name="lc" value="US">
              <input type="hidden" name="item_name" value="2 Travelers">
              <input type="hidden" name="button_subtype" value="services">
              <input type="hidden" name="no_note" value="0">
              <input type="hidden" name="currency_code" value="USD">
              <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
              <div align="left">
                <input type="hidden" name="on0" value="2 Travelers">
                <strong>3 Travelers</strong>
                <select name="os0" class="textfeild1">
                  <option value="Full payment">Full payment $10,005.00 USD</option>
                </select>
              </div>
              <input type="hidden" name="currency_code" value="USD">
              <input type="hidden" name="option_select0" value="Full  payment">
              <input type="hidden" name="option_amount0" value="10305.15">
              <input type="hidden" name="option_index" value="0">
              <input type="image" src="<?php bloginfo('template_directory'); ?>/images/paynow.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
              <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
          </div>-->
          <!--Payment Plan c end--> 
          
          <!--credit card payment start-->
          <form  id="payment-form1" method="post">
            <span class="payment-errors"></span> 
            <!--Plan A start-->
            <section class="a-start">
              <h1>PAYMENT, Plan A (Early Bird)</h1>
              <div class="form-row"><strong>Select 1 Traveler</strong>:<br />
                <select name="os0" class="textfeild1" id="my_select_plan">
                  <option value="0" selected="selected">Select Plan one</option>
                  <option value="" disabled="disabled">---------------------------------------------</option>
                  <option value="3064.25">Full payment $2,985.00 USD</option>
                  <option value="746.75">Or:1st Deposit:$585.00 USD</option>
                  <option value="2317.5">Full Balance:  $2,400.00 USD</option>
                  <option value="772.5">OR 2nd deposit $800.00 USD</option>
                  <option value="772.5">3rd deposit $800.00 USD</option>
                  <option value="772.5">4th deposit $800.00 USD</option>
                  <option value="700.4">Single occupancy: $980 USD(additional)</option>
                  <option value="309">CME for Physicians: $300 USD(additional)</option>
                  <option value="206">CEU/CME for non-Physicians: $200 USD(additional)</option>
                </select>
              </div>
              <br />
              <strong>OR</strong><br />
              <br />
              <div class="form-row"><strong>Select 2 Travelers</strong>:<br />
                <select name="os1" class="textfeild1" id="my_select_plan_two">
                  <option value="0" selected="selected">Select Plan one</option>
                  <option value="" disabled="disabled">---------------------------------------------</option>
                  <option value="6128.5">Full payment $5,970.00 USD</option>
                  <option value="1493.5">Or:1st Deposit:$1,170.00 USD</option>
                  <option value="4635">Full Balance:  $4,800.00 USD</option>
                  <option value="1545">OR 2nd deposit $1600.00 USD</option>
                  <option value="1545">3rd deposit $1600.00 USD</option>
                  <option value="1545">4th deposit $1600.00 USD</option>
                </select>
              </div>
              <strong>OR</strong><br />
              <br />
              <div class="form-row"><strong>Select 3 Travelers</strong>:<br />
                <select name="os2" class="textfeild1" id="my_select_plan_three">
                  <option value="0" selected="selected">Select Plan one</option>
                  <option value="" disabled="disabled">---------------------------------------------</option>
                  <option value="9192.75">Full payment $8,955.00 USD</option>
                  <option value="2240.25">Or:1st Deposit:$1,755.00 USD</option>
                  <option value="6952.5">Full Balance:  $7,200.00 USD</option>
                  <option value="2317.5">OR 2nd deposit $2,400.00 USD</option>
                  <option value="2317.5">3rd deposit $2,400.00 USD</option>
                  <option value="2317.5">4th deposit $2,400.00 USD</option>
                </select>
              </div>
              <br />
              <br />
            </section>
            <!--Plan A end--> 
            
            <!--Plan B start-->
            <!--<section class="B-start">
              <h1>PAYMENT, Plan B (Regular)</h1>
              <div class="form-row"><strong>Select 1 Traveler</strong>:<br />
                <select name="os3" class="textfeild1" id="my_select_plan_four">
                  <option value="0" selected="selected">Select Plan one</option>
                  <option value="" disabled="disabled">---------------------------------------------</option>
                  <option value="3280.55">Full payment $3,185.00 USD</option>
                  <option value="746.75">Or:1st Deposit:$725.00 USD</option>
                  <option value="2533.8">Full Balance:  $2,460.00 USD</option>
                  <option value="772.5">OR 2nd deposit $750.00 USD</option>
                  <option value="772.5">3rd deposit $750.00 USD</option>
                  <option value="772.5">4th deposit $750.00 USD</option>
                  <option value="216.3">4th deposit $210.00 USD</option>
                  <option value="700.4">Single occupancy: $680 USD(additional)</option>
                  <option value="309">CME for Physicians: $300 USD(additional)</option>
                  <option value="206">CEU/CME for non-Physicians: $200 USD(additional)</option>
                </select>
              </div>
              <br />
              <strong>OR</strong><br />
              <br />
              <div class="form-row"><strong>Select 2 Travelers</strong>:<br />
                <select name="os4" class="textfeild1" id="my-select-five">
                  <option value="0" selected="selected">Select Plan one</option>
                  <option value="" disabled="disabled">---------------------------------------------</option>
                  <option value="6128.5">Full payment $6,370.00 USD</option>
                  <option value="1493.5">Or:1st Deposit:$1,450.00 USD</option>
                  <option value="4635">Full Balance:  $4,920.00 USD</option>
                  <option value="1545">OR 2nd deposit $1500.00 USD</option>
                  <option value="1545">3rd deposit $1500.00 USD</option>
                  <option value="1545">4th deposit $1500.00 USD</option>
                  <option value="432.6">5th deposit $420.00 USD</option>
                </select>
              </div>
              <strong>OR</strong><br />
              <br />
              <div class="form-row"><strong>Select 3 Travelers</strong>:<br />
                <select name="os5" class="textfeild1" id="my-select-six">
                  <option value="0" selected="selected">Select Plan one</option>
                  <option value="" disabled="disabled">---------------------------------------------</option>
                  <option value="9192.75">Full payment $9,555.00 USD</option>
                  <option value="2240.25">Or:1st Deposit:$2,175.00 USD</option>
                  <option value="6952.5">Full Balance:  $7,380.00 USD</option>
                  <option value="2317.5">OR 2nd deposit $2,250.00 USD</option>
                  <option value="2317.5">3rd deposit $2,250.00 USD</option>
                  <option value="2317.5">4th deposit $2,250.00 USD</option>
                  <option value="772.5">5th deposit $750.00 USD</option>
                </select>
              </div>
            </section>-->
            <!--Plan B end--> 
            
            <!--Plan C start-->
            <!--<section class="c-start">
              <h1>PAYMENT, Plan C (Late Entry)</h1>
              <div class="form-row"><strong>Select 1 Traveler</strong>:<br />
                <select name="os6" class="textfeild1" id="my_select_plan_four">
                  <option value="0" selected="selected">Select Plan one</option>
                  <option value="" disabled="disabled">---------------------------------------------</option>
                  <option value="1.03">Test 1$</option>
                  <option value="3435.05">Full payment $3,335.00 USD</option>
                  <option value="700.4">Single occupancy: $680 USD(additional)</option>
                  <option value="309">CME for Physicians: $300 USD(additional)</option>
                  <option value="206">CEU/CME for non-Physicians: $200 USD(additional)</option>
                </select>
              </div>
              <br />
              <strong>OR</strong><br />
              <br />
              <div class="form-row"><strong>Select 2 Travelers</strong>:<br />
                <select name="os7" class="textfeild1" id="my-select-five">
                  <option value="0" selected="selected">Select Plan one</option>
                  <option value="" disabled="disabled">---------------------------------------------</option>
                  <option value="1.03">Test 1$</option>
                  <option value="6870.1">Full payment $6,670.00 USD</option>
                </select>
              </div>
              <strong>OR</strong><br />
              <br />
              <div class="form-row"><strong>Select 3 Travelers</strong>:<br />
                <select name="os8" class="textfeild1" id="my-select-six">
                  <option value="0" selected="selected">Select Plan one</option>
                  <option value="" disabled="disabled">---------------------------------------------</option>
                  <option value="1.03">Test 1$</option>
                  <option value="10305.15">Full payment $10,005.00 USD</option>
                </select>
              </div>
            </section>-->
            <!--Plan C end-->
            
            <div class="form-row">
              <label> <strong>First Name</strong>:<br />
                <input type="text" size="20" data-stripe="number" id="first_name" name="first_name" value="" class="textfeild1" placeholder="First Name*" required />
              </label>
            </div>
            <div class="form-row">
              <label> <strong>Last name</strong>:<br />
                <input type="text" size="20" data-stripe="number" id="last_name" name="last_name" value="" class="textfeild1" placeholder="Last name*" required />
              </label>
            </div>
            <div class="form-row">
              <label> <strong>Card Number </strong>:<br />
                <input type="text" size="20" data-stripe="number" id="card_number" name="card_number" value="" class="textfeild1" placeholder="Card Number"/>
              </label>
            </div>
            <div class="form-row">
              <label> <strong>CVC</strong>:<br />
                <input type="text" size="4" data-stripe="cvc" id="card_password" name="card_password" value="" class="textfeild2" placeholder="XXX"/>
              </label>
            </div>
            <div class="form-row">
              <label> <span><strong>Expiration</strong> (MM/YYYY)</span> :<br />
                <input type="text" size="2" data-stripe="exp-month" id="exp_month" name="exp_month" value="" class="textfeild2" placeholder="MM"/>
              </label>
              <span> / </span>
              <input type="text" size="4" data-stripe="exp-year" id="exp_year" name="exp_year" value="" class="textfeild2" placeholder="YYYY"/>
            </div>
            <div>&nbsp;</div>
            <button type="submit" class="submit">Make A Payment</button>
          </form>
          <!--credit card payment end-->
          
          <p>&nbsp;</p>
        </div>
      </div>
      <!--Main contant end--> 
      
      <!--right section start-->
      <?php get_template_part( 'right', 'sidebar' );?>
      <!--right section end-->
      
      <div class="clear">&nbsp;</div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
