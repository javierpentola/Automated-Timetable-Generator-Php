<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $index = $_POST['index'];
    if (file_exists('calendar_data.xml')) {
        $xml = simplexml_load_file('calendar_data.xml');
        unset($xml->class[intval($index)]);
        $xml->asXML('calendar_data.xml');
    }
    header("Location: calendar.php");
    exit();
}
?>
