<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
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
            line-height: 1.4;
        }

        .payment-methods {
            margin: 25px 0;
        }

        .payment-option {
            display: flex;
            align-items: center;
            margin: 15px 0;
            padding: 15px;
            border: 2px solid #e1e1e1;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .payment-option:hover {
            border-color: #2196F3;
            background-color: #f8f9fa;
            transform: translateY(-2px);
        }

        .payment-option input[type="radio"] {
            margin-right: 15px;
            width: 20px;
            height: 20px;
            accent-color: #2196F3;
        }

        .payment-option label {
            font-size: 16px;
            font-weight: 500;
            color: #333;
            cursor: pointer;
            flex: 1;
        }

        .room-details {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 25px;
        }

        .room-details p {
            color: #666;
            font-size: 14px;
            margin: 5px 0;
        }

        button {
            width: 100%;
            padding: 16px;
            background: #2196F3;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        button:hover {
            background: #1976D2;
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(33, 150, 243, 0.3);
        }

        .payment-icon {
            width: 30px;
            height: 30px;
            margin-right: 15px;
            object-fit: contain;
        }

        @media (max-width: 480px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
    <h1>Payment for Room: <?= $room['room_name'] ?> (<?= $room['room_type'] ?>)</h1>

        <div class="room-details">
            <p><strong>Check-in:</strong> <?= $check_in_date ?></p>
            <p><strong>Check-out:</strong> <?= $check_out_date ?></p>
            <p><strong>Duration:</strong> <?= $duration ?> night(s)</p>
            <p><strong>Total Amount:</strong> Rp<?= number_format($total_amount, 2) ?></p>
        </div>


        <form action="/payment/processPayment" method="POST">
            <!-- Hidden inputs for additional data -->
            <input type="hidden" name="room_id" value="<?= $room['id'] ?>">
            <input type="hidden" name="check_in_date" value="<?= $check_in_date ?>">
            <input type="hidden" name="check_out_date" value="<?= $check_out_date ?>">
            <input type="hidden" name="total_amount" value="<?= $total_amount ?>">

            <h2 style="margin-bottom: 20px; font-size: 18px; color: #333;">Choose Payment Method</h2>
            
            <div class="payment-methods">
                <div class="payment-option">
                    <input type="radio" id="qris" name="payment_method" value="QRIS" required>
                    <img src="/path/to/qris-icon.png" alt="QRIS" class="payment-icon">
                    <label for="qris">QRIS</label>
                </div>

                <div class="payment-option">
                    <input type="radio" id="gopay" name="payment_method" value="Gopay" required>
                    <img src="/path/to/gopay-icon.png" alt="Gopay" class="payment-icon">
                    <label for="gopay">Gopay</label>
                </div>
            </div>

            <button type="submit">Pay Now</button>
        </form>
    </div>
</body>
</html>
