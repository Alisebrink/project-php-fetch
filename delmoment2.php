<?php $page_title = "Villkor"; ?>
    <?php include("includes/header.php"); ?>
    
    <?php include("includes/mainmenu.php"); ?>
    
    <article class="mainContent">

    <?php 

        echo "<h1>$page_title</h1><br/>";

        $date = date('d-m-o:H.i.s'); // skriver ut datum i rätt format
        $weekday = date('l'); // sätter en variabel som weekday för att kunna köra switch och byta till svenska namn på dagarna

        echo "<strong>Del 1</strong><br/><strong>Datum/Klockslag: </strong>" . $date;
        echo "<br/><br/><strong>Del 2</strong><br/>Jag ville bara berätta att idag är det "; // idag är det..

        switch ($weekday){ // här byter jag ut de engelska namnen till svenska med hjälp av switch
            case "Monday":
                echo "måndag";
            break;
            case "Tuesday":
                echo "tisdag";
            break;
            case "Wednesday":
                echo "onsdag";
            break;
            case "Thursday":
                echo "torsdag";
            break;
            case "Friday":
                echo "fredag";
            break;
            case "Saturday":
                echo "lördag";
            break;
            case "Sunday":
                echo "söndag";
            break;

        }

        

        if ($weekday === "Sunday"){
            echo "'<br/><br/><strong>Del 3</strong></br>Så just nu har du tur, för nu är det ' . $weekday" . "."; // idag är det söndag, skrivs bara ut om det är söndag
        } else {
            echo "<br/><br/><strong>Del 3</strong><br/>Och jag måste säga att idag är det inte söndag."; // skrivs ut om det inte är söndag
        }

        $t = date("H"); // sätter tiden på dygnet i en variabel som heter t

        if ( "6" < $t && $t < "9") { // om klockan är mellan 6 och 9 körs följande
            echo "<br/><br/><strong>Del 3</strong><br/>Hoppas du haft en bra morgon!";
        } elseif ( "9" < $t && $t < "12") { // om klockan är mellan 9-12 körs följande
            echo "<br/><br/><strong>Del 3</strong><br/>Ha en bra förmiddag!";
        } elseif ( "12" < $t && $t < "18") { // om klockan är mellan 12-18 körs följande
            echo "<br/><br/><strong>Del 3</strong><br/>Hoppas du ätit, det är efter lunchtid nu!";
        } else {
            echo "<br/><br/><strong>Del 3</strong><br/>Snart får du äntligen sova!"; // och på den tiden som blir över körs detta
        }

    ?>
        
    </article>
    
    <?php include("includes/footer.php"); ?>