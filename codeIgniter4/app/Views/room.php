<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Room</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: #333;
            margin: 0;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 0 0 2px rgba(108, 92, 231, 0.1),
                        0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 90%;
            max-width: 1000px;
        }

        h1 {
            font-size: 32px;
            color: #3a4374;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
            margin-bottom: 30px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            font-size: 16px;
            border: 2px solid #e2e8f0;
        }

        th {
            background-color: #6c5ce7;
            color: white;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: 2px solid #6c5ce7;
        }

        tr {
            background-color: #f8f9fa;
            transition: all 0.3s ease;
        }

        tr:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        td:first-child, th:first-child {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        td:last-child, th:last-child {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        button {
            background-color: #6c5ce7;
            color: white;
            border: 3px solid #5b4bc6;
            padding: 12px 24px;
            font-size: 18px;
            font-weight: 500;
            cursor: pointer;
            border-radius: 50px;
            transition: all 0.3s ease;
            display: block;
            margin: 0 auto;
            font-family: 'Poppins', sans-serif;
        }

        button:hover {
            background-color: #5b4bc6;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(108, 92, 231, 0.4);
        }

        input[type="radio"] {
            margin: 0 10px;
            transform: scale(1.2);
            accent-color: #6c5ce7;
        }

        .availability {
            font-weight: 500;
        }

        .available {
            color: #27ae60;
        }

        .unavailable {
            color: #e74c3c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Select Your Room</h1>
        <form action="/room/selectRoom" method="POST">
            <input type="hidden" name="check_in_date" value="<?= $check_in_date ?>">
            <input type="hidden" name="check_out_date" value="<?= $check_out_date ?>">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Room Name</th>
                        <th>Type</th>
                        <th>Price/Night</th>
                        <th>Availability</th>
                        <th>Select</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rooms as $room): ?>
                    <tr>
                        <td><?= $room['id'] ?></td>
                        <td><?= $room['room_name'] ?></td>
                        <td><?= $room['room_type'] ?></td>
                        <td>$<?= number_format($room['price_per_night'], 2) ?></td>
                        <td class="availability <?= $room['availability'] ? 'available' : 'unavailable' ?>">
                            <?= $room['availability'] ? 'Available' : 'Unavailable' ?>
                        </td>
                        <td>
                            <input type="radio" name="room_id" value="<?= $room['id'] ?>" required <?= !$room['availability'] ? 'disabled' : '' ?>>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <button type="submit">Proceed to Payment</button>
        </form>
    </div>
</body>
</html>