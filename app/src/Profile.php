<!DOCTYPE html>
<html lang="en" class=" scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <title>Profile</title>
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
        <section class=" w-full h-screen flex flex-col items-center justify-center gap-4 text-zinc-100">
            <span class=" font-bold text-4xl">Multi-Awarded</span>
            <span class=" font-extrabold text-8xl">Luxurious</span>
            <span class=" font-bold text-4xl">Vibrant</span>
            <div class="stats shadow w-3/5">
                <div class="stat">
                    <div class="stat-figure text-secondary">
                        <span data-lucide="footprints" class="inline-block w-8 h-8 stroke-current"></span>
                    </div>
                    <div class="stat-title">Visitors</div>
                    <div class="stat-value">10k</div>
                    <div class="stat-desc">Jan 1st - Feb 1st</div>
                </div>

                <div class="stat">
                    <div class="stat-figure text-secondary">
                        <span data-lucide="star" class="inline-block w-8 h-8 stroke-current"></span>
                    </div>
                    <div class="stat-title">Customer Rating</div>
                    <div class="stat-value">5</div>
                    <div class="stat-desc">↗︎ 5k Reviews</div>
                </div>

                <div class="stat">
                    <div class="stat-figure text-secondary">
                        <span data-lucide="book-open-check" class="inline-block w-8 h-8 stroke-current"></span>
                    </div>
                    <div class="stat-title">New Reservations</div>
                    <div class="stat-value">1,200</div>
                    <div class="stat-desc">↗︎ 90 (14%)</div>
                </div>

            </div>
            <button type="button" class=" btn btn-success" onclick=" location.href='Reserve.php'">Experience us now!</button>
        </section>
        <section role="hero" id="hero" class=" h-screen w-full flex flex-col items-center justify-center">
            <div class=" grid grid-cols-2 gap-2 p-4 w-full">
                <div class=" w-full stack">
                    <img class="mask mask-squircle w-3/5 aspect-square" src="../src/images/happy.jpg" />
                </div>
                <div class=" flex flex-col items-center justify-center gap-4">
                    <span class=" p-1 mb-3 text-center text-2xl font-bold border-b-2 border-b-zinc-100 text-zinc-100">Get to know us!</span>
                    <p class=" text-justify text-zinc-100">
                        Sunset City Suites stands as a beacon of excellence among hotels, renowned for its impeccable service and top-notch accommodations. Boasting a stellar reputation, it consistently garners high ratings from guests who praise its commitment to hospitality. Nestled in the heart of the city, Sunset City Suites offers a luxurious retreat adorned with modern amenities to ensure an unforgettable stay. Guests are treated to a refreshing escape with a sparkling pool, perfect for unwinding after a day of exploration or business meetings. The hotel's stylish bar beckons with its chic ambiance, offering an array of cocktails and beverages to complement every palate. With a dedication to exceeding expectations, Sunset City Suites embodies the epitome of hospitality, promising an unparalleled experience for every visitor. </p>
                    <button type="button" onclick="location.href = 'Contact.php'" class=" btn btn-success self-end">Reach us out</button>
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