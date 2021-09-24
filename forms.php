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


if (isset($_GET['button'])) { // om knappen trycks på körs nästa ifsats

  if (empty($_GET['firstname']) || empty($_GET['lastname'])) { // här kollas det så att det är något ifyllt i båda fälten, är båda inte det körs min echo

    echo "Fyll i båda fälten tack!";

  } elseif (isset($_GET['firstname']) && isset($_GET['lastname'])) { // om båda fälten är ifyllda så körs denna elseif

    $fname = $_GET['firstname'];
    $lname = $_GET['lastname'];
    echo "<p>Du heter $fname $lname!</p>";
  }
}


    echo "<br/>--------------<br/>";
    echo "<strong>Del 2</strong><br/>";

         
 
    if (isset($_POST['button'])) { // här kollas det om det tryckts på knappen

      if (empty($_POST['length']) || empty($_POST['width'])) { // här kollar den så att båda fälten är ifyllda, är dom inte det körs min echo
      
        echo "<br/><p>Du måste fylla i både längd och bredd!</p>";
      
      } elseif (isset($_POST['length']) && isset($_POST['width'])) { // här kollas så att det finns text i båda fälten och då körs detta och sedan visas en knapp som tar en tillbaka till start
      
        $length = $_POST['length'];
        $width = $_POST['width'];
        echo "<p>Arean är beräknad till " . $length * $width . "kvm</p>";
      }
      }
  ?>
        <form action="delmoment4.php">
            <input type="submit" value="Återställ sidan">
        </form>  
    </article>
    
    <?php include("includes/footer.php"); ?>
    
