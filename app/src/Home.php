<!DOCTYPE html>
<html lang="en" class=" scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <title>Home</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        * {
            font-family: "Poppins", sans-serif;
        }

        /* Change Image here of hero section on other page */
        body {
            background: linear-gradient(to right bottom, rgba(2, 6, 23, 0), rgba(2, 6, 23, 1.0)), url('../src/images/sunset.jpg') center/cover no-repeat fixed;
        }
    </style>
</head>

<body class=" w-full min-h-screen flex flex-col">
    <!-- Nav Area Template -->
    <nav id="navbar" class=" z-50 fixed top-0 left-0 w-full flex flex-row items-center justify-between text-zinc-100">
        <div id="logo-area" class=" flex flex-row gap-2 items-center p-2 font-extrabold text-xl"><i data-lucide="sun" class=" stroke-[3]"></i>Sunset City</div>
        <div id="nav-area">
            <ul class=" menu menu-horizontal flex flex-row items-center">
                <li><a href="Home.php">Home</a></li>
                <li><a href="Profile.php">About Us</a></li>
                <li><a href="Contact.php">Contacts</a></li>
                <li><a href="Reserve.php" class=" btn btn-accent">Reserve Now</a></li>
            </ul>
        </div>
    </nav>
    <!-- Main Content Area -->
    <main>
        <section role="hero" id="hero" class=" h-screen w-full flex flex-col items-center justify-center">
            <div class=" flex flex-col w-full text-zinc-100 items-end p-4">
                <span class=" font-semibold text-2xl">Make your sunsets a little more</span>
                <span class=" font-extrabold text-9xl">SPECIAL</span>
                <span>Where every day ends with a masterpiece. Sunset City Suites: Your haven in the heart of tranquility.</span>
                <button class=" btn btn-accent mt-6" onclick=" location.href = 'Profile.php'">Discover more!</button>
            </div>
        </section>
    </main>
    <!-- Icon CDN # Source: Lucide.dev -->
    <!-- Development version -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <!-- Production version -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();

        navbar = document.getElementById('navbar');
        up = document.getElementById('up');
        window.onscroll = () => {
            if (window.scrollY > 150) {
                navbar.classList.add('bg-slate-950');
                up.classList.remove('hidden');
            } else {
                navbar.classList.remove('bg-slate-950');
                up.classList.add('hidden');
            }
        };
    </script>
</body>

</html>