<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Verified</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
<!-- Favicons -->
  <link href="assets/img/logo/directorylogo.png" rel="icon">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: #333;
        }

        .card {
            background: #fff;
            padding: 3rem 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            text-align: center;
            max-width: 400px;
            width: 100%;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            color: #2e7d32;
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        p {
            font-size: 1rem;
            color: #555;
        }

        .checkmark {
            font-size: 3rem;
            color: #2e7d32;
            margin-bottom: 1rem;
        }

        @media (max-width: 480px) {
            .card {
                padding: 2rem 1.2rem;
            }

            h2 {
                font-size: 1.5rem;
            }

            .checkmark {
                font-size: 2.5rem;
            }
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="checkmark">✅</div>
        <h2>Email Successfully Verified</h2>
        <p>You can now return to the device where you registered to continue.</p>
    </div>

</body>
</html>
