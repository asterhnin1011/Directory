<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Verification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            background-color: #fff;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            max-width: 500px;
            width: 100%;
            text-align: center;
        }

        h1 {
            margin-bottom: 1rem;
            font-size: 1.8rem;
            color: #222;
        }

        p {
            font-size: 1rem;
            margin-bottom: 2rem;
        }

        button {
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            background: #4facfe;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #00c6ff;
        }

        .success-message {
            color: green;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .error-message {
            color: red;
            font-weight: bold;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

    <div class="card">
        <h1>Verify Your Email Address</h1>

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

</body>
</html>
