<!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
<div class="container text-center">
<!--Signup form php -->
<?php
$statusMsg = '';
$msgClass = '';
if(isset($_POST['submit'])){
    // Get the submitted form data
    $email = $_POST['email'];
    $name = $_POST['name'];
    $message = $_POST['message'];

    // Check whether submitted data is not empty
    if(!empty($email) && !empty($name) && !empty($message)){

        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $statusMsg = 'Please enter your valid email.';
            $msgClass = 'errordiv';
        }else{
            // Recipient email
            $toEmail = 'guest@steveandbarbaraboda.com';
          $emailSubject = 'Contact Request Submitted by '.$name;
          $htmlContent = '<h2>Contact Request Submitted</h2>
              <h4>Name</h4><p>'.$name.'</p>
              <h4>Email</h4><p>'.$email.'</p>
              <h4>Message</h4><p>'.$message.'</p>';

            // Set content-type header for sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // Additional headers
            $headers .= 'From: '.$name.'<'.$email.'>'. "\r\n";

            // Send email
            if(mail($toEmail,$emailSubject,$htmlContent,$headers)){
                $statusMsg = 'Successfully Sent! Enviado Exitosamente!';
                $msgClass = 'succdiv';
            }else{
                $statusMsg = 'Failed, Please try again! Error, por favor intente de nuevo!';
                $msgClass = 'errordiv';
            }
        }
    }else{
        $statusMsg = 'Please fill all the fields.';
        $msgClass = 'errordiv';
    }
}
?>
<!--/Signup form php-->
<!-- signup form -->
<hr>
<div class="row py-4">
<div class="col-md col-xl-5">
<p><strong>Steve y Bárbara</strong></p>
<p>Si desea contactarnos, complete este formulario por favor</p>
<p>Nos gustaría invitarlo a unirse a nosotros en nuestra celebración</p>
<p>Esté atento a este sitio web ya que actualizaremos regularmente</p>
</div>
<div class="col-md col-xl-5 ml-auto">
<p><strong>Mensaje Nosotros</strong></p>
<form id="form1" id="form1"action="" method="post">
  <center><input type="text" name="name" placeholder="Nombre completo" required=""></center><br />
  <center><input type="email" name="email" placeholder="email@example.com" required=""></center><br />
  <center><textarea name="message" placeholder="Write your message here" required=""> </textarea><br /></center>
  <center><input type="submit" name="submit" value="Submit"></center>
</div>
</div>
<hr><!-- /signup form -->
</div>
</section>
<div class="container">
<div class="row py-3">
<div class="col-md-7">
<ul class="nav">
<li class="nav-item">
  <a class="nav-link" href="http://www.steveandbarbaraboda.com">Home</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="/rsvp.php">RSVP/S.R.C</a>
</li>
</ul>
  </div>
<div class="col-md text-md-right">
<small>&copy; 2018 SteveandBarbaraboda &amp; <a href="http://www.stevemeadows.co.uk" target="_blank">Steve Meadows Developer</a></small>
</div>
</div>
</div>
<!-- /Footer -->
</html>
