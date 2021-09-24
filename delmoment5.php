<?php $page_title = "Funktioner"; ?>
    <?php include("includes/header.php"); ?>
    
    <?php include("includes/mainmenu.php"); ?>
    
    <article class="mainContent">

    <?php 

        echo "<h1>$page_title</h1><br/>";

        echo "<strong>Del 1</strong><br/>";
    ?>

        <form action="mail.php" method="POST"> <!-- formuläret skickar oss vidare till mail.php -->
            <p>Kontaktformulär</p>
            <label>Meddelande:</label><br/>
            <textarea name="message" rows="8" cols="50" placeholder="Skriv ditt meddelande här.."></textarea><br/>
            <input type="submit" value="Skicka e-post" name="button"/>

        </form>
        <br/>
        
    </article>
    
    <?php include("includes/footer.php"); ?>