<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEM INFORMASI FAMILY LAUNDRY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f0f0f0;
            font-family: 'Segoe UI', sans-serif;
            position: relative;
            overflow-x: hidden;
            height: 100vh;
        }

        .wave-bg {
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            overflow: hidden;
        }

        .wave-bg svg {
            position: absolute;
            height: 100%;
            right: -100px;
            transform: scaleX(-1); /* membuat gelombang dari kanan ke kiri */
            opacity: 0.2;
        }

        .login-box {
            position: relative;
            z-index: 1;
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-weight: 700;
        }
    </style>
</head>
<body>

    <!-- Gelombang Background -->
    <div class="wave-bg">
        <svg viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="#007bff" fill-opacity="1" d="M0,160L60,144C120,128,240,96,360,96C480,96,600,128,720,133.3C840,139,960,117,1080,96C1200,75,1320,53,1380,42.7L1440,32L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
        </svg>
    </div>

    <!-- Konten Login -->
    <div class="container">
        <div class="text-center mt-5 mb-4">
            <h2>SISTEM INFORMASI FAMILY LAUNDRY</h2>
        </div>
        <div class="login-box">
            <form action="login.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Log In</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
