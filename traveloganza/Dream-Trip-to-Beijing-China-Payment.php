<?php
/* Template Name: Dream-Trip-to-Beijing-China-Payment
 * Develope by:siddharth singh
 * Email:siddharthsingh91@gmail.com
 * Author url:fileworld.in
 * @link http://fileworld.in
 * @package Siddharth Singh
 * @subpackage Siddharth Custom page
 * @since Custom Page 1.0
 */ 
 get_header(); ?>
<script src="<?php bloginfo('template_directory'); ?>/js/sidd.js" type="text/javascript"></script>
<?php if(!empty($_POST))
{
  
  $data = $_POST;
  $os0 = $_POST["os0"];
  $planText = "Select Plan One";
  if($os0 == "" || $os0 == 0)
  {
    $os0 = $_POST["os1"];
    $planText = "Select Plan Two";
  if($os0 == "" || $os0 == 0){
	  $os0 = $_POST["os2"];
    $planText = "Select Plan Two";
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

die;
}


 ?>

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
          <div class="style7" align="center">Dream Trip to Beijing China Payment<br />
            June 16 - 24, 2016</div>
          <p class="blogtitle" align="center">Pay by PayPal</p>
          <div align="center"><img src="<?php bloginfo('template_directory'); ?>/images/paypal.jpg" /> </div>
          <div align="center"> If you have a PayPal account, use this option to make a payment. <br />
          </div>
          <div>&nbsp;</div>
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
                <option value="Full payment (adult)">Full payment (adult) $2,975 USD</option>
                <option value="Or 1st Deposit:">Or 1st Deposit: $725 USD</option>
                <option value="Full Balance:">Full Balance: $2,250 USD</option>
                <option value="OR 2nd Deposit">OR 2nd Deposit $750 </option>
                <option value="OR 3rd Deposit">OR 3rd Deposit $750 </option>
                <option value="OR 4th Deposit">OR 4th Depositt $750 </option>
                <option value="OPTIONAL: Single occupancy: $680(additional)">OPTIONAL: Single occupancy: $680(additional)</option>
                <option value="OPTIONAL: CME for Physicians $300">OPTIONAL: CME for Physicians $300</option>
                <option value="OPTIONAL: CEU/CME for non-Physicians $200">OPTIONAL: CEU/CME for non-Physicians $200</option>
              </select>
            </div>
                <input type="hidden" name="currency_code" value="USD">
                <input type="hidden" name="option_select0" value="Full payment (adult)">
                <input type="hidden" name="option_amount0" value="3064.25">
                <input type="hidden" name="option_select1" value="Or Deposit:">
                <input type="hidden" name="option_amount1" value="746.75">
                <input type="hidden" name="option_select2" value="Or Full Balance: ">
                <input type="hidden" name="option_amount2" value="2317.5">
                <input type="hidden" name="option_select3" value="OR 2nd Deposit">
                <input type="hidden" name="option_amount3" value="772.5">
                <input type="hidden" name="option_select3" value="OR 3nd Deposit">
                <input type="hidden" name="option_amount3" value="772.5">
                <input type="hidden" name="option_select3" value="OR 3nd Deposit">
                <input type="hidden" name="option_amount3" value="772.5">
                
                <input type="hidden" name="option_select3" value="OPTIONAL: Single occupancy:">
                <input type="hidden" name="option_amount3" value="700.4">
                <input type="hidden" name="option_select3" value="OPTIONAL: CME for Physicians:">
                <input type="hidden" name="option_amount3" value="309">
                <input type="hidden" name="option_select3" value="OPTIONAL: CEU/CME for non-Physicians:">
                <input type="hidden" name="option_amount3" value="206">
                
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
                <option value="Full payment:">Full payment $5,950 USD</option>
                <option value="OR 1st Deposit">OR 1st Deposit: $1,450 </option>
                <option value="OR Full Balance:">OR Full Balance: $4,500 </option>
                <option value="OR 2nd Deposit:">OR 2nd Deposit: $1,500 </option>
                <option value="OR 3nd Deposit:">OR 3nd Deposit: $1,500 </option>
                <option value="OR 4th Deposit:">OR 4th Deposit: $1,500 </option>
              </select>
            </div>
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="option_select0" value="Full  payment">
            <input type="hidden" name="option_amount0" value="6128.5">
            <input type="hidden" name="option_select1" value="OR Deposit 1st Deposit:	">
            <input type="hidden" name="option_amount1" value="1493.5">
            <input type="hidden" name="option_select2" value="OR Full Balance:">
            <input type="hidden" name="option_amount2" value="4635">
            
            <input type="hidden" name="option_select2" value="OR 2nd Deposit:">
            <input type="hidden" name="option_amount2" value="1545">
            <input type="hidden" name="option_select2" value="OR 3nd Deposit:">
            <input type="hidden" name="option_amount2" value="1545">
            <input type="hidden" name="option_select2" value="OR 4th Deposit:">
            <input type="hidden" name="option_amount2" value="1545">
            
            <input type="hidden" name="option_index" value="0">
            <input type="image" src="<?php bloginfo('template_directory'); ?>/images/paynow.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
          </form>
          <div>&nbsp;</div>
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
                <option value="Full Payment">Full  payment $8,925.00 USD</option>
                <option value="OR 1st Deposit">OR 1st Deposit $2,175 USD</option>
                <option value="Full Balance:">Full Balance: $6,750.00 USD</option>
                <option value="Full Balance:">OR 2nd Deposit: $2,250.00 USD</option>
                <option value="Full Balance:">OR 3nd Deposit: $2,250.00 USD</option>
                <option value="Full Balance:">OR 4th Deposit: $2,250.00 USD</option>
              </select>
            </div>
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="option_select0" value="Full payment:">
            <input type="hidden" name="option_amount0" value="9192.75">
            <input type="hidden" name="option_select1" value="OR Deposit:">
            <input type="hidden" name="option_amount1" value="2240.25">
            <input type="hidden" name="option_select2" value="Full Balance:">
            <input type="hidden" name="option_amount2" value="6952.5">
            
            <input type="hidden" name="option_select2" value="OR 2nd Deposit:">
            <input type="hidden" name="option_amount2" value="2317.5">
            <input type="hidden" name="option_select2" value="OR 3nd Deposit:">
            <input type="hidden" name="option_amount2" value="2317.5">
            <input type="hidden" name="option_select2" value="OR 4nd Deposit:">
            <input type="hidden" name="option_amount2" value="2317.5">
            <input type="hidden" name="option_index" value="0">
            <input type="image" src="<?php bloginfo('template_directory'); ?>/images/paynow.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
          </form>
          <div>&nbsp;</div>
          <div>&nbsp;</div>
          <div class="blogtitle" align="center">Pay by Credit Card</div>
          <div align="center"><img src="<?php bloginfo('template_directory'); ?>/images/creditcardlogos.jpg" /><br />
            Pay by Credit Card Online <br />
            <br />
          </div>
          
          <!--credit card payment start-->
          <form  id="payment-form1" method="post">
            <span class="payment-errors"></span>
            <div class="form-row"><strong>Select 1 Traveler</strong>:<br />
              <select name="os0" class="textfeild1" id="my_select_plan">
                    <option value="0" selected="selected">Select Plan one</option>
                    <option value="" disabled="disabled">---------------------------------------------</option>
                    <option value="1.03">Test Payment $1 USD</option>
                    <option value="3064.25">Full payment $2,975 USD</option>
                    <option value="746.75">Or: 1st Deposit:$725 USD</option>
                    <option value="2317.5">Full Balance: $2,250</option>
                    <option value="772.5">OR 2nd Deposit $750 USD</option>
                    <option value="772.5">OR 3nd Deposit $750 USD</option>
                    <option value="772.5">OR 4th Deposit $750 USD</option>
                    
                    <option value="700.4">OPTIONAL: Single occupancy: $680 USD(additional)</option>
                    <option value="309">CME for Physicians: $300 USD</option>
                    <option value="206">CEU/CME for non-Physicians: $200 USD</option>
                    
              </select>
            </div>
            <br />
            <strong>OR</strong><br />
            <br />
            <div class="form-row"><strong>Select 2 Travelers</strong>:<br />
              <select name="os1" class="textfeild1" id="my_select_plan_two">
                <option value="0" selected="selected">Select Plan one</option>
                <option value="" disabled="disabled">---------------------------------------------</option>
                <option value="1.03">Test Payment $1 USD</option>
                <option value="6128.5">Full  payment $5,950   USD</option>
                <option value="1493.5">OR 1st Deposit: $1,450 USD</option>
                <option value="4635">Full Balance: $4,500   USD</option>
                
                <option value="1545">2nd Deposit: $1,500   USD</option>
                <option value="1545">3nd Deposit: $1,500  USD</option>
                <option value="1545">4th Deposit: $1,500   USD</option>
              </select>
            </div>
            <strong>OR</strong><br />
            <br />
            <div class="form-row"><strong>Select 3 Travelers</strong>:<br />
              <select name="os2" class="textfeild1" id="my_select_plan_three">
                <option value="0" selected="selected">Select Plan one</option>
                <option value="" disabled="disabled">---------------------------------------------</option>
                <option value="1.03">Test Payment $1 USD</option>
                <option value="9192.75">Full  payment $8,925 USD</option>
                <option value="2240.25">OR 1st Deposit: $2,175 USD</option>
                <option value="6952.5">Full Balance: $6,750 USD</option>
                
                <option value="2317.5">OR 2nd Deposit: $2,250 USD</option>
                <option value="2317.5">OR 3nd Deposit: $2,250 USD</option>
                <option value="2317.5">OR 4th Deposit: $2,250 USD</option>
              </select>
            </div>
            <div class="form-row">
              <label> <strong>First Name</strong>:<br />
                <input type="text" size="20" data-stripe="number" id="first_name" name="first_name" value="" class="textfeild1" placeholder="First Name*" required value=""/>
              </label>
            </div>
            <div class="form-row">
              <label> <strong>Last name</strong>:<br />
                <input type="text" size="20" data-stripe="number" id="last_name" name="last_name" value="" class="textfeild1" placeholder="Last name*" required value=""/>
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
