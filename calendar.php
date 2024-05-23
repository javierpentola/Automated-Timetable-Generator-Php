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
        .delete-button {
            background-color: #ff0000; /* Red button */
            color: #ffffff; /* White text */
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            font-weight: bold;
        }
        .delete-button:hover {
            background-color: #cc0000; /* Darker red on hover */
        }
        .delete-all-button, .back-button {
            background-color: #ff0000; /* Red button */
            color: #ffffff; /* White text */
            border: none;
            padding: 10px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
            margin-top: 20px;
        }
        .delete-all-button:hover, .back-button:hover {
            background-color: #cc0000; /* Darker red on hover */
        }
        .back-button {
            background-color: #0000ff; /* Blue button */
        }
        .back-button:hover {
            background-color: #0000cc; /* Darker blue on hover */
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (file_exists('calendar_data.xml')) {
                    $xml = simplexml_load_file('calendar_data.xml');
                    foreach ($xml->class as $index => $class) {
                        echo "<tr>
                                <td>" . htmlspecialchars($class->day) . "</td>
                                <td>" . htmlspecialchars($class->time) . "</td>
                                <td>" . htmlspecialchars($class->faculty) . "</td>
                                <td>" . htmlspecialchars($class->subject) . "</td>
                                <td>" . htmlspecialchars($class->room) . "</td>
                                <td><form method='POST' action='delete_class.php'>
                                    <input type='hidden' name='index' value='" . $index . "'>
                                    <button type='submit' class='delete-button'>Delete</button>
                                </form></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No schedule found</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <form method="POST" action="delete_all.php">
            <button type="submit" class="delete-all-button">Delete All Classes</button>
        </form>
        <form method="GET" action="index.php">
            <button type="submit" class="back-button">Back to Index</button>
        </form>
    </div>
</body>
</html>
