<?php $page_title = "Variabler"; ?>
    <?php include("includes/header.php"); ?>
    
    <?php include("includes/mainmenu.php"); ?>
    
    <article class="mainContent">

    <?php

    echo "<h1>$page_title</h1><br/>";
    
    $name = "Linnea Isebrink"; // sätter name som mitt namn
    $age = "30 år "; // min ålder
    $mail = "mailto:linnea@isebrink.se?Subject=Hello%20again"; // min mail

    echo "Hej, jag heter " . $name . ". Jag är " . $age . " gammal. Om du vill kan du kan nå mig på följande epost: " . '<a href="' . $mail . '">linnea@isebrink.se</a>'; // skriver ut det som en lång sträng

    ?>

    <!-- <p>Hej jag heter <?= $name ; ?>, jag är <?= $age ; ?>gammal och nås på följande epost: <a href="<?= $mail ; ?>" target="_top">linnea@isebrink.se</a></p> -->
        
    </article>
    
    <?php include("includes/footer.php"); ?>