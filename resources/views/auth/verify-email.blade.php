<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Verification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to right, #74ebd5, #9face6);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
        }

        .card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 3rem 2rem;
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
            max-width: 420px;
            width: 100%;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.01);
        }

        h1 {
            margin-bottom: 1rem;
            font-size: 1.7rem;
            color: #222;
        }

        p {
            font-size: 1rem;
            color: #555;
            margin-bottom: 2rem;
        }

        .success-message {
            color: #28a745;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .error-message {
            color: #dc3545;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        button {
            background: linear-gradient(to right, #4facfe, #00f2fe);
            color: white;
            border: none;
            border-radius: 30px;
            padding: 0.75rem 2rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            opacity: 0.9;
        }

        @media (max-width: 480px) {
            .card {
                padding: 2rem 1.5rem;
            }

            h1 {
                font-size: 1.4rem;
            }
        }
    </style>
</head>
<body>

    <div class="card">
        <h1>Verify Your Email</h1>
        <p>Thanks for registering! We've sent a verification link to your email.</p>

        @if (session('status') === 'verification-link-sent')
            <div class="success-message">
                A new verification link has been sent to your email.
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit">Resend Verification Email</button>
        </form>
    </div>

    <script>
    setInterval(async () => {
        const response = await fetch('/api/user', {
            headers: { 'Accept': 'application/json' },
            credentials: 'same-origin'
        });

        if (response.ok) {
            const user = await response.json();
            if (user.email_verified_at) {
                window.location.href = '/dashboard';
            }
        }
    }, 5000);
</script>

</body>
</html>
