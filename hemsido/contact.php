
  <?php // <-- Här öppnar vi PHP-taggen.

  if (isset($_POST['submit'])) { // Här kollar vi om "Skicka"-knappen är klickad och vad som ska hända efter att den är klickad.

    // Kollar ifall förnamnet INTE är ifyllt och ger isåfall ett felmeddelande till användaren.
    if (!$_POST['firstName']) {
      $error = "- Please enter your first name.";
    }

    // Kollar ifall efternamnet INTE är ifyllt och ger isåfall ett felmeddelande till användaren. "<br>" gör en ny rad på sidan.
    if (!$_POST['lastName']) {
      $error = "<br>- Please enter your last name.";
    }

    // Kollar ifall e-postadressen INTE är ifylld och ger isåfall ett felmeddelande till användaren. "<br>" gör en ny rad på sidan.
    if (!$_POST['email']) {
      $error .= "<br>- Please enter your email adress.";
    }

    // Kollar ifall meddelandet INTE är ifyllt och ger isåfall ett felmeddelande till användaren. "<br>" gör en ny rad på sidan.
    if (!$_POST['message']) {
      $error .= "<br>- Please enter your message.";
    }

    // Kollar ifall svaret är något annat än 5 och ger isåfall ett felmeddelande till användaren. "<br>" gör en ny rad på sidan.
    if (intval($_POST['human']) !== 5) {
      $error .= "<br>- Please verify your not a robot.";
    }

    // Här kollar vi ifall det finns några fel och om det finns så skriver vi ut dem åt användaren.
    if ($error) {
      $result = "Oh no! An Error! Please correct the following: $error";
    }

    // Skickar mejlet ifall alla fält är ifyllda och inga fel finns.
    else {

      // PHPs mailfunktion.
      mail(
        "william.stara@optistud.fi", // <-- Adressen dit mejlet skickas
        "Subject line", // <-- Mejlets ämnesrad.
        "Name: " .$_POST['firstName']. // <-- Det användaren har angett som förnamn i formuläret.
        "\r\nEmail: " .$_POST['email']. // <-- Det användaren har angett som e-postadress i formuläret. \r\n gör radbrytningar i själva mejlet.
        "\r\nMessage: " .$_POST['message'] // <-- Det användaren har angett som meddelande i formuläret. \r\n gör radbrytningar i själva mejlet.
      );

      // Texten som visas efter att mejlet skickats.
      {
        $result = "Thank you! We will be in touch shortly.";
      }
    }
  }
  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Website</title>
    <link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="index.css/index.css" rel="stylesheet">
    <link href="favicon.ico" rel="icon">
  </head>
  <body>

    <? include "navigation.php";?>

    <!--hero-->
    <header class="contact">
      <h1>Contact us!</h1>
    </header>

    <!-- CONTACT FORM -->
    <form method="post">
      <?php echo $result; //Prints out the error to screen ?>

      <input type="text" name="firstName" placeholder="First name">
      <input type="text" name="lastName" placeholder="Last name">
      <input type="email" name="email" placeholder="E-mail">
      <textarea rows="10" name="message" placeholder="Your Message..."></textarea>
      <input type="submit" name="submit" class="buttom" value="Submit">


    </form>

    <!--Marketing-->
    <section>
      <h2>What you can get!</h2>
    <div class="fire">
      <i class="fa fa-fire" aria-hidden="true"></i>
      <h3>Buy Accessories</h3>
    </div>
    <div class="home">
      <i class="fa fa-glass" aria-hidden="true"></i>
      <h3>Buy flavors here!</h3>
    </div>

    <div class="phone">
      <i class="fa fa-phone" aria-hidden="true"></i>
      <h3>Call us for info</h3>
    </div>
    </section>

<!--FOOTER-->
  <footer>&copy; <?php echo date('Y'); ?></footer>

  </body>
</html>
