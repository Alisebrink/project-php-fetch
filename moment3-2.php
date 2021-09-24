<?php $page_title = "Moment 3 - Linneas Gästbok"; ?>
    <?php include("includes/header.php"); ?>
    
    <?php include("includes/mainmenu.php"); ?>
    
    <article class="mainContent">

    <?php echo "<h1>$page_title</h1><br/>"; ?>

    <article class="guestbook-container">
    <div class="left-flexbox">

    <?php

        $post = new Posts();

        // add post to my guestbook
        if(isset($_POST['user'])) {
            $user = $_POST['user'];
            $content = $_POST['content'];

            $post->addPost($user, $content);
            header("Location: moment3-2.php");
        }

    ?>

    <h3>Lämna en kommentar</h3>
    <form action="moment3-2.php" method="post">
    <label for="user">Ditt namn: </label>
    <input type="text" name="user" id="user">
    <br/>
    <br/>
    <label for="content">Ditt meddelande:</label>
    <textarea class="textrutan-message" name="content" id="content" rows="10" cols="30"></textarea>
    <br/><br/>
    <input type="submit" name="postMessage" value="Posta ditt inlägg"><br/>
    </form>
    </div>

    <div class="right-flexbox">
  
    <?php
        $guestbookitems = $post->getPosts();

        foreach($guestbookitems as $item) {
            echo "<div class='div-containing-message'><h3>" . $item['user'] . "</h3>";
            echo "<p>" . $item['content'] . "</p>";
            echo "<h4>" . $item['created'] . "</h4></div>";
        }
    ?>
    </div>

    </article>  </article>
     <?php include("includes/footer.php"); ?>