<?php $page_title = "Upprepningar"; ?>
    <?php include("includes/header.php"); ?>
    
    <?php include("includes/mainmenu.php"); ?>
    
    <article class="mainContent">

    <?php 

        echo "<h1>$page_title</h1><br/>";


        echo "<strong>Del 1</strong><br/>";
        for ($x = 10; $x > 0; $x--) { // Detta är en loop som skriver ut siffrorna 10-1 och slutar när det är klart
            echo "$x <br/>";
        }

        echo "<br/>--------------<br/>";
        echo "<strong>Del 2</strong><br/>";
        $x = 0; // min är 0
        $y = 100; //max är 0
        $iterations = 0; // denna variabel räknar antalet gånger loopen körs och sätts till 0 i början

        while($y >= 0 && $x <= 100) { // så länge resultatet är mindre än eller lika med 100 så körs loopen vidare
        $iterations++; // iterations läggs på 1 för varje gång loopen körs
        $randNumb = rand(0, 100); // denna variabel tar ett slumpmässigt tal mellan 0 och 100
               if($randNumb === 99) { // om min siffra är 99 stoppas loopen och meddelandet skrivs ut
                 echo "Nu är du klar!<br/>";
               break;
            } elseif ($randNumb != 99) { // om resultatet av loopen inte är 99 så fortsätter loopen att köras
                $randNumb = rand(0, 100);
            }
        }

        echo "Det tog " . $iterations . " upprepningar för att slumpa fram talet 99."; // skriver ut hur många loopar det tog att komma till 99

        echo "<br/>--------------<br/>";
        echo "<strong>Del 3</strong><br/>";

        $courses = array("Webbutveckling","Introduktion till programmering med JavaScript","Digital bildbehandling för webb","Typografi och form för webb","Databaser","Webbutveckling II","Webbanvändbarhet","Webbdesign för CMS"); // skapar en array med kurserna

        $arrlength = count($courses); // mäter hur många objekt som finns i min array

        for ($x = 0; $x < $arrlength; $x++) { // en loop som skriver ut antalet objekt tills det inte finns något kvar
            echo $courses[$x]; // skriver ut innehållet
            echo "<br/>";
        }

        echo "<br/>--------------<br/>";
        echo "<strong>Del 4</strong><br/>";

        $courses = array("Webbutveckling","Introduktion till programmering med JavaScript","Digital bildbehandling för webb","Typografi och form för webb","Databaser","Webbutveckling II","Webbanvändbarhet","Webbdesign för CMS"); // skapar en array med kurserna

        $arrlength = count($courses); // räknar längden på arrayen

        for ($x = 0; $x < $arrlength; $x++) { // skriver ut så länge som det finns nåt att skriva ut
            sort($courses); // sorterar innehållet i bokstavsordning
            echo $courses[$x]; // skriver ut innehållet
            echo "<br/>";
        }

    ?>
        
    </article>
    
    <?php include("includes/footer.php"); ?>