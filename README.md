# formwithrecaptcha
Simple HTML form with reCAPTCHA that sends to .php to verify and send form.

You will need to sign up and activate an account with reCAPTCHA for this to work. You can sign up at https://www.google.com/recaptcha.
I have already built the javascript call to the API into the html, all you will need to do is enter your site key into the HTML on line 20. You will need to enter your secret key into the .php file on line 6. Additionally you will need to enter a destination email (where the submitted form will be mailed to), on line 31 of the .php file. 

The .php file uses the mail() function, which will require that you have a server side mail client set up. If you do not have a server side mail client I would recommend using phpmailer, which you can get here: https://github.com/PHPMailer/PHPMailer.

Both the HTML and .php file are very basic, and there is no CSS (style) file. I tried to add notes where I felt it appropriate, but if you have any questions feel free to email me at emoseddie@gmail.com
