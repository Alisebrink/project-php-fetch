<?php

class Posts {
    private $db;

    // This __construct function I use to open up a connection to my database
    function __construct() {
        $this->db =  new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if($this->db->connect_errno > 0) {
        die("Fel vid anslutning: " . $db->connect_error);
        }
    }
    // My method to read posts from my database
    public function getPosts() {
        // sql command to get data from my database table called 'guestbook'
        $sql = "SELECT * from guestbook ORDER BY created DESC";
        $result = $this->db->query($sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function addPost(string $user, string $content) {
        $sql = "INSERT INTO guestbook(user, content)VALUES('$user', '$content')";

        return $this->db->query($sql);
    }

    public function deletePost(int $id) {
        $sql = "DELETE FROM guestbook WHERE id=$id";
        return $this->db->query($sql);
    }
}
