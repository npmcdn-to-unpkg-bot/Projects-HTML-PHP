<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Become a Super Model for a $1. Submit your Selfie today!</title>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="/favicon.png" sizes="32x32" type="image/png" rel="icon">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="container">
  <div class="center-block"> <img src="img/banner.jpg" class="img-responsive"/> </div>
  <div class="row">
    <div class="col-md-6">
      <h1 class="text-white">Submit Your Selfie !</h1>
    </div>
    <div class="col-md-6">
      <ul class="menu">
        <li class="leaf menu-mlid"><a class="facebook path-https--wwwfacebookcom-" href="https://www.facebook.com">Facebook</a></li>
        <li class="leaf menu-mlid"><a class="twitter path-https--twittercom-etrapanob" href="https://twitter.com/ETRAPANOB">Twitter</a></li>
        <li class="leaf menu-mlid"><a class="instagram path-https--instagramcom" href="https://instagram.com">Instagram</a></li>
        <li class="leaf menu-mlid"><a class="soundcloud path-https--soundcloudcom" href="https://soundcloud.com">Soundcloud</a></li>
        <li class="leaf menu-mlid"><a class="google-plus path-https--plusgooglecom-" rel="publisher" href="https://plus.google.com">Google+</a></li>
      </ul>
      <div class="menu">
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><span class="divider">///</span> </li>
            <li><a href="biography.html">About Us</a></li>
            <li><span class="divider">///</span></li>
            <li><a href="photos.php">Photos</a></li>
            <li><span class="divider">///</span></li>
            <li><a href="model-submission.php">Model Submission</a></li>
            <li><span class="divider">///</span></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="detail-text"> 
        <p>We are the first National Magazine that allows talent to skip red tape and submit "Finished Images" directly to us!!! So for $1 submit your SexySelfie and be published on New Stands around the WORLD!!!</p>

<p><span class="red-color">Fill out the info boxes, then click on the "link" box beside the " Refer Link " which will take you to http://www.ezgeekme.com/ to create a profile. After it's created put that "one" link into the "Refer Link" box because thats the only link we're going to use if selected for our magazine as a way for others to find you (simplifying for us), upload your pics for review, include processing fee, and share on all social media with the hashtag #sexyselfiemagazine and you're complete!!</span> <br/><br/>We except all types of selfies from swimsuit, lingerie, athletic, headshots, group shots, etc. aslong as it's "SEXY"!!! If Chosen you will be notified via email, which then its your job to get all of your fans to like and share your image to be in our International Magazine!!! So Have fun,Spread the word and GOODLUCK!!</p>

