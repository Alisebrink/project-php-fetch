<?php $page_title = "Logga in för administrering"; ?>
    <?php include("includes/header.php"); ?>

    <?php if(isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username == "linnea" && $password == "password") {
            $_SESSION['username'] = $username;
            header("Location: admin.php");

            $user= strip_tags($user);
            $content= strip_tags($content);
        } else {
            $message = "Felaktigt användarnamn/lösenord!";
        }
    }

    ?>
    <?php include("includes/mainmenu.php"); ?>
    <article class="mainContent">

    <?php echo "<h1>$page_title</h1><br/>";

    if(isset($_GET['message'])) {
        echo "<p class='error'>" . $_GET['message'] . "</p>";
    }

    if(isset($message)) {
        echo "<p class='error'>" . $message . "</p>";
    }
    ?>
    <form method="post" action="login.php" style="width:220px">
        <label for="user">Användarnamn: </label>
        <br>
        <input type="text" name="username" id="username">
        <br><br>
        <label for="password">Lösenord: </label>
        <br>
        <input type="password" name="password" id="password">
        <br>
        <input type="submit" value="Logga in">
    </form>
    <br/><br/><br/>
    <p>Användarnamn: linnea</p>
    <p>Lösenord: password</p>

    </article>

     <?php include("includes/footer.php"); ?>