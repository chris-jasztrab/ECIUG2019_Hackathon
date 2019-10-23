<?php
 include('../private/initialize.php');

 $yesterday          = date('Y-m-d', strtotime('-1 day', $today));
$patronsCreatedYesterday = getPatronsCreatedOnDate($yesterday);
//pre($patronsCreatedYesterday);
foreach ($patronsCreatedYesterday as $patron)
  {
    if(is_array($patron)) {
    foreach ($patron as $individualPatron)
    {
      $patronID = $individualPatron['id'];
	$patronDetails = getPatronDetails($patronID);
      //pre($patronDetails);
	$emailAddress = getPatronEmailAddress($patronID);
	//echo $emailAddress;
  //lb();
  //pre($individualPatron);
  $name = $patronDetails['names']['0'];
  //echo $name;
      //lb();
      if($emailAddress != NULL)
      {
// this is when we are going to send the emails
$emailBody = 'Welcome to the IE Library ' . $name . '  Did you know that your card.';
//echo $emailBody;

$email_headers  = 'MIME-Version: 1.0' . "\r\n";
$email_headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
$email_headers .= 'From: ' . mailFrom . "\r\n";


//send email - if you want to test this out and not actually email patrons
//replace $email with your own email address in ''s   ie.  'chris.jasztrab@mpl.on.ca'

if(sendEmails == 1)
{
   mail('chris.jasztrab@gmail.com','Welcome to the IE',$emailBody,$email_headers);
}

}

}

      }
}

    ?>
