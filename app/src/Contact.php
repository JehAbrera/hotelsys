<!DOCTYPE html>
<html lang="en" class=" scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <title>Contact</title>
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
            <div class=" w-4/5 h-3/5 grid grid-cols-2 text-slate-950">
                <div class=" flex justify-center items-center order-2">
                    <img src="../src/images/person.png" alt="image" class=" w-4/5">
                </div>
                <div class=" flex flex-col items-center justify-between bg-zinc-100 rounded-xl p-4">
                    <div class=" flex flex-col w-full items-center">
                        <span class=" font-bold text-2xl border-b-2 border-b-slate-950 w-full text-center">Contact Us!</span>
                        <span class=" chat-header">We'd like to hear from you.</span>
                    </div>
                    <div class=" flex flex-col w-full mockup-code bg-white text-slate-950 p-4">
                        <pre><span>Call us: 0912-345-6789</span></pre>
                        <div class=" divider">or</div>
                        <pre><span>Email us: sample_mail@gmail.com</span></pre>
                    </div>
                    <div class=" w-full flex flex-col items-center">
                        <span class=" divider">Get the latest news</span>
                        <div class="join">
                            <input class="input input-bordered join-item rounded-full" placeholder="Email" />
                            <button class="btn btn-primary join-item rounded-r-full">Subscribe</button>
                        </div>
                    </div>
                </div>
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