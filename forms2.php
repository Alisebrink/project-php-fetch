    <?php $page_title = "Linneas gästbok"; ?>
    <?php include("includes/header.php"); ?>
    
    <?php include("includes/mainmenu.php"); ?>
    
    <article class="mainContent">

    <?php 

        echo "<h1>$page_title</h1><br/>";
        ?>
<?php
declare(strict_types=1);
error_reporting(E_ALL);

class guestbook{
	private $bidInfo = "";
	private $bid = 0;
	private $dateTime = "";

	function __construct( string $info, int $bid, string $dt){
		$this->bidInfo = $info;
		$this->bid = $bid;
		$this->dateTime = $dt;
	}
	function getBidInfo() : string {
		return $this->bidInfo;
	}
	function setBidInfo(string $info) : void {
		$this->bidInfo = $info;
	}
	function getBid() : int {
		return (int)$this->bid;
	}
	function setBid(int $bid) : void {
		$this->bid = $bid;
	}
	function getDateTime() : string {
		return $this->dateTime;
	}
	function setDateTime(string $dt) : void {
		$this->dateTime = $dt;
	}
}

// 
// Create object array
$budLista = [];

//
// Get earlier saved file content and unserialize it to the array of objects
if( file_exists("writeable/bud.data") )
	$budLista = unserialize(file_get_contents("writeable/bud.data"));

//
// If "geBud" button pressed?
if(isset($_REQUEST["geBud"])){
	if( !empty($_REQUEST["info"]) && is_numeric($_REQUEST["bid"])){ // Check for correct input data
		$budLista[] = new Bid((string)$_REQUEST["info"], (int)$_REQUEST["bid"],(string)date("Y-M-d h:i:s"));
	    //
	    // Serialize and save all of the new object array to file
	    file_put_contents("writeable/bud.data",serialize($budLista));
	}
	unset($_REQUEST[geBud]); // Disable button press
	header("Location: bud.php"); // Reload page
	exit();
}

//
// If "delete bid" pressed?
if(isset($_REQUEST["del"])){
	unset($budLista[$_REQUEST["del"]]); // Delete object with index 'del' from array 
	//
	// Serialize and save all of the new object array to file
	file_put_contents("writeable/bud.data",serialize($budLista));

	unset($_REQUEST["del"]); // Disable button press
	header("Location: bud.php"); // Reload page
	exit();
}

//
// If "visaCSV" button pressed?
if(isset($_REQUEST["visaCSV"])){
		//
		// Save all of the new object array to csv file and publish
		$fp = fopen("writeable/bud.csv", "w");
		foreach ($budLista as $key=>$obj) {
		  $str = $obj->getBidInfo().",".$obj->getBid().",".$obj->getDateTime().PHP_EOL;
		  fwrite($fp, $str);
		}
		fclose($fp);	
		unset($_REQUEST["visaCSV"]); // Disable button press
		header("Location: writeable/bud.csv"); // Show CSV file
		exit();	
}

?>
<!DOCTYPE html> 
<html lang="sv">
<head>
<title>OOP - Budgivning</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 
<style type="text/css">
  span { font-style: italic; font-weight: bold }
  span:nth-child(odd) { background: lightgrey; }
</style>
</head>

<body>
<h2>Budlista</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<p>
<?php
  //
  // Write the list of points to screen with erase anchor coupled to array key id
  foreach($budLista as $key => $obj){
    echo "<span>" . $obj->getBidInfo() . ", " .  $obj->getBid()  . ", " . $obj->getDateTime() . "</span> <a href='bud.php?del=$key'>Radera bud</a><br />";
  }
?>
</p>
<p>
Namn: <input type="text" name="info" />
  Bud: <input type="text" name="bid" />
    <input type="submit" name="geBud" value="Registrera Bud"/>
</p>
<p>
<input type="submit" name="visaCSV" value="Visa CSV-fil"/>
</p>
</form>
</body>
</html>
    
    <?php include("includes/footer.php"); ?>

    
