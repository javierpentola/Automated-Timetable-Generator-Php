<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (file_exists('calendar_data.xml')) {
        unlink('calendar_data.xml');
    }
    header("Location: calendar.php");
    exit();
}
?>
