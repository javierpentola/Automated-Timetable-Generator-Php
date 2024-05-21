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
                // Database connection
                $servername = "localhost";
                $username = "root"; // Change this if necessary
                $password = ""; // Change this if necessary
                $dbname = "timetable_db";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch timetable data
                $sql = "SELECT day, time, faculty, subject, room FROM timetable";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["day"] . "</td>
                                <td>" . $row["time"] . "</td>
                                <td>" . $row["faculty"] . "</td>
                                <td>" . $row["subject"] . "</td>
                                <td>" . $row["room"] . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No schedule found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
