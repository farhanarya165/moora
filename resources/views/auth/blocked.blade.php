<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Akses Diblokir</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts + Animasi -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: #1a1a1a;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            text-align: center;
            flex-direction: column;
        }

        .error-icon {
            font-size: 80px;
            color: #ff4d4d;
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.1);
                opacity: 0.6;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .title {
            font-size: 28px;
            margin: 20px 0 10px;
            font-weight: bold;
        }

        .subtitle {
            font-size: 18px;
            color: #cccccc;
        }

        .timer {
            margin-top: 20px;
            font-size: 20px;
            font-weight: bold;
            color: #ffcc00;
        }
    </style>
</head>

<body>
    <div class="error-icon">🚫</div>
    <div class="title">Akses Diblokir Sementara</div>
    <div class="subtitle">Terlalu banyak percobaan login gagal.</div>
    <div class="timer">
        Silakan coba lagi dalam <span id="countdown">{{ $seconds }}</span> detik.
    </div>

    <script>
        // Countdown animasi
        let seconds = {
            {
                $seconds
            }
        };
        const countdown = document.getElementById('countdown');
        const interval = setInterval(() => {
            seconds--;
            countdown.textContent = seconds;
            if (seconds <= 0) {
                clearInterval(interval);
                window.location.reload();
            }
        }, 1000);
    </script>
</body>

</html>