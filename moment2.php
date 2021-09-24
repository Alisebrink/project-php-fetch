<?php 

require "messages.php"; // hämtar in min klass

// Skapar en array med inläggen
$messageList = [];

// Hämtar tidigare skapade inlägg från data-filen
if( file_exists("../../writeable/messages.data") )
	$messageList = unserialize(file_get_contents("../../writeable/messages.data"));

// Detta händer när postMessage-knappen trycks på
if(isset($_REQUEST["postMessage"])){
    // Kontrollerar så att båda fälten är ifyllda, de får inte vara tomma
	if( !empty($_REQUEST["name"]) && !empty($_REQUEST["message"])){ 
        // om båda fälten är ifyllda skapas ett nytt objekt
		$messageList[] = new message((string)$_REQUEST["name"], (string)$_REQUEST["message"],(string)date("H:i d-M-Y"));
        
        // serialiserar objektet, sparar det i data-filen så att man kan arbeta med det senare
	    file_put_contents("../../writeable/messages.data",serialize($messageList));
	}
	unset($_REQUEST[postMessage]); // Gör att det inte går att klicka på knappen
	header("Location: moment2.php"); // Laddar om sidan
	exit();
}

//
// Detta händer om man trycker på "delete"
if(isset($_REQUEST["del"])){
	unset($messageList[$_REQUEST["del"]]); // Tar bort det inlägget du trycker på
	//
	// Serialiserar datan och lägger till den i min array
	file_put_contents("../../writeable/messages.data",serialize($messageList));

	unset($_REQUEST["del"]); // Gör att det inte går att klicka på knappen
	header("Location: moment2.php"); // Laddar om sidan
	exit();
}

// Detta händer om man trycker på "CSV"-knappen
if(isset($_REQUEST["visaCSV"])){
		
		// Sparar all data i en fil och visar upp den
		$fp = fopen("../../writeable/csv.data", "w");
		foreach ($messageList as $key=>$obj) {
		  $str = $obj->getUsername().",".$obj->getMessage().",".$obj->getDateTime().PHP_EOL;
		  fwrite($fp, $str);
		}
		fclose($fp);	
		unset($_REQUEST["visaCSV"]); // Gör att det inte går att klicka på knappen
		header("Location: ../../writeable/csv.data"); // Visar csv-filen
		exit();	
}

?>

<?php $page_title = "Linneas gästbok"; ?>
    <?php include("includes/header.php"); ?>
    
    <?php include("includes/mainmenu.php"); ?>
    
    <article class="mainContent">

    <?php

    echo "<h1>$page_title</h1><br/>";

    ?>

    <article class="guestbook-container">

    <div class="left-flexbox">

    <h3>Lämna en kommentar</h3>

    <form action="moment2.php" method="post">
        <p>Ditt namn:</p>
        <input type="text" name="name">
        <br/>
        <br/>
        <p>Ditt meddelande:</p>
        <textarea class="textrutan-message" name="message" rows="10" cols="30"></textarea>
        <br/><br/>
        <input type="submit" name="postMessage" value="Posta ditt inlägg"><br/>
        <input type="submit" name="visaCSV" value ="Visa CSV-fil">
        </form>
    </div>

    <div class="right-flexbox">
    <?php 

    foreach($messageList as $key =>$obj){ // här loopar jag ut innehållet i min array i min gästbok
    echo "<div class='div-containing-message'><h3>Postat av: " . $obj->getUsername() . "</h3><p>" . $obj->getMessage() . "</p><h4>Inlägget kom: " . $obj->getDateTime() . "</h4><br/><a class='guestbook-message-delete' href='moment2.php?del=$key'>". "Radera inlägg</a></div><br/>";
    }

    ?>

    </div>  
    
    </article>
    
    <?php include("includes/footer.php"); ?>