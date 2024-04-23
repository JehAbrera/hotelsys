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
                <button class=" btn btn-accent mt-6" onclick=" location.href = '#article'">Discover more!</button>
            </div>
        </section>
        <section id="article" class=" w-full flex flex-row p-4 justify-evenly h-screen border-y-2 border-y-zinc-100">
            <div class=" flex-1 flex items-center justify-center">
                <img src="../src/images/happy.jpg" class=" mask mask-squircle aspect-square w-3/5" alt="photo">
            </div>
            <div class=" flex-1 flex items-center justify-center indent-4 flex-col gap-4 text-wrap text-zinc-100">
                <p class=" text-justify">
                    Immersed in the serene ambiance of Sunset City Suites, happiness finds its perfect haven. From the moment you step into our sanctuary of comfort, every detail is crafted to elevate your spirits and soothe your soul. With breathtaking sunsets painting the sky and luxurious amenities at your fingertips, find your bliss and embrace the joy of living at Sunset City Suites.
                </p>
                <button onclick="location.href='Profile.php'" class=" btn btn-accent text-slate-950">About Us</button>
            </div>
        </section>
        <section class=" flex flex-row h-screen items-center">
            <div class=" flex w-full justify-evenly items-stretch">
                <div class="card w-96 bg-base-100 shadow-xl">
                    <figure><img src="../src/images/reception.jpg" alt="photo" /></figure>
                    <div class="card-body">
                        <h2 class="card-title">Book with us now!</h2>
                        <p>Let's begin your journey to comfort.</p>
                        <div class="card-actions justify-end">
                            <button onclick="location.href='Reserve.php'" class="btn btn-primary">Reserve Now</button>
                        </div>
                    </div>
                </div>
                <div class="card w-96 bg-base-100 shadow-xl">
                    <figure><img src="../src/images/contact.jpg" alt="photo" /></figure>
                    <div class="card-body">
                        <h2 class="card-title">Get in touch!</h2>
                        <p>Have questions? Learn how to reach out to us.</p>
                        <div class="card-actions justify-end">
                            <button onclick="location.href='Contact.php'" class="btn btn-primary">Contact Us</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <button id="up" class=" hidden group fixed bottom-6 right-6 btn bg-slate-950 text-zinc-100" onclick="location.href='#hero'">
            <i data-lucide="arrow-up" class=" group-hover:text-slate-950"></i>
        </button>
    </main>
    <!--Footer-->
    <footer class=" footer bg-slate-950 text-zinc-100">
        <div></div>
        <span class=" flex flex-row"><i data-lucide="copyright"></i>All rights reserved.</span>
    </footer>
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