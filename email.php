<?php
    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6Le_ZyYUAAAAAD-Ojt8dclUavgh_0KB1U5w4F41Z',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);

    if (!$res['success']) {
        // What happens when the CAPTCHA wasn't checked
        echo '<p>Please go back and make sure you check the security CAPTCHA box.</p><br>';
    } else {
        // If CAPTCHA is successfully completed...

        // Paste mail function or whatever else you want to happen here!
        echo '<br><p>CAPTCHA was completed successfully!</p><br>';
        echo '<div class="g-recaptcha" data-sitekey="6Le_ZyYUAAAAAD-Ojt8dclUavgh_0KB1U5w4F41Z"></div>'
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Contact Me</title>
    <link rel="stylesheet" href="base.css">
    <link rel="shortcut icon" href="img/favicon.ico">
  </head>
  <body id="email-body">
    <div class="container">
      <h2 id="click-here">Click Here</h2><h3 id="main-text">To View My Email</h3>
      <form action="index.html" method="post">

      </form>
    </div>
  </body>
  <script src='https://www.google.com/recaptcha/api.js'></script>
</html>
