<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $faculties = $_POST['faculty'];
    $subjects = $_POST['subject'];
    $rooms = $_POST['room'];
    $days = $_POST['day'];
    $times = $_POST['time'];

    $xml = new DOMDocument("1.0", "UTF-8");

    // Load existing XML file or create a new one if it doesn't exist
    if (file_exists('calendar_data.xml')) {
        if (filesize('calendar_data.xml') == 0) {
            // Initialize with root element if file is empty
            $root = $xml->createElement("classes");
            $xml->appendChild($root);
            $xml->save('calendar_data.xml'); // Save the initial structure
        } else {
            $xml->load('calendar_data.xml');
            $root = $xml->getElementsByTagName("classes")->item(0);
        }
    } else {
        $root = $xml->createElement("classes");
        $xml->appendChild($root);
        $xml->save('calendar_data.xml'); // Save the initial structure
    }

    // Append new class entries to the XML
    foreach ($faculties as $index => $faculty) {
        $class = $xml->createElement("class");

        $facultyElement = $xml->createElement("faculty", htmlspecialchars($faculty));
        $subjectElement = $xml->createElement("subject", htmlspecialchars($subjects[$index]));
        $roomElement = $xml->createElement("room", htmlspecialchars($rooms[$index]));
        $dayElement = $xml->createElement("day", htmlspecialchars($days[$index]));
        $timeElement = $xml->createElement("time", htmlspecialchars($times[$index]));

        $class->appendChild($facultyElement);
        $class->appendChild($subjectElement);
        $class->appendChild($roomElement);
        $class->appendChild($dayElement);
        $class->appendChild($timeElement);

        $root->appendChild($class);
    }

    $xml->save('calendar_data.xml');
    echo "Timetable saved successfully!";
}
?>
