<?php
declare(strict_types=1);
error_reporting(E_ALL);

class message{ // här skapar jag min klass som jag anropar och jag har döpt den till "message"
	private $username = "";
	private $message = "";
	private $dateTime = "";

	function __construct( string $name, string $message, string $dt){
		$this->username = $name;
		$this->message = $message;
		$this->dateTime = $dt;
	}
	function getUsername() : string {
		return $this->username;
	}
	function setUsername(string $name) : void {
		$this->username = $name;
	}
	function getMessage() : string {
		return (string)$this->message;
	}
    function setMessage(string $message) : void {
		$this->message = $message;
	}
	function getDateTime() : string {
		return $this->dateTime;
	}
	function setDateTime(string $dt) : void {
		$this->dateTime = $dt;
	}
}

?>