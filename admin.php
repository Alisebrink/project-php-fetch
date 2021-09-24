<?php $page_title = "Administrering av Linneas gästbok"; ?>
    <?php include("includes/header.php"); ?>

    <?php 
    // A check to see if the user is logged in
    if(!isset($_SESSION['username'])) {
        header("Location: login.php?message=Du måste vara inloggad!");
    }
    
    ?>
    <?php include("includes/mainmenu.php"); ?>
    
    <article class="mainContent">

    <?php echo "<h1>$page_title</h1><br/>"; ?>

    <p>Den här sidan ska du bara kunna nå om du är inloggad. <br/>Här kan du radera poster i gästboken.</p>

    <a class='guestbook-message-delete' href="logout.php" style="margin-bottom:10px;">Logga ut</a>

    <?php
        $post = new Posts();

        $guestbookitems = $post->getPosts();

        if(isset($_GET['deleteid'])) {
            $id = $_GET['deleteid'];

            if($post->deletePost($id)) {
                echo "<p class'message'>Posten raderad</p>";
            } else {
                echo "<p> class='message'>Fel vid radering..</p>";
            }

            header("Location: admin.php");

        }

        foreach($guestbookitems as $item) {
            echo "<div class='div-containing-message' id='" . $item['id'];
            echo "'><h3>" . $item['user'] . "</h3>";
            echo "<p>" . $item['content'] . "</p>";
            echo "<h4>" . $item['created'] . "</h4>";
            echo "<a class='guestbook-message-delete' id='delete' href='";
            echo "admin.php?deleteid=" . $item['id'] . "'> Radera inlägg</a>";
            echo "</div>";
        }
    ?>

     <?php include("includes/footer.php"); ?>