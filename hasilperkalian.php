<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perisa's Library</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Poppins:wght@300;400;500;600&family=Montserrat:wght@600;700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --header-bg: linear-gradient(90deg, #4b0f16, #7a1b26);
            --card-bg: #ffffff;
            --text-color: #000000;
        }

        [data-theme="dark"] {
            --body-bg: linear-gradient(135deg, #1a0508, #2c0b0e);
            --header-bg: linear-gradient(90deg, #1a0508, #3d0c11);
            --card-bg: #2d0a0e;
            --text-color: #ffffff;
        }

        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
            transition: all 0.3s ease;
        }

        body {
            margin: 0;
            background: var(--body-bg);
            min-height: 100vh;
            color: var(--text-color);
        }

        header {
            background: var(--header-bg);
            padding: 15px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .logo {
            font-family: 'Playfair Display';
            font-size: 30px;
            font-weight: 700;
            background: linear-gradient(90deg, #f6eee6, #ffb3b3);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        nav {
            display: flex;
            gap: 5px;
            align-items: center;
        }

        nav a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            cursor: pointer;
            font-weight: 500;
            padding: 10px 18px;
            border-radius: 25px;
            transition: all 0.3s ease;
            position: relative;
            font-size: 14px;
        }

        nav a:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.1);
        }

        nav a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 6px;
            left: 50%;
            background: #ff7a7a;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        nav a:hover::after,
        nav a.active-nav::after {
            width: 50%;
        }

        nav a.active-nav {
            color: #ff7a7a;
            background: rgba(255, 255, 255, 0.15);
        }

        .theme-toggle {
            background: #ff7a7a;
            color: #4b0f16;
            border: none;
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
            font-weight: 600;
            margin-left: 10px;
            font-size: 12px;
        }

        section {
            padding: 80px 12%;
            display: none;
            animation: fadeInSec 0.5s ease;
        }

        .active {
            display: block;
        }

        @keyframes fadeInSec {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            background: var(--card-bg);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn {
            background: #ff7a7a;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
            font-weight: bold;
            margin-bottom: 15px;
        }

        #output {
            max-height: 300px;
            overflow-y: auto;
            font-size: 14px;
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

        body {
            margin: 0;
            font-family: Poppins, sans-serif;
            background: linear-gradient(135deg, #1a0508, #2c0b0e);
            color: white;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: #2d0a0e;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            text-align: center;
            width: 350px;
            animation: fadeIn 0.5s ease;
        }

        .title {
            font-family: 'Playfair Display';
            margin-bottom: 20px;
            background: linear-gradient(90deg, #f6eee6, #ffb3b3);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .result {
            font-size: 20px;
            font-weight: 600;
            background: #1a0508;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .btn-kembali {
            background: #ff7a7a;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: bold;
            color: #4b0f16;
            transition: 0.3s;
        }

        .btn-kembali:hover {
            transform: scale(1.05);
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

        .feedback-box {
            max-width: 500px;
            margin: auto;
            background: var(--card-bg);
            padding: 35px;
            border-radius: 25px;
            color: var(--text-color);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        .feedback-box input,
        .feedback-box textarea {
            width: 100%;
            margin: 12px 0;
            padding: 14px;
            border-radius: 14px;
            border: 1px solid #ddd;
            outline: none;
        }

        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(75, 15, 22, 0.7);
            backdrop-filter: blur(10px);
            justify-content: center;
            align-items: center;
            z-index: 2000;
        }

        .modal-box {
            background: var(--card-bg);
            padding: 40px;
            border-radius: 30px;
            width: 90%;
            max-width: 400px;
            position: relative;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .switch-form {
            margin-top: 15px;
            font-size: 13px;
            color: var(--text-color);
        }

        .switch-form span {
            color: #7a1b26;
            cursor: pointer;
            font-weight: 600;
            text-decoration: underline;
        }

        [data-theme="dark"] .switch-form span {
            color: #ff7a7a;
        }
    </style>
</head>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $a = $_POST['angka1'];
    $b = $_POST['angka2'];
    $op = $_POST['operasi'];

    switch ($op) {
        case "tambah":
            $hasil = $a + $b;
            $simbol = "+";
            break;

        case "kali":
            $hasil = $a * $b;
            $simbol = "×";
            break;

        case "bagi":
            if ($b == 0) {
                $hasil = "Tidak bisa dibagi 0!";
            } else {
                $hasil = $a / $b;
            }
            $simbol = "÷";
            break;

        case "kurang":
            $hasil = $a - $b;
            $simbol = "-";
            break;

        default:
            $hasil = "Operasi tidak valid";
            $simbol = "?";
    }
}

?>

<body>

    <header>
        <div class="logo">Perisa's Library</div>
        <nav>
            <a href="index.html" class="active-nav">Home</a>
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
            <a href="login.php" style="background: #ff7a7a; color: #4b0f16; border-radius: 20px;">Login</a>
            <button class="theme-toggle" onclick="toggleTheme()" id="themeBtn">Dark Mode</button>
        </nav>
    </header>

    <body>

        <div class="container">
            <div class="card">

                <h2 class="title">Hasil Perhitungan</h2>

                <p class="result">
                    <?php
                    if (is_numeric($hasil)) {
                        echo "$a $simbol $b = $hasil";
                    } else {
                        echo $hasil;
                    }
                    ?>
                </p>

                <a href="perkalian.php">
                    <button class="btn-kembali">← Kembali</button>
                </a>

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


            function toggleModalMode(mode) {
                const title = document.getElementById('formTitle');
                const loginFields = document.getElementById('loginFields');
                const regFields = document.getElementById('registerFields');
                const mainBtn = document.getElementById('mainBtn');
                const switchText = document.getElementById('switchText');
            }
        </script>

    </body>

</html>