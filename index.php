<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/98.css" />
    <title>Automated Timetable Generator</title>
    <style>
        body {
            font-family: 'MS Sans Serif', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #008080; /* Dark teal background */
        }

        .container {
            background-color: #c0c0c0; /* Light gray background */
            border: 2px solid #000000; /* Black border */
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 400px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #000000; /* Black text */
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 2px solid #000000; /* Black border */
            background-color: #ffffff; /* White background */
        }

        .add-class {
            background-color: #28a745; /* Green button */
            color: #ffffff; /* White text */
            border: none;
            padding: 10px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
            margin-bottom: 20px;
        }

        .add-class:hover {
            background-color: #218838; /* Darker green on hover */
        }

        input[type="submit"] {
            background-color: #008000; /* Green submit button */
            color: #ffffff; /* White text */
            border: none;
            padding: 10px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
        }

        input[type="reset"] {
            background-color: #ff0000; /* Red reset button */
            color: #ffffff; /* White text */
            border: none;
            padding: 10px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
        }

        .view-calendar {
            background-color: #0000ff; /* Blue button */
            color: #ffffff; /* White text */
            border: none;
            padding: 10px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
            text-align: center;
            display: block;
            margin-top: 20px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <form id="timetableForm" action="save_timetable.php" method="POST">
            <div id="class-container">
                <div class="form-group">
                    <label for="faculty">Faculty:</label>
                    <input type="text" name="faculty[]" required>
                </div>
                
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" name="subject[]" required>
                </div>
                
                <div class="form-group">
                    <label for="room">Room:</label>
                    <input type="text" name="room[]" required>
                </div>
                
                <div class="form-group">
                    <label for="day">Day:</label>
                    <input type="text" name="day[]" required>
                </div>
                
                <div class="form-group">
                    <label for="time">Time:</label>
                    <input type="text" name="time[]" required>
                </div>
            </div>
            <button type="button" class="add-class">Add Another Class</button>
            <input type="submit" value="Generate Timetable">
            <input type="reset" value="Reset">
        </form>
        <a href="calendar.php" class="view-calendar">View Calendar</a>
    </div>
    <script>
        document.querySelector('.add-class').addEventListener('click', function() {
            const classEntry = document.querySelector('.form-group').parentNode.cloneNode(true);
            document.getElementById('class-container').appendChild(classEntry);
        });
    </script>
</body>
</html>
