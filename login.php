<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perisa's Library</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --header-bg: linear-gradient(90deg, #4b0f16, #7a1b26);
            --card-bg: #ffffff;
            --text-color: #000000;
            --body-bg: linear-gradient(135deg, #1a0508, #2c0b0e);
        }

        [data-theme="dark"] {
            --header-bg: linear-gradient(90deg, #1a0508, #3d0c11);
            --card-bg: #2d0a0e;
            --text-color: #ffffff;
            --body-bg: linear-gradient(135deg, #0f0203, #1a0508);
        }

        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            transition: 0.3s ease;
        }

        body {
            margin: 0;
            background: var(--body-bg);
            color: var(--text-color);
            min-height: 100vh;
        }

        header {
            background: var(--header-bg);
            padding: 15px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .logo {
            font-size: 26px;
            font-weight: bold;
            color: white;
        }

        nav {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 20px;
            font-size: 14px;
        }

        nav a:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .theme-toggle {
            background: #ff7a7a;
            border: none;
            padding: 6px 12px;
            border-radius: 20px;
            cursor: pointer;
            font-weight: bold;
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 90px;
        }

        .card {
            width: 380px;
            border-radius: 20px;
            padding: 25px;
            background: var(--card-bg);
            color: var(--text-color);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
        }

        .title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
            color: var(--text-color);
        }

        .btn-custom {
            background: #4b0f16;
            color: white;
            font-weight: bold;
            border-radius: 25px;
        }

        .btn-custom:hover {
            background: #ff7a7a;
            color: black;
        }

        [data-theme="dark"] input {
            background: #1a0508;
            border: 1px solid #444;
            color: white;
        }

        [data-theme="dark"] input::placeholder {
            color: #aaa;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropbtn {
            padding: 10px 15px;
            background: none;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background: #f1f1f1;
            min-width: 150px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .dropdown-content a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: black;
        }

        .dropdown-content a:hover {
            background: #ddd;
            color: #4b0f16;
        }
    </style>
</head>

<body>

    <header>
        <div class="logo">Perisa's Library</div>

        <nav>
            <a href="index.html">Home</a>
            <a href="index.html">Profile</a>
            <a href="index.html">Event</a>
            <a href="index.html">Media</a>
            <a href="index.html">Admin</a>
            <a href="index.html">Contact</a>

            <div class="dropdown">
                <button class="dropbtn" onclick="toggleMenu()">Menu ▼</button>

                <div class="dropdown-content" id="menu">
                    <a href="pengulangan.php">Pengulangan</a>
                    <a href="perkalian.php">perkalian</a>
                </div>
            </div>

            <button class="theme-toggle" onclick="toggleTheme()" id="themeBtn">
                Dark Mode
            </button>
        </nav>
    </header>
    <div class="login-wrapper">

        <div class="card">

            <h3 class="title">Login</h3>

            <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger text-center">
                    <?= $_SESSION['error'];
                    unset($_SESSION['error']); ?>
                </div>
            <?php } ?>

            <?php if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success text-center">
                    <?= $_SESSION['success'];
                    unset($_SESSION['success']); ?>
                </div>
            <?php } ?>

            <form action="proses_login.php" method="POST">

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan email">
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password">
                </div>

                <button type="submit" class="btn btn-custom w-100">Login</button>

            </form>

            <div class="text-center mt-3">
                Belum punya akun? <a href="register.php">Daftar</a>
            </div>

        </div>

    </div>

    <script>
        function toggleTheme() {
            const body = document.body;
            const btn = document.getElementById('themeBtn');

            if (body.getAttribute('data-theme') === 'dark') {
                body.removeAttribute('data-theme');
                btn.innerText = "Dark";
            } else {
                body.setAttribute('data-theme', 'dark');
                btn.innerText = "Light";
            }
        }

        function toggleMenu() {
            var menu = document.getElementById("menu");
            menu.style.display = (menu.style.display === "block") ? "none" : "block";
        }
    </script>

</body>

</html>