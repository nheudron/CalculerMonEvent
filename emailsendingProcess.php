<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
	

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
//require 'vendor/autoload.php';
function sendingEmail($email, $name){
	$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
	try {
		//Server settings
		$mail->SMTPDebug = 0;                                 // Enable verbose debug output
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'ssl0.ovh.net'; // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'mailbox@nicolasheudron.xyz'; // SMTP username
		$mail->Password = 'Secure_16';                           // SMTP password
		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;                                    // TCP port to connect to

		//Recipients
		$mail->setFrom('no-reply@coach-evenements.alwaysdata.net', 'Calculer Mon Evenement');
		$mail->addAddress($email, $name);     // Add a recipient
		//$mail->addAddress('ellen@example.com');               // Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		//Attachments
		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		//Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Estimation budgetaire de votre evenement';
		$mail->Body    = '
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" style="width:100%;font-family:arial,  helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta name="x-apple-disable-message-reformatting">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="telephone=no" name="format-detection">
<title>Nouvel e-mail</title>
<!--[if (mso 16)]><style type="text/css">     a {text-decoration: none;}     </style><![endif]--> <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]--> <!--[if gte mso 9]><xml> <o:OfficeDocumentSettings> <o:AllowPNG></o:AllowPNG> <o:PixelsPerInch>96</o:PixelsPerInch>
 </o:OfficeDocumentSettings> </xml><![endif]-->
<style type="text/css">
@media only screen and (max-width:600px) {
p, ul li, ol li, a {
    font-size: 16px!important;
    line-height: 150%!important
}
h1 {
    font-size: 30px!important;
    text-align: center;
    line-height: 120%!important
}
h2 {
    font-size: 26px!important;
    text-align: center;
    line-height: 120%!important
}
h3 {
    font-size: 20px!important;
    text-align: center;
    line-height: 120%!important
}
h1 a {
    font-size: 30px!important
}
h2 a {
    font-size: 26px!important
}
h3 a {
    font-size: 20px!important
}
.es-menu td a {
    font-size: 16px!important
}
.es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a {
    font-size: 16px!important
}
.es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a {
    font-size: 16px!important
}
.es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a {
    font-size: 12px!important
}
*[class="gmail-fix"] {
    display: none!important
}
.es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 {
    text-align: center!important
}
.es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 {
    text-align: right!important
}
.es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 {
    text-align: left!important
}
.es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img {
    display: inline!important
}
.es-button-border {
    display: block!important
}
a.es-button {
    font-size: 20px!important;
    display: block!important;
    border-width: 10px 0px 10px 0px!important
}
.es-btn-fw {
    border-width: 10px 0px!important;
    text-align: center!important
}
.es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right {
    width: 100%!important
}
.es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header {
    width: 100%!important;
    max-width: 600px!important
}
.es-adapt-td {
    display: block!important;
    width: 100%!important
}
.adapt-img {
    width: 100%!important;
    height: auto!important
}
.es-m-p0 {
    padding: 0px!important
}
.es-m-p0r {
    padding-right: 0px!important
}
.es-m-p0l {
    padding-left: 0px!important
}
.es-m-p0t {
    padding-top: 0px!important
}
.es-m-p0b {
    padding-bottom: 0!important
}
.es-m-p20b {
    padding-bottom: 20px!important
}
.es-mobile-hidden, .es-hidden {
    display: none!important
}
tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden {
    display: table-row!important;
    width: auto!important;
    overflow: visible!important;
    float: none!important;
    max-height: inherit!important;
    line-height: inherit!important
}
.es-desk-menu-hidden {
    display: table-cell!important
}
table.es-table-not-adapt, .esd-block-html table {
    width: auto!important
}
table.es-social {
    display: inline-block!important
}
table.es-social td {
    display: inline-block!important
}
}
#outlook a {
    padding: 0;
}
.ExternalClass {
    width: 100%;
}
.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
    line-height: 100%;
}
.es-button {
    mso-style-priority: 100!important;
    text-decoration: none!important;
}
a[x-apple-data-detectors] {
    color: inherit!important;
    text-decoration: none!important;
    font-size: inherit!important;
    font-family: inherit!important;
    font-weight: inherit!important;
    line-height: inherit!important;
}
.es-desk-hidden {
    display: none;
    float: left;
    overflow: hidden;
    width: 0;
    max-height: 0;
    line-height: 0;
    mso-hide: all;
}
</style>
</head>
<body style="width:100%;font-family:arial,  helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
<div class="es-wrapper-color" style="background-color:#F6F6F6"> <!--[if gte mso 9]><v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t"> <v:fill type="tile" color="#f6f6f6"></v:fill> </v:background><![endif]-->
  <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top">
    <tr style="border-collapse:collapse">
      <td valign="top" style="padding:0;Margin:0"><table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
          <tr style="border-collapse:collapse">
            <td align="center" style="padding:0;Margin:0"><table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" cellspacing="0" cellpadding="0" align="center">
                <tr style="border-collapse:collapse">
                  <td align="left" style="Margin:0;padding-top:15px;padding-bottom:15px;padding-left:20px;padding-right:20px"><!--[if mso]><table style="width:560px" cellpadding="0" cellspacing="0"><tr><td style="width:270px" valign="top"><![endif]-->
                    <table class="es-left" cellspacing="0" cellpadding="0" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                      <tr style="border-collapse:collapse">
                        <td align="left" style="padding:0;Margin:0;width:270px"><table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr style="border-collapse:collapse">
                              <td class="es-infoblock" align="left" style="padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial,  helvetica, sans-serif;line-height:14px;color:#CCCCCC">Put your preheader text here</p></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                    <!--[if mso]></td><td style="width:20px"></td><td style="width:270px" valign="top"><![endif]-->
                    <table class="es-right" cellspacing="0" cellpadding="0" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                      <tr style="border-collapse:collapse">
                        <td align="left" style="padding:0;Margin:0;width:270px"><table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr style="border-collapse:collapse">
                              <td align="right" class="es-infoblock" style="padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial,  helvetica, sans-serif;line-height:14px;color:#CCCCCC"><a href="https://viewstripo.email" class="view" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial,  helvetica, sans-serif;font-size:12px;text-decoration:underline;color:#CCCCCC">View in browser</a></p></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                    <!--[if mso]></td></tr></table><![endif]--></td>
                </tr>
              </table></td>
          </tr>
        </table>
        <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
          <tr style="border-collapse:collapse">
            <td align="center" style="padding:0;Margin:0"><table class="es-content-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                <tr style="border-collapse:collapse">
                  <td align="left" style="padding:0;Margin:0"><table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                      <tr style="border-collapse:collapse">
                        <td valign="top" align="center" style="padding:0;Margin:0;width:600px"><table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr style="border-collapse:collapse">
                              <td align="center" style="padding:0;Margin:0;font-size:0px"><img class="adapt-img" src="https://coach-evenements.alwaysdata.net/images/Comment-est-calculé-le-rendement-des-livrets-réglementés%20copie.jpg" alt="calculermonevenement.fr" title="calculermonevenement.fr" width="600" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" height="400"></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <tr style="border-collapse:collapse">
                  <td style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:40px;padding-right:40px;background-color:#FFFFFF" bgcolor="#ffffff" align="left"><table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                      <tr style="border-collapse:collapse">
                        <td valign="top" align="center" style="padding:0;Margin:0;width:520px"><table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr style="border-collapse:collapse">
                              <td align="center" style="padding:0;Margin:0;padding-bottom:15px"><h1 style="Margin:0;line-height:36px;mso-line-height-rule:exactly;font-family:arial,  helvetica, sans-serif;font-size:30px;font-style:normal;font-weight:normal;color:#666666">Calculer mon evenement</h1></td>
                            </tr>
                            <tr style="border-collapse:collapse">
                              <td esdev-links-color="#ffffff" align="center" style="padding:0;Margin:0;padding-bottom:15px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial,  helvetica, sans-serif;line-height:21px;color:#666666"><br>
                                </p></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
              </table></td>
          </tr>
        </table>
        <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
          <tr style="border-collapse:collapse">
            <td align="center" style="padding:0;Margin:0"><table class="es-content-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                <tr style="border-collapse:collapse">
                  <td align="left" style="padding:0;Margin:0"><table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                      <tr style="border-collapse:collapse">
                        <td valign="top" align="center" style="padding:0;Margin:0;width:600px"><table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr style="border-collapse:collapse">
                              <td align="center" style="padding:0;Margin:0;padding-top:10px"><h2 style="Margin:0;line-height:29px;mso-line-height-rule:exactly;font-family:arial,  helvetica, sans-serif;font-size:24px;font-style:normal;font-weight:normal;color:#666666">Estimation budgétaire</h2></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <tr style="border-collapse:collapse">
                  <td align="left" style="Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;padding-bottom:25px"><!--[if mso]><table style="width:560px" cellpadding="0" cellspacing="0"><tr><td style="width:300px" valign="top"><![endif]-->
                    
                    <table class="es-left" cellspacing="0" cellpadding="0" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                      <tr style="border-collapse:collapse">
                        <td class="es-m-p20b" align="left" style="padding:0;Margin:0;width:300px"><table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr style="border-collapse:collapse">
                              <td align="center" style="padding:0;Margin:0;font-size:0"><img src="https://hkhydo.stripocdn.email/content/guids/CABINET_3b0e95eb1e4d93a496329be815b095e0/images/32991505743721608.png" alt="Medal" title="Medal" width="85" height="112" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></td>
                            </tr>
                            <tr style="border-collapse:collapse">
                              <td align="center" style="padding:0;Margin:0;padding-top:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial,  helvetica, sans-serif;line-height:21px;color:#666666"><span style="font-size:16px;line-height:24px">You"ve been with us</span></p></td>
                            </tr>
                            <tr style="border-collapse:collapse">
                              <td align="center" style="padding:0;Margin:0;padding-top:5px;padding-bottom:10px"><h1 style="Margin:0;line-height:36px;mso-line-height-rule:exactly;font-family:arial,  helvetica, sans-serif;font-size:30px;font-style:normal;font-weight:normal;color:#666666"><span style="font-size:30px">8 months</span></h1></td>
                            </tr>
                            <tr style="border-collapse:collapse">
                              <td align="center" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial,  helvetica, sans-serif;line-height:21px;color:#666666"><span style="font-size:16px;line-height:24px">Athlete status.</span></p></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                    <!--[if mso]></td><td style="width:20px"></td><td style="width:240px" valign="top"><![endif]-->
                    <table class="es-right" cellspacing="0" cellpadding="0" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                      <tr style="border-collapse:collapse">
                        <td align="left" style="padding:0;Margin:0;width:240px"><table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr style="border-collapse:collapse">
                              <td align="center" style="padding:0;Margin:0;font-size:0"><img src="https://hkhydo.stripocdn.email/content/guids/CABINET_3b0e95eb1e4d93a496329be815b095e0/images/57631505743727730.png" alt="Medal" title="Medal" width="85" height="112" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></td>
                            </tr>
                            <tr style="border-collapse:collapse">
                              <td align="center" style="padding:0;Margin:0;padding-top:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:arial,  helvetica, sans-serif;line-height:24px;color:#666666">Amount of training</p></td>
                            </tr>
                            <tr style="border-collapse:collapse">
                              <td align="center" style="padding:0;Margin:0;padding-top:5px;padding-bottom:10px"><h1 style="Margin:0;line-height:36px;mso-line-height-rule:exactly;font-family:arial,  helvetica, sans-serif;font-size:30px;font-style:normal;font-weight:normal;color:#666666"> <span style="font-size:30px">27</span></h1></td>
                            </tr>
                            <tr style="border-collapse:collapse">
                              <td align="center" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial,  helvetica, sans-serif;line-height:21px;color:#666666"><span style="font-size:16px;line-height:24px">Athlete status.</span></p></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                    <!--[if mso]></td></tr></table><![endif]--></td>
                </tr>
              </table></td>
          </tr>
        </table>
        <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
          <tr style="border-collapse:collapse"></tr>
          <tr style="border-collapse:collapse">
            <td align="center" style="padding:0;Margin:0"><table class="es-content-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                <tr style="border-collapse:collapse">
                  <td style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:40px;padding-right:40px;background-color:#FFD66C" bgcolor="#ffd66c" align="left"><table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                      <tr style="border-collapse:collapse">
                        <td valign="top" align="center" style="padding:0;Margin:0;width:520px"><table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr style="border-collapse:collapse">
                              <td align="left" style="padding:0;Margin:0;padding-bottom:5px"><h1 style="Margin:0;line-height:36px;mso-line-height-rule:exactly;font-family:arial,  helvetica, sans-serif;font-size:30px;font-style:normal;font-weight:normal;color:#666666"><span style="font-size:30px">5:10 min/km</span></h1></td>
                            </tr>
                            <tr style="border-collapse:collapse">
                              <td align="left" style="padding:0;Margin:0;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial,  helvetica, sans-serif;line-height:21px;color:#FFFFFF"><span style="font-size:18px;line-height:27px">Average rate of run</span><br>
                                </p></td>
                            </tr>
                            <tr style="border-collapse:collapse">
                              <td align="left" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial,  helvetica, sans-serif;line-height:21px;color:#333333"> How many calories can you burn? Running:105 calories, walking: 74 calories.</p>
                                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial,  helvetica, sans-serif;line-height:21px;color:#333333">Average calories lost on a treadmill for 1,600 meters.</p></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <tr style="border-collapse:collapse">
                  <td align="left" style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:40px;padding-right:40px"><table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                      <tr style="border-collapse:collapse">
                        <td valign="top" align="center" style="padding:0;Margin:0;width:520px"><table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr style="border-collapse:collapse">
                              <td align="left" style="padding:0;Margin:0;padding-bottom:5px"><h1 style="Margin:0;line-height:36px;mso-line-height-rule:exactly;font-family:arial,  helvetica, sans-serif;font-size:30px;font-style:normal;font-weight:normal;color:#666666"><span style="font-size:30px">17 km</span></h1></td>
                            </tr>
                            <tr style="border-collapse:collapse">
                              <td align="left" style="padding:0;Margin:0;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial,  helvetica, sans-serif;line-height:21px;color:#333333"><span style="font-size:18px;line-height:27px">Average distance for a training</span></p></td>
                            </tr>
                            <tr style="border-collapse:collapse">
                              <td align="left" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial,  helvetica, sans-serif;line-height:21px;color:#666666">More than 500,000 people finished a U.S. Marathon in 2010, an 8.6% increase over 2009. You can enter their number.</p></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <tr style="border-collapse:collapse">
                  <td style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:40px;padding-right:40px;background-color:#FF8B87" bgcolor="#ff8b87" align="left"><table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                      <tr style="border-collapse:collapse">
                        <td valign="top" align="center" style="padding:0;Margin:0;width:520px"><table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr style="border-collapse:collapse">
                              <td align="left" style="padding:0;Margin:0;padding-bottom:5px"><h1 style="Margin:0;line-height:36px;mso-line-height-rule:exactly;font-family:arial,  helvetica, sans-serif;font-size:30px;font-style:normal;font-weight:normal;color:#666666"><span style="font-size:30px">27 km</span></h1></td>
                            </tr>
                            <tr style="border-collapse:collapse">
                              <td align="left" style="padding:0;Margin:0;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial,  helvetica, sans-serif;line-height:21px;color:#FFFFFF"><span style="font-size:18px;line-height:27px">Maximum distance</span></p></td>
                            </tr>
                            <tr style="border-collapse:collapse">
                              <td align="left" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial,  helvetica, sans-serif;line-height:21px;color:#333333">How many calories can you burn? Running:105 calories, walking: 74 calories.</p>
                                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial,  helvetica, sans-serif;line-height:21px;color:#333333">Average calories lost on a treadmill for 1,600 meters.<br>
                                </p></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <tr style="border-collapse:collapse">
                  <td align="left" style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:40px;padding-right:40px"><table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                      <tr style="border-collapse:collapse">
                        <td valign="top" align="center" style="padding:0;Margin:0;width:520px"><table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr style="border-collapse:collapse">
                              <td align="left" style="padding:0;Margin:0;padding-bottom:5px"><h1 style="Margin:0;line-height:36px;mso-line-height-rule:exactly;font-family:arial,  helvetica, sans-serif;font-size:30px;font-style:normal;font-weight:normal;color:#666666"><span style="font-size:30px">2:30 h</span></h1></td>
                            </tr>
                            <tr style="border-collapse:collapse">
                              <td align="left" style="padding:0;Margin:0;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial,  helvetica, sans-serif;line-height:21px;color:#333333"> <span style="font-size:18px;line-height:27px">Maximum time of run</span></p></td>
                            </tr>
                            <tr style="border-collapse:collapse">
                              <td align="left" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial,  helvetica, sans-serif;line-height:21px;color:#666666">How many calories can you burn? Running:105 calories, walking: 74 calories.</p></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <tr style="border-collapse:collapse">
                  <td style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:40px;padding-right:40px;background-color:#77DCEE" bgcolor="#77dcee" align="left"><table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                      <tr style="border-collapse:collapse">
                        <td valign="top" align="center" style="padding:0;Margin:0;width:520px"><table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr style="border-collapse:collapse">
                              <td align="left" style="padding:0;Margin:0;padding-bottom:5px"><h1 style="Margin:0;line-height:36px;mso-line-height-rule:exactly;font-family:arial,  helvetica, sans-serif;font-size:30px;font-style:normal;font-weight:normal;color:#666666"><span style="font-size:30px">26,12 km/h</span></h1></td>
                            </tr>
                            <tr style="border-collapse:collapse">
                              <td align="left" style="padding:0;Margin:0;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial,  helvetica, sans-serif;line-height:21px;color:#FFFFFF"><span style="font-size:18px;line-height:27px">Maximum speed of run</span></p></td>
                            </tr>
                            <tr style="border-collapse:collapse">
                              <td align="left" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial,  helvetica, sans-serif;line-height:21px;color:#333333">How many calories can you burn? Running:105 calories, walking: 74 calories.</p>
                                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial,  helvetica, sans-serif;line-height:21px;color:#333333">Average calories lost on a treadmill for 1,600 meters.</p></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
              </table></td>
          </tr>
        </table>
        <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
          <tr style="border-collapse:collapse">
            <td align="center" style="padding:0;Margin:0"><table class="es-content-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                <tr style="border-collapse:collapse">
                  <td align="left" style="padding:20px;Margin:0"><table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                      <tr style="border-collapse:collapse">
                        <td valign="top" align="center" style="padding:0;Margin:0;width:560px"><table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr style="border-collapse:collapse">
                              <td align="center" style="padding:0;Margin:0;padding-bottom:5px"><h3 style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:arial,  helvetica, sans-serif;font-size:20px;font-style:normal;font-weight:normal;color:#666666">Share</h3></td>
                            </tr>
                            <tr style="border-collapse:collapse">
                              <td align="center" style="padding:0;Margin:0;padding-top:10px;font-size:0"><table class="es-table-not-adapt es-social" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                  <tr style="border-collapse:collapse">
                                    <td valign="top" align="center" style="padding:0;Margin:0;padding-right:10px"><img title="Twitter" src="https://stripo.email/cabinet/assets/editor/assets/img/social-icons/circle-gray/twitter-circle-gray.png" alt="Tw" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></td>
                                    <td valign="top" align="center" style="padding:0;Margin:0;padding-right:10px"><img title="Facebook" src="https://stripo.email/cabinet/assets/editor/assets/img/social-icons/circle-gray/facebook-circle-gray.png" alt="Fb" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></td>
                                    <td valign="top" align="center" style="padding:0;Margin:0;padding-right:10px"><img title="Google+" src="https://stripo.email/cabinet/assets/editor/assets/img/social-icons/circle-gray/google-plus-circle-gray.png" alt="G+" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></td>
                                    <td valign="top" align="center" style="padding:0;Margin:0"><img title="Linkedin" src="https://stripo.email/cabinet/assets/editor/assets/img/social-icons/circle-gray/linkedin-circle-gray.png" alt="In" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></td>
                                  </tr>
                                </table></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
              </table></td>
          </tr>
        </table>
        <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
          <tr style="border-collapse:collapse">
            <td align="center" style="padding:0;Margin:0"><table class="es-content-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                <tr style="border-collapse:collapse">
                  <td style="Margin:0;padding-bottom:15px;padding-top:20px;padding-left:20px;padding-right:20px;background-color:#FFFFFF" bgcolor="#ffffff" align="left"><table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                      <tr style="border-collapse:collapse">
                        <td valign="top" align="center" style="padding:0;Margin:0;width:560px"><table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr style="border-collapse:collapse">
                              <td align="center" style="padding:0;Margin:0;padding-bottom:15px"><h3 style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:arial,  helvetica, sans-serif;font-size:20px;font-style:normal;font-weight:normal;color:#666666">Health Benefits<br>
                                </h3></td>
                            </tr>
                            <tr style="border-collapse:collapse">
                              <td esdev-links-color="#ffffff" align="center" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial,  helvetica, sans-serif;line-height:21px;color:#666666">It s no wonder why running is becoming increasingly popular. All you need is a pair of running shoes and motivation to help you improve your overall health and mood. Running is considered one of the best cardio exercises thanks to its many benefits:</p></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <tr style="border-collapse:collapse">
                  <td align="left" style="padding:0;Margin:0;padding-bottom:15px;padding-left:30px;padding-right:30px"><!--[if mso]><table style="width:540px" cellpadding="0" cellspacing="0"><tr><td style="width:260px" valign="top"><![endif]-->
                    
                    <table class="es-left" cellspacing="0" cellpadding="0" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                      <tr style="border-collapse:collapse">
                        <td class="es-m-p20b" align="left" style="padding:0;Margin:0;width:260px"><table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr style="border-collapse:collapse">
                              <td align="left" style="padding:0;Margin:0"><ul>
                                  <li style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial,  helvetica, sans-serif;line-height:17px;Margin-bottom:15px;color:#666666">helps you lose weight;</li>
                                  <li style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial,  helvetica, sans-serif;line-height:17px;Margin-bottom:15px;color:#666666">improves cardiovascular health;</li>
                                </ul></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                    <!--[if mso]></td><td style="width:20px"></td><td style="width:260px" valign="top"><![endif]-->
                    <table class="es-right" cellspacing="0" cellpadding="0" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                      <tr style="border-collapse:collapse">
                        <td align="left" style="padding:0;Margin:0;width:260px"><table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr style="border-collapse:collapse">
                              <td align="left" style="padding:0;Margin:0"><ul>
                                  <li style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial,  helvetica, sans-serif;line-height:17px;Margin-bottom:15px;color:#666666">improves bone and muscle health;</li>
                                  <li style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial,  helvetica, sans-serif;line-height:17px;Margin-bottom:15px;color:#666666">improves mood.</li>
                                </ul></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                    <!--[if mso]></td></tr></table><![endif]--></td>
                </tr>
              </table></td>
          </tr>
        </table>
        <table class="es-footer" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
          <tr style="border-collapse:collapse">
            <td align="center" style="padding:0;Margin:0"><table class="es-footer-body" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#9AAEA6;width:600px">
                <tr style="border-collapse:collapse">
                  <td align="left" style="padding:20px;Margin:0"><table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                      <tr style="border-collapse:collapse">
                        <td valign="top" align="center" style="padding:0;Margin:0;width:560px"><table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr style="border-collapse:collapse">
                              <td esdev-links-color="#ffffff" align="center" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial,  helvetica, sans-serif;line-height:18px;color:#FFFFFF"><span style="font-size:18px;line-height:27px">We can"t wait to see you on the road in 2018!<br>
                                  </span></p></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <tr style="border-collapse:collapse">
                  <td align="left" style="padding:0;Margin:0"><table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                      <tr style="border-collapse:collapse">
                        <td valign="top" align="center" style="padding:0;Margin:0;width:600px"><table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF" width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffffff" role="presentation">
                            <tr style="border-collapse:collapse">
                              <td esdev-links-color="#666666" align="center" class="es-m-txt-с" style="padding:0;Margin:0;padding-top:10px;padding-bottom:20px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial,  helvetica, sans-serif;line-height:18px;color:#666666">Copyright © 2017 Run, All rights reserved.</p>
                                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial,  helvetica, sans-serif;line-height:21px;color:#666666">Vector graphics designed by <a target="_blank" href="http://www.freepik.com/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial,  helvetica, sans-serif;font-size:14px;text-decoration:underline;color:#666666">Freepik</a>.</p>
                                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial,  helvetica, sans-serif;line-height:18px;color:#666666">You are receiving this email because you have visited our site or asked us about regular newsletter.</p>
                                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial,  helvetica, sans-serif;line-height:18px;color:#666666"><a target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial,  helvetica, sans-serif;font-size:12px;text-decoration:underline;color:#666666;line-height:18px" href="" class="unsubscribe">Unsubscribe</a></p></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
              </table></td>
          </tr>
        </table>
        <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
          <tr style="border-collapse:collapse">
            <td align="center" style="padding:0;Margin:0"><table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" cellspacing="0" cellpadding="0" align="center">
                <tr style="border-collapse:collapse">
                  <td align="left" style="Margin:0;padding-left:20px;padding-right:20px;padding-top:30px;padding-bottom:30px"><table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                      <tr style="border-collapse:collapse">
                        <td valign="top" align="center" style="padding:0;Margin:0;width:560px"><table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr style="border-collapse:collapse">
                              <td class="es-infoblock made_with" align="center" style="padding:0;Margin:0;line-height:120%;font-size:0;color:#CCCCCC"><a target="_blank" href="https://viewstripo.email/?utm_source=templates&utm_medium=email&utm_campaign=software&utm_content=holiday_newsletter" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica, sans-serif;font-size:12px;text-decoration:underline;color:#CCCCCC"><img src="https://hkhydo.stripocdn.email/content/guids/CABINET_9df86e5b6c53dd0319931e2447ed854b/images/64951510234941531.png" alt width="125" height="56" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
              </table></td>
          </tr>
        </table></td>
    </tr>
  </table>
</div>
<div style="position:absolute;left:-9999px;top:-9999px"></div>
</body>
</html>
		';
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->send();
		echo 'L\'email a été envoyé.';
	} catch (Exception $e) {
		echo 'L\'email n\'a pas pu être envoyé.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	}
}
?>