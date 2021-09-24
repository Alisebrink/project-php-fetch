<?php $page_title = "Formulär"; ?>
    <?php include("includes/header.php"); ?>
    
    <?php include("includes/mainmenu.php"); ?>
    
    <article class="mainContent">

    <?php 

    echo "<h1>$page_title</h1><br/>";

    echo "<strong>Del 1</strong><br/>";

    ?>


<form action="delmoment4.php" method="GET">
  <p>Fyll i ditt namn så ska jag spara informationen och göra något elakt av det.</p>
  <table>
  <tr><td><label>Förnamn:</label></td><td><input type="text" name="firstname"/></td></tr>
  <tr><td><label>Efternamn:</label></td><td><input type="text" name="lastname"/></td></tr>
  <tr><td>&nbsp;</td><td><input type="submit" value="Skicka" name="button" style="float:right;"/></td></tr>
  </table>
</form>

    <?php


if (isset($_GET['button'])) { // samma funktion som finns i forms.php, se mina kommentarer där

  if (empty($_GET['firstname']) || empty($_GET['lastname'])) {

    echo "Fyll i båda fälten tack!";

  } elseif (isset($_GET['firstname']) && isset($_GET['lastname'])) {

    $fname = $_GET['firstname'];
    $lname = $_GET['lastname'];
    echo "Du heter $fname $lname!";
  }
}


    echo "<br/>--------------<br/>";
    echo "<strong>Del 2</strong><br/>";

         ?>

<form action="forms.php" method="POST"> <!-- formuläret skickar oss till forms.php, läs mina kommentarer där -->
  <p>Beräkna arean på en kvadrat genom att ange längd och bredd nedan.</p>
  <table>
  <tr><td><label>Längd:</label></td><td><input type="number" name="length"/></td></tr>
  <tr><td><label>Bredd:</label></td><td><input type="number" name="width"/></td></tr>
  <tr><td>&nbsp;</td><td><input type="submit" value="Beräkna" name="button" style="float:right;"/></td></tr>
  </table>
</form>

      <br/>

    </article>
    
    <?php include("includes/footer.php"); ?>