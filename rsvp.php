<?php
  include_once 'header.php';
 ?>

    <body>
      <main>
        <div class="instruct">
            <h1><strong><u>Instructions:</u><strong></h1><br />
            <p>Please fill out your appropriate form for either English or Spanish to let us know your preferences for your wedding invite.</p>
            <p>Each person in the party must fill out a form each and members of the same family are ok to use the same email address.</p>
            <p>Please tick only one box in each section and any extra requirements please add to the message box below. i.e if you have more than one allergy.</p>
            <p>Many Thanks and we look forward to seeing you at our celebration.</p>
<hr>
            <h1><strong><u>Instrucciones:</u></strong></h1><br />
            <p>Por Favor complete el formulario adecuado en español o inglés para hacernos saber sus preferencias en su invitación de la boda.<p>
            <p>Se debe completar un formulario por invitado y los miembros de la misma familia pueden usar la misma dirección de correo.<p>
            <p>Por favor señala una casilla en cada sección y cualquier requerimiento extra añádanlo en la casilla de mensaje de abajo. Por ejemplo si tiene más de una alergia.<p>
            <p>Muchas gracias y esperamos verlos en nuestra celebración</p>
            <hr></div><br />


        <?php
        $statusMsg = '';
        $msgClass = '';
        if(isset($_POST['submit'])){
            // Get the submitted form data
            $email = $_POST['email'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $message = $_POST['message'];
            $attending = $_POST['attending'];
            $hotel = $_POST['hotel'];
            $transport = $_POST['transport'];
            $menutype = $_POST['menutype'];
            $alergies = $_POST['alergies'];
            $type = $_POST['type'];


            // Check whether submitted data is not empty
            if(!empty($email) && !empty($name) && !empty($surname) && !empty($message)){

                if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                    $statusMsg = 'Please enter your valid email.';
                    $msgClass = 'errordiv';
                }else{
                    // Recipient email
                    $toEmail = 'guest@steveandbarbaraboda.com';
                  $emailSubject = 'Contact Request Submitted by '.$name;
                  $htmlContent = '<h2>Contact Request Submitted</h2>
                      <h4>Name</h4><p>'.$name.'</p>
                      <h4>Surname</h4><p>'.$surname.'</p>
                      <h4>Email</h4><p>'.$email.'</p>
                      <h4>attending</h4><p>'.$attending.'</p>
                      <h4>Hotel</h4><p>'.$hotel.'</p>
                      <h4>transport</h4><p>'.$transport.'</p>
                      <h4>Menu Type</h4><p>'.$menutype.'</p>
                      <h4>Dietary Requirements</h4><p>'.$alergies.'</p>
                      <h4>Type of Alergy</h4><p>'.$type.'</p>
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
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
               <div id="rsvpform">
            <style>@import url('https://fonts.googleapis.com/css?family=Satisfy');</style>
            <div id="carta" style="width:500px;margin:auto;width:500px;overflow:hidden;font-family:'Satisfy', cursive;">
                <header id="carta-encabezado" style="background-image:url('http://fotos.subefotos.com/e0139226fb6eb14f6009f4e87fa2f8c3o.png');height:124px;margin-bottom:40px;"></header>
                <section id="carta-contenido" style="background-image:url('http://fotos.subefotos.com/cc42099b19996d043583e8a4377e8aaeo.png');background-repeat:repeat-y;min-height:50px;margin-top:-40px;padding-bottom:40px;">
                  <div id="carta-mensaje" style="text-align:left;color:#6f0d0d;font-size:16px;padding-left:79px;padding-bottom:15px;width:355px;margin-top:-30px;">

            <div id="stylized" class="myform">
                <h1><strong><center>RSVP</center></strong></h1>

                <?php if(!empty($statusMsg)){ ?>
                    <p class="statusMsg <?php echo !empty($msgClass)?$msgClass:''; ?>"><?php echo $statusMsg; ?></p>
                <?php } ?>
                <form id="form1" id="form1"action="" method="post">
                    <h3><strong><center><u>Name</u></center></strong></h3>
                    <center><input type="text" name="name" placeholder="Your Name" required=""></center><br />
                    <h3><strong><center><u>Surname</u></center></strong></h3>
                    <center><input type="text" name="surname" placeholder="Your Surname" required=""></center><br />
                    <h3><strong><center><u>Email</u></center></strong></h3>
                    <center><input type="email" name="email" placeholder="email@example.com" required=""></center><br />
                    <h3><strong><center><u>Attending</u></center></strong></h3>
                    <center>Yes:<input type="checkbox" value="Yes" name="attending">
                    No:<input type="checkbox" value="No" name="attending"><br /></center><br />
                    <h3><strong><center><u>Room at the Hotel</u></center></strong></h3>
                    <center>Yes:<input type="checkbox" value="Yes" name="hotel">
                    No:<input type="checkbox" value="No" name="hotel"><br /></center><br />
                    <h3><strong><center><u>Transport required from Hotel</u></center></strong></h3>
                    <center>Yes:<input type="checkbox" value="Yes" name="transport">
                    No:<input type="checkbox" value="No" name="transport"><br /></center><br />
                    <h3><strong><center><u>Menu Type</u></center></strong></h3>
                    <center>Adult:<input type="checkbox" value="adult" name="menutype"><br />
                    Child (16 and Below):<input type="checkbox" value="child" name="menutype"><br />
                    Child (up to 6 years):<input type="checkbox" value="toddler" name="menutype"><br /></center><br />
                    <h3><strong><center><u>Dietary Requirements</u></center></strong></h3>
                    <center>Vegetarian:<input type="checkbox" value="vegeterian" name="alergies">
                    Vegan:<input type="checkbox" value="vegan" name="alergies"><br />
                    Coeliac:<input type="checkbox" value="coeliac" name="alergies">
                    None:<input type="checkbox" value="none" name="alergies"><br />
                    Alergy:<input type="checkbox" value="alergy" name="alergies"><br /></center><br />
                    <p><strong><center>Type of Alergy</center></strong></p>
                    <center><input type="text" name="type" placeholder="Type of Alergy" required=""></center><br />
                    <h3><strong><center><u>Message</u></center></strong></h3>
                    <center><textarea name="message" placeholder="Write your message here" required=""> </textarea><br /></center>
                    <center><input type="submit" name="submit" value="Submit"></center>
                    <div class="clear" "spacer"> </div>
                </form>
            </div>
            </div>
            <div id="carta-firma" style="text-align:right;color:#6f0d0d;font-size:15px;padding-left:79px;margin-bottom:0px;width:355px;">-Steve y Barbara</div></section>
                <footer id="carta-footer" style="background-image:url(&quot;http://fotos.subefotos.com/57f6ea113ab8b27188c4f496543efb4fo.png&quot;); margin-top: -20px; color: rgb(62, 45, 45); text-align: right; padding: 53px 59px 0px 0px; height: 46px; font-size: 13px;"><a href="https://codepen.io/prez/" style="text-decoration:none;font-size:20px;color:#6f0d0d;" onmouseover="this.style.color='red'" onmouseout="this.style.color='#6f0d0d'" alt="Mallister">※</a></footer><div style="clear:both;">
                </div>
              </div>
            </div>
          </div>
              <div class="col-sm-4"> </div>
                <div class="col-sm-4">
                  <div id="rsvpform">
                            <style>@import url('https://fonts.googleapis.com/css?family=Satisfy');</style>
                            <div id="carta" style="width:500px;margin:auto;width:500px;overflow:hidden;font-family:'Satisfy', cursive;">
                                <header id="carta-encabezado" style="background-image:url('http://fotos.subefotos.com/e0139226fb6eb14f6009f4e87fa2f8c3o.png');height:124px;margin-bottom:40px;"></header>
                                <section id="carta-contenido" style="background-image:url('http://fotos.subefotos.com/cc42099b19996d043583e8a4377e8aaeo.png');background-repeat:repeat-y;min-height:50px;margin-top:-40px;padding-bottom:40px;">
                                  <div id="carta-mensaje" style="text-align:left;color:#6f0d0d;font-size:16px;padding-left:79px;padding-bottom:15px;width:355px;margin-top:-30px;">

                            <div id="stylized" class="myform">
                                <h1><center><strong>Confirmación</strong></center></h1>

                                <?php if(!empty($statusMsg)){ ?>
                                    <p class="statusMsg <?php echo !empty($msgClass)?$msgClass:''; ?>"><?php echo $statusMsg; ?></p>
                                <?php } ?>
                                <form id="form1" id="form1"action="" method="post">
                                    <h3><strong><center><u>Nombre</u></center></strong></h3>
                                    <center><input type="text" name="name" placeholder="Tu nombre" required=""></center><br />
                                    <h3><strong><center><u>Apellido</u></center></strong></h3>
                                    <center><input type="text" name="surname" placeholder="Apellido" required=""></center><br />
                                    <h3><strong><center><u>Email</u></center></strong></h3>
                                    <center><input type="email" name="email" placeholder="email@example.com" required=""></center><br />
                                    <h3><strong><center><u>Asistiendo</u></center></strong></h3>
                                    <center>Si:<input type="checkbox" value="Yes" name="attending">
                                    No:<input type="checkbox" value="No" name="attending"><br /></center><br />
                                    <h3><strong><center><u>Habitación en el Hotel</u></center></strong></h3>
                                    <center>Sí:<input type="checkbox" value="Yes" name="hotel">
                                    No:<input type="checkbox" value="No" name="hotel"><br /></center><br />
                                    <h3><strong><center><u>Transporte requerido desde el hotel</u></center></strong></h3>
                                    <center>Sí:<input type="checkbox" value="Yes" name="transport">
                                    No:<input type="checkbox" value="No" name="transport"><br /></center><br />
                                    <h3><strong><center><u>Tipo de Menú</u></center></strong></h3>
                                    <center>Adulto:<input type="checkbox" value="adult" name="menutype"><br />
                                    Niño (de 16 años o menor):<input type="checkbox" value="child" name="menutype"><br />
                                    Niño (hasta 6 años):<input type="checkbox" value="toddler" name="menutype"><br /></center><br />
                                    <h3><strong><center><u>Requisitos dieteticos</u></center></strong></h3>
                                    <center>Vegetariano:<input type="checkbox" value="vegeterian" name="alergies">
                                    Vegano:<input type="checkbox" value="vegan" name="alergies"><br />
                                    Celíaco:<input type="checkbox" value="coeliac" name="alergies">
                                    Ninguna:<input type="checkbox" value="none" name="alergies"><br />
                                    Alergia:<input type="checkbox" value="alergy" name="alergies"><br /></center><br />
                                    <p><strong><center>Tipo de alergia</center></strong></p>
                                    <center><input type="text" name="type" placeholder="Type of Alergy" required=""></center><br />
                                    <h3><strong><center><u>Mensaje</u></center></strong></h3>
                                    <center><textarea name="message" placeholder="Write your message here" required=""> </textarea><br /></center>
                                    <center><input type="submit" name="submit" value="Submit"></center>
                                    <div class="clear" "spacer"> </div>
                                </form>
                            </div>
                            </div>
                            <div id="carta-firma" style="text-align:right;color:#6f0d0d;font-size:15px;padding-left:79px;margin-bottom:0px;width:355px;">-Steve y Barbara</div></section>
                                <footer id="carta-footer" style="background-image:url(&quot;http://fotos.subefotos.com/57f6ea113ab8b27188c4f496543efb4fo.png&quot;); margin-top: -20px; color: rgb(62, 45, 45); text-align: right; padding: 53px 59px 0px 0px; height: 46px; font-size: 13px;"><a href="https://codepen.io/prez/" style="text-decoration:none;font-size:20px;color:#6f0d0d;" onmouseover="this.style.color='red'" onmouseout="this.style.color='#6f0d0d'" alt="Mallister">※</a></footer><div style="clear:both;">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </main>
                    <!-- Optional JavaScript -->
                      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                  </body>
                  </body>
                  <?php
                    include_once 'footer.php';
                   ?>

                  </html>
