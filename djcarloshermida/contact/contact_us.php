
    <link rel="stylesheet" href="contact/contact_us.css">

    <script src='//www.google.com/recaptcha/api.js'  type="text/javascript"></script>
    <div class="contact-form" id="contact_us">
    <h2>Contáctanos</h2>
    <form method="post" action="">
    <input type="text" name="name" placeholder="Nombre" required>
    <input type="phone" name="phone" placeholder="Celular" required>
    <input type="email" name="email" placeholder="Email" required>
    <textarea name="message" placeholder="Mensaje" required></textarea>
    <div class="g-recaptcha" data-sitekey="6LdDJ_QUAAAAAJUYqxDo2yc2FpFBmH8FSYtJyuoj"></div>
    <input type="submit" name="submit" value="Enviar" class="submit-btn">

    <div clas="status">
    </div> 
    
   
    </div>
    </form>
    </div>

    <?php


    if(isset($_POST['submit']))
    {
        $user_name=$_POST['name'];
        $phone=$_POST['phone'];
        $user_email=$_POST['email'];
        $user_message=$_POST['message'];

        $email_from='noreply@djcarloshermida.com.uy';
        $email_subjet="New Form Submission";
        $email_body="Name: $user_name.\n".
                    "Phone No: $phone.\n".
                    "Email Id: $user_email.\n".
                    "User Message: $user_message.\n".
    
                
        $to_email ="djcarloshermida@outlook.com";
        $headers ="From: $email_from \r\n";
        $headers ="Reply-To: $user_email \r\n";

        $secretkey ="6LdDJ_QUAAAAAIONPdn2dNN0Kdl8QpidoZPRoLAO";
        $reponsekey = $_POST['g-recaptcha-response'];
        $userIP =$_SERVER['REMOTE_ADDR'];
    
      
        $name = stripslashes($_POST["name"]);
        $email = stripslashes($_POST["email"]);
        $message = stripslashes($_POST["message"]);

    
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array(
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n", 
            'secret' => $secretkey,
            'response' => $reponsekey
        );
        $options = array(
            'http' => array (
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);
        $captcha_success = json_decode($verify);

        if ($captcha_success->success)
        {
            mail($to_email,$email_subjet,$email_body,$headers);
            echo "Mensaje Enviado Correctamente";
        }
        else
        {
            
            echo "<span>Invalid Captcha. Por favor intente de nuevo</span> ";
            print_r($response );
        }

    }
    ?>