<p>Like our page here for updates >>> <a href="https://www.facebook.com/SexySelfie-Magazine-780911515351280/" class="box-new">REFER LINK</a></a></p>
      </div>
    </div>
    <div class="col-md-6">
      <?php if(isset($_GET['message'])){ ?>
      <div class="main-sucess">
        <h4 class="text-white">Your Selfie Submitted Successfully, Please pay using below button to complete your process</h4>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
          <input type="hidden" name="cmd" value="_xclick">
          <input type="hidden" name="business" value="1squarebiz@gmail.com">
          <input type="hidden" name="lc" value="US">
          <input type="hidden" name="item_name" value="1 Traveler">
          <input type="hidden" name="button_subtype" value="services">
          <div align="left">
            <input type="hidden" name="on0" value="1 Traveler">
            <p class="text-white"><strong>You have to pay
              <?=$_GET['category'];?>
              </strong></p>
            <select name="os0" class="textfeild1" style="display:none;">
              <option value="Full">Full payment (adult)
              <?=$_GET['category'];?>
              $</option>
            </select>
          </div>
          <input type="hidden" name="currency_code" value="USD">
          <input type="hidden" name="option_select0" value="Full">
          <input type="hidden" name="option_amount0" value="<?=$_GET['category'];?>">
          <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
          <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>
      </div>
      <?php }else{?>
      <form id="webform-client-form-939" method="post" action="function/index.php" enctype="multipart/form-data">
        <div class="main-view">
          <div class="form-group">
            <label for="edit-submitted-e-mail">E-mail <span title="This field is required." class="form-required">*</span></label>
            <input type="email" size="60" name="e_mail" id="edit-submitted-e-mail" class="form-control">
          </div>
          <div class="form-group">
            <label for="edit-submitted-first-name">First name <span title="This field is required." class="form-required">*</span></label>
            <input type="text" class="form-control" maxlength="128" size="60" value="" name="first_name" required>
          </div>
          <div class="form-group">
            <label for="edit-submitted-last-name">Last name <span title="This field is required." class="form-required">*</span></label>
            <input type="text" class="form-control" maxlength="128" size="60" value="" name="last_name" required>
          </div>
          <div class="form-group">
            <label for="edit-submitted-last-name">Refer Link <span title="This field is required." class="form-required">*</span></label>
             <div class="row">
             <div class="col-md-10">
            <input type="text" class="form-control" maxlength="128" size="60" value="" name="reffer_link" required>
             </div>
             <div class="col-md-2"><a class="btn btn-default" href="http://www.ezgeekme.com/" role="button">Link</a></div>
             </div>
          </div>
          <div class="form-group">
            <label for="edit-submitted-country">Country <span title="This field is required." class="form-required">*</span></label>
            <select class="form-control" name="country" required>
              <option value="">- Select -</option>
              <option value="AF">Afghanistan</option>
              <option value="AX">Aland Islands</option>
              <option value="AL">Albania</option>
              <option value="DZ">Algeria</option>
              <option value="AS">American Samoa</option>
              <option value="AD">Andorra</option>
              <option value="AO">Angola</option>
              <option value="AI">Anguilla</option>
              <option value="AQ">Antarctica</option>
              <option value="AG">Antigua and Barbuda</option>
              <option value="AR">Argentina</option>
              <option value="AM">Armenia</option>
              <option value="AW">Aruba</option>
              <option value="AU">Australia</option>
              <option value="AT">Austria</option>
              <option value="AZ">Azerbaijan</option>
              <option value="BS">Bahamas</option>
              <option value="BH">Bahrain</option>
              <option value="BD">Bangladesh</option>
              <option value="BB">Barbados</option>
              <option value="BY">Belarus</option>
              <option value="BE">Belgium</option>
              <option value="BZ">Belize</option>
              <option value="BJ">Benin</option>
              <option value="BM">Bermuda</option>
              <option value="BT">Bhutan</option>
              <option value="BO">Bolivia</option>
              <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
              <option value="BA">Bosnia and Herzegovina</option>
              <option value="BW">Botswana</option>
              <option value="BV">Bouvet Island</option>
              <option value="BR">Brazil</option>
              <option value="IO">British Indian Ocean Territory</option>
              <option value="VG">British Virgin Islands</option>
              <option value="BN">Brunei</option>
              <option value="BG">Bulgaria</option>
              <option value="BF">Burkina Faso</option>
              <option value="BI">Burundi</option>
              <option value="KH">Cambodia</option>
              <option value="CM">Cameroon</option>
              <option value="CA">Canada</option>
              <option value="CV">Cape Verde</option>
              <option value="KY">Cayman Islands</option>
              <option value="CF">Central African Republic</option>
              <option value="TD">Chad</option>
              <option value="CL">Chile</option>
              <option value="CN">China</option>
              <option value="CX">Christmas Island</option>
              <option value="CC">Cocos (Keeling) Islands</option>
              <option value="CO">Colombia</option>
              <option value="KM">Comoros</option>
              <option value="CG">Congo (Brazzaville)</option>
              <option value="CD">Congo (Kinshasa)</option>
              <option value="CK">Cook Islands</option>
              <option value="CR">Costa Rica</option>
              <option value="HR">Croatia</option>
              <option value="CU">Cuba</option>
              <option value="CW">Curaçao</option>
              <option value="CY">Cyprus</option>
              <option value="CZ">Czech Republic</option>
              <option value="DK">Denmark</option>
              <option value="DJ">Djibouti</option>
              <option value="DM">Dominica</option>
              <option value="DO">Dominican Republic</option>
              <option value="EC">Ecuador</option>
              <option value="EG">Egypt</option>
              <option value="SV">El Salvador</option>
              <option value="GQ">Equatorial Guinea</option>
              <option value="ER">Eritrea</option>
              <option value="EE">Estonia</option>
              <option value="ET">Ethiopia</option>
              <option value="FK">Falkland Islands</option>
              <option value="FO">Faroe Islands</option>
              <option value="FJ">Fiji</option>
              <option value="FI">Finland</option>
              <option value="FR">France</option>
              <option value="GF">French Guiana</option>
              <option value="PF">French Polynesia</option>
              <option value="TF">French Southern Territories</option>
              <option value="GA">Gabon</option>
              <option value="GM">Gambia</option>
              <option value="GE">Georgia</option>
              <option selected="selected" value="US">United States</option>
              <option value="DE">Germany</option>
              <option value="GH">Ghana</option>
              <option value="GI">Gibraltar</option>
              <option value="GR">Greece</option>
              <option value="GL">Greenland</option>
              <option value="GD">Grenada</option>
              <option value="GP">Guadeloupe</option>
              <option value="GU">Guam</option>
              <option value="GT">Guatemala</option>
              <option value="GG">Guernsey</option>
              <option value="GN">Guinea</option>
              <option value="GW">Guinea-Bissau</option>
              <option value="GY">Guyana</option>
              <option value="HT">Haiti</option>
              <option value="HM">Heard Island and McDonald Islands</option>
              <option value="HN">Honduras</option>
              <option value="HK">Hong Kong S.A.R., China</option>
              <option value="HU">Hungary</option>
              <option value="IS">Iceland</option>
              <option value="IN">India</option>
              <option value="ID">Indonesia</option>
              <option value="IR">Iran</option>
              <option value="IQ">Iraq</option>
              <option value="IE">Ireland</option>
              <option value="IM">Isle of Man</option>
              <option value="IL">Israel</option>
              <option value="IT">Italy</option>
              <option value="CI">Ivory Coast</option>
              <option value="JM">Jamaica</option>
              <option value="JP">Japan</option>
              <option value="JE">Jersey</option>
              <option value="JO">Jordan</option>
              <option value="KZ">Kazakhstan</option>
              <option value="KE">Kenya</option>
              <option value="KI">Kiribati</option>
              <option value="KW">Kuwait</option>
              <option value="KG">Kyrgyzstan</option>
              <option value="LA">Laos</option>
              <option value="LV">Latvia</option>
              <option value="LB">Lebanon</option>
              <option value="LS">Lesotho</option>
              <option value="LR">Liberia</option>
              <option value="LY">Libya</option>
              <option value="LI">Liechtenstein</option>
              <option value="LT">Lithuania</option>
              <option value="LU">Luxembourg</option>
              <option value="MO">Macao S.A.R., China</option>
              <option value="MK">Macedonia</option>
              <option value="MG">Madagascar</option>
              <option value="MW">Malawi</option>
              <option value="MY">Malaysia</option>
              <option value="MV">Maldives</option>
              <option value="ML">Mali</option>
              <option value="MT">Malta</option>
              <option value="MH">Marshall Islands</option>
              <option value="MQ">Martinique</option>
              <option value="MR">Mauritania</option>
              <option value="MU">Mauritius</option>
              <option value="YT">Mayotte</option>
              <option value="MX">Mexico</option>
              <option value="FM">Micronesia</option>
              <option value="MD">Moldova</option>
              <option value="MC">Monaco</option>
              <option value="MN">Mongolia</option>
              <option value="ME">Montenegro</option>
              <option value="MS">Montserrat</option>
              <option value="MA">Morocco</option>
              <option value="MZ">Mozambique</option>
              <option value="MM">Myanmar</option>
              <option value="NA">Namibia</option>
              <option value="NR">Nauru</option>
              <option value="NP">Nepal</option>
              <option value="NL">Netherlands</option>
              <option value="AN">Netherlands Antilles</option>
              <option value="NC">New Caledonia</option>
              <option value="NZ">New Zealand</option>
              <option value="NI">Nicaragua</option>
              <option value="NE">Niger</option>
              <option value="NG">Nigeria</option>
              <option value="NU">Niue</option>
              <option value="NF">Norfolk Island</option>
              <option value="MP">Northern Mariana Islands</option>
              <option value="KP">North Korea</option>
              <option value="NO">Norway</option>
              <option value="OM">Oman</option>
              <option value="PK">Pakistan</option>
              <option value="PW">Palau</option>
              <option value="PS">Palestinian Territory</option>
              <option value="PA">Panama</option>
              <option value="PG">Papua New Guinea</option>
              <option value="PY">Paraguay</option>
              <option value="PE">Peru</option>
              <option value="PH">Philippines</option>
              <option value="PN">Pitcairn</option>
              <option value="PL">Poland</option>
              <option value="PT">Portugal</option>
              <option value="PR">Puerto Rico</option>
              <option value="QA">Qatar</option>
              <option value="RE">Reunion</option>
              <option value="RO">Romania</option>
              <option value="RU">Russia</option>
              <option value="RW">Rwanda</option>
              <option value="BL">Saint Barthélemy</option>
              <option value="SH">Saint Helena</option>
              <option value="KN">Saint Kitts and Nevis</option>
              <option value="LC">Saint Lucia</option>
              <option value="MF">Saint Martin (French part)</option>
              <option value="PM">Saint Pierre and Miquelon</option>
              <option value="VC">Saint Vincent and the Grenadines</option>
              <option value="WS">Samoa</option>
              <option value="SM">San Marino</option>
              <option value="ST">Sao Tome and Principe</option>
              <option value="SA">Saudi Arabia</option>
              <option value="SN">Senegal</option>
              <option value="RS">Serbia</option>
              <option value="SC">Seychelles</option>
              <option value="SL">Sierra Leone</option>
              <option value="SG">Singapore</option>
              <option value="SX">Sint Maarten (Dutch part)</option>
              <option value="SK">Slovakia</option>
              <option value="SI">Slovenia</option>
              <option value="SB">Solomon Islands</option>
              <option value="SO">Somalia</option>
              <option value="ZA">South Africa</option>
              <option value="GS">South Georgia and the South Sandwich Islands</option>
              <option value="KR">South Korea</option>
              <option value="SS">South Sudan</option>
              <option value="ES">Spain</option>
              <option value="LK">Sri Lanka</option>
              <option value="SD">Sudan</option>
              <option value="SR">Suriname</option>
              <option value="SJ">Svalbard and Jan Mayen</option>
              <option value="SZ">Swaziland</option>
              <option value="SE">Sweden</option>
              <option value="CH">Switzerland</option>
              <option value="SY">Syria</option>
              <option value="TW">Taiwan</option>
              <option value="TJ">Tajikistan</option>
              <option value="TZ">Tanzania</option>
              <option value="TH">Thailand</option>
              <option value="TL">Timor-Leste</option>
              <option value="TG">Togo</option>
              <option value="TK">Tokelau</option>
              <option value="TO">Tonga</option>
              <option value="TT">Trinidad and Tobago</option>
              <option value="TN">Tunisia</option>
              <option value="TR">Turkey</option>
              <option value="TM">Turkmenistan</option>
              <option value="TC">Turks and Caicos Islands</option>
              <option value="TV">Tuvalu</option>
              <option value="VI">U.S. Virgin Islands</option>
              <option value="UG">Uganda</option>
              <option value="UA">Ukraine</option>
              <option value="AE">United Arab Emirates</option>
              <option value="GB">United Kingdom</option>
              <option value="US">United States</option>
              <option value="UM">United States Minor Outlying Islands</option>
              <option value="UY">Uruguay</option>
              <option value="UZ">Uzbekistan</option>
              <option value="VU">Vanuatu</option>
              <option value="VA">Vatican</option>
              <option value="VE">Venezuela</option>
              <option value="VN">Vietnam</option>
              <option value="WF">Wallis and Futuna</option>
              <option value="EH">Western Sahara</option>
              <option value="YE">Yemen</option>
              <option value="ZM">Zambia</option>
              <option value="ZW">Zimbabwe</option>
            </select>
          </div>
          <div class="form-group">
            <label for="edit-submitted-country">Category <span title="This field is required." class="form-required">*</span></label>
            <select class="form-control" name="category" id="edit-submitted-country" required>
              <option value="">- Select -</option>
              <option value=".99">99 cent a pic for the inside submission</option>
              <option value="5">$5 For a Back Cover Picture</option>
              <option value="10">$10 for front cover submission</option>
            </select>
          </div>
          <div class="form-group">
            <label for="edit-submitted-upload-upload">Upload <span title="This field is required." class="form-required">*</span></label>
            <input type="file" class="form-file" size="22" name="user_image" id="edit-submitted-upload-upload" required>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" required>
             <p class="i-agree-view"> Yes, I'd like to sign up for the free <em class="placeholder"> Sexy Selfie Magazine</em> mailing list and accept the <a class="wm-target-blank" href="privacy-policy.html" sl-processed="1">privacy policy</a></p> </label>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-warning" value="Submit »" name="submit" id="edit-submit">
          </div>
        </div>
      </form>
      <?php } ?>
    </div>
  </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.min.js"></script>
</body>
</html>