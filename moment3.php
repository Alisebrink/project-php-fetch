<?php $page_title = "Moment 3 - Linneas Gästbok"; ?>
    <?php include("includes/header.php"); ?>
    
    <?php include("includes/mainmenu.php"); ?>
    
    <article class="mainContent">

    <?php echo "<h1>$page_title</h1><br/>"; ?>

    <article class="guestbook-container">

    <div class="left-flexbox">

    <?php

    $db =  new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if($db->connect_errno > 0) {
        die("Fel vid anslutning: " . $db->connect_error);
    }

    if(isset($_POST['user'])) {
        $user = $_POST['user'];
        $content = $_POST['content'];

        // Lägg till data
        $sql = "INSERT INTO guestbook(user, content)VALUES('$user', '$content')";
        $result = $db->query($sql);
    }

    ?>

    <h3>Lämna en kommentar</h3>

    <form action="moment3.php" method="post">
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

    // SQL-fråga

    $sql = "SELECT * from guestbook ORDER BY created DESC";
    $result = $db->query($sql);

    while($row = $result->fetch_assoc()) {
        ?>

    <div class='div-containing-message'><h3><?= $row['user']; ?></h3>
    <p> <?= $row['content']; ?></p>
    <h4> <?= $row['created']; ?></h4></div>

        <?php
    }
    ?>

    </div>

    </article>
    
     <?php include("includes/footer.php"); ?>