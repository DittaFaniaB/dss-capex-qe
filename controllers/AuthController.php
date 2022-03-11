<?php
class AuthController {
    private $conn;

    function __construct($conn)
    {
        $this->conn = $conn;
    }

    function login($username, $password)
    {
        include_once($_SERVER["DOCUMENT_ROOT"]."/ditta/models/User.php");
        $user = new User($this->conn);
        $query = $user::where("*", "nik = '".$username."'");
        $user = pg_fetch_assoc($query);
        if (password_verify($password, $user["password"])) {
            $user["password"] = null;
            return $user;
        } else {
            return null;
        }
    }
}

?>