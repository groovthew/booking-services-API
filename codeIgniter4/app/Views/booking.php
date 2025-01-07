<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Room</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #64B5F6 0%, #7986CB 100%);
            padding: 20px;
        }

        .container {
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            color: #333;
            font-size: 28px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-size: 15px;
            font-weight: 500;
        }

        input[type="date"],
        input[type="time"] {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e1e1e1;
            border-radius: 12px;
            font-size: 16px;
            color: #333;
            background: #fff;
            transition: all 0.3s ease;
        }

        input[type="date"]:focus,
        input[type="time"]:focus {
            border-color: #2196F3;
            outline: none;
            box-shadow: 0 0 0 3px rgba(33, 150, 243, 0.1);
        }

        button {
            width: 100%;
            padding: 14px;
            background: #2196F3;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background: #1976D2;
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(33, 150, 243, 0.3);
        }

        @media (max-width: 480px) {
            .container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Book a Room</h1>
        <form action="/booking/searchRooms" method="POST">
            <div class="form-group">
                <label for="check_in_date">Check-in Date</label>
                <input type="date" id="check_in_date" name="check_in_date" required>
            </div>

            <div class="form-group">
                <label for="check_in_time">Check-in Time</label>
                <input type="time" id="check_in_time" name="check_in_time" required>
            </div>

            <div class="form-group">
                <label for="check_out_date">Check-out Date</label>
                <input type="date" id="check_out_date" name="check_out_date" required>
            </div>

            <div class="form-group">
                <label for="check_out_time">Check-out Time</label>
                <input type="time" id="check_out_time" name="check_out_time" required>
            </div>

            <button type="submit">Search</button>
        </form>
    </div>
</body>
</html>