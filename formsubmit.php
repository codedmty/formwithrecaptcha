<?php
    function isValid($result) {
        try {

            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $data = ['secret'   => '[PUT YOUR SECRET KEY HERE]',  //Put the secret key provided by reCAPTCHA here
            'response' => $_POST['g-recaptcha-response'],
            'remoteip' => $_SERVER['REMOTE_ADDR']];

        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data) 
            ]
        ];

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return json_decode($result)->success;
        }
    
        catch (Exception $e) {
        return null;
        
        }

}

    if (isValid($result === 'success')) {
        $to = "DESTINATION EMAIL GOES HERE"; //Put the target email on this line
        $from = $_POST['email'];             //This is the email address pulled from the form
        $name = $_POST['name'];              //This is the name pulled from the form
        $subject = "New Message";            //This is a default subject, you can change it to whatever you like
        $message = $name . " wrote" . "\n\n" . $_POST['message'];  //Default style for email body

        $headers = "From:" . $from; 
        mail($to,$subject,$message,$headers);
          echo('Thank you for your message, we will be in contact shortly.'); //Default message if reCAPTCHA and send are successful
        } elseif(!$captcha){
          echo('Please check the reCAPTCHA form and try again.');  //Default message if the reCAPTCHA is not checked
          exit;
        } else {
            echo('You are a Spammer, please leave.'); //Default message if any spam or anything out of the ordinary is detected
        }
?>