<?php
$conn = pg_connect("host=localhost dbname=postgres user=postgres password=0085 port=5433");
if ($conn) {
    // echo 'Connection attempt succeeded.'; 
} else {
    // echo 'Connection attempt failed.';
}
?>
