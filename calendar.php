<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/98.css" />
    <title>Class Schedule Calendar</title>
    <style>
        body {
            font-family: 'MS Sans Serif', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #008080;
        }
        .container {
            background-color: #c0c0c0;
            border: 2px solid #000000;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 80%;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000000;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #333;
            color: #ffffff;
        }
        td {
            background-color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Class Schedule Calendar</h1>
        <table>
            <thead>
                <tr>
                    <th>Day</th>
                    <th>Time</th>
                    <th>Faculty</th>
                    <th>Subject</th>
                    <th>Room</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (file_exists('calendar_data.xml')) {
                    $xml = simplexml_load_file('calendar_data.xml');
                    foreach ($xml->class as $class) {
                        echo "<tr>
                                <td>" . htmlspecialchars($class->day) . "</td>
                                <td>" . htmlspecialchars($class->time) . "</td>
                                <td>" . htmlspecialchars($class->faculty) . "</td>
                                <td>" . htmlspecialchars($class->subject) . "</td>
                                <td>" . htmlspecialchars($class->room) . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No schedule found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
