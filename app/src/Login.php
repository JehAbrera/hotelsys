<?php 
session_start();
if (isset($_SESSION['isLogged'])) {
    unset($_SESSION['isLogged']);
}
?>
<!DOCTYPE html>
<html lang="en" class=" scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        * {
            font-family: "Poppins", sans-serif;
        }

        /* Change Image here of hero section on other page */
        body {
            background: linear-gradient(to right bottom, rgba(2, 6, 23, 0), rgba(2, 6, 23, 1.0)), url('../src/images/sunset.jpg') center/cover no-repeat;
        }
    </style>
</head>

<body class=" w-full min-h-screen flex flex-col">
    <!-- Main Content Area -->
    <main class=" w-full flex items-center justify-center">
        <div class="hero min-h-screen w-4/5">
            <div class="hero-content flex-col lg:flex-row-reverse w-1/2">
                <div class="card w-full max-w-sm shadow-2xl bg-base-100">
                    <form class="card-body" method="post" action="Controller.php">
                        <?php
                        if (isset($_SESSION['data']['error'])) { ?>
                            <div role="alert" class="alert alert-error p-2 text-sm">
                                <span data-lucide="X"></span>
                                <span><?= $_SESSION['data']['error'] ?></span>
                            </div>
                        <?php unset($_SESSION['data']['error']);}
                        ?>
                        <span class=" form-control text-xl font-semibold">Admin Login</span>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Username</span>
                            </label>
                            <input type="text" placeholder="username" name="username" class="input input-bordered" required />
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Password</span>
                            </label>
                            <input type="password" placeholder="password" name="password" class="input input-bordered" required />
                            <label class="label">
                                <a href="#" class="label-text-alt link link-hover">Forgot password?</a>
                            </label>
                        </div>
                        <div class="form-control mt-6">
                            <button class="btn btn-primary" type="submit" name="submit" value="login">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- Icon CDN # Source: Lucide.dev -->
    <!-- Development version -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <!-- Production version -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();

        navbar = document.getElementById('navbar');
        window.onscroll = () => {
            if (window.scrollY > 150) {
                navbar.classList.add('bg-slate-950');
            } else {
                navbar.classList.remove('bg-slate-950');
            }
        };
    </script>
</body>

</html>