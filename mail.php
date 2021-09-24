<?php 

// Den här filen läses in när du tryckt på "skicka" på mailsidan

$page_title = "Funktioner"; ?>
    <?php include("includes/header.php"); ?>
    
    <?php include("includes/mainmenu.php"); ?>
    
    <article class="mainContent">

    <?php 

        echo "<h1>$page_title</h1><br/>";
        echo "<strong>Del 1</strong><br/><br/>";

        if (isset($_POST['button'])) { // koden kollar om knappen i formuläret aktiverats   
            length(); // om knappen aktiverats körs funktionen length som mäter längden på input
        }
    
        function sendmail() { // den här funktionen skickar mailet

            $message = $_POST['message']; // jag sparar min input i en variabel som heter message

            $mailTo = "linnea@isebrink.se"; // här sätts vem mailet ska skickas till
            $headers = "Mail från din skoluppgift"; // titeln på mailet
            $txt = $message;

            mail($mailTo, $headers, $message); // det här är hur mailet ska sammanfogas

        }

        function length() { // funktionen som mäter längden på mailet
            $email = strlen($_POST['message']); // sparar texten som en variabel som heter email

                    if ($email <= 5) { // om email är mindre eller lika med 5 tecken skickas ett error meddelande ut
                        echo "<p>Skriv ett längre meddelande!</p>";

                    } elseif ($email >= 6) { // om meddelandet är lika med eller längre än sex skickas meddelandet ut och en knapp visas som tar dig tillbaka till startsidan

                        sendmail();
                        echo "<p>Ditt mail är skickat!</p><br/>";
                    }

                }

    ?>
        <form action="delmoment5.php">
            <input type="submit" value="Återställ sidan">
        </form>  
    </article>
    
    <?php include("includes/footer.php"); ?>