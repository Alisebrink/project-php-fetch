<?php $page_title = "Extern fil"; ?>
    <?php include("includes/header.php"); ?>
    
    <?php include("includes/mainmenu.php"); ?>
    
    <article class="mainContent">

    <?php 
        echo "<h1>$page_title</h1><br/>";
    ?>

   <ul>
    <?php // ville bara skicka en liten hyllning till Emmeli som hjälpte mig med det här delmomentet :)
        $courses = file('courses.txt'); // läser in min textfil

        if (file_exists('courses.txt')) { // kollar så att filen existerar och gör den det körs min loop
            foreach ($courses as $kurs) {
                echo "<li> $kurs </li>";
            }
            
        } else {
            echo "<p style='color:red'>Error: file does not exist!</p>"; // finns inte filen körs detta istället
        }
    ?>
    </ul>
        
    </article>
    
    <?php include("includes/footer.php"); ?>