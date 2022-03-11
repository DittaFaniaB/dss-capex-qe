<?php
class User {
    public static $table = 'users';
    public static $conn;

    public function __construct($conn)
    {
        self::$conn = $conn;
    }

    public static function select($cols)
    {
        $query_text = "SELECT ".$cols." FROM ".self::$table;
        $query = pg_query(self::$conn, $query_text);
        return $query;
    }

    public static function where($cols, $conditions)
    {
        $query_text = "SELECT ".$cols." FROM ".self::$table." WHERE ".$conditions;
        $query = pg_query(self::$conn, $query_text);
        return $query;
    }
}