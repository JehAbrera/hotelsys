<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <title>Reservation</title>
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
            </ul>
        </div>
    </nav>
    <main>
        <?php
        date_default_timezone_set('Asia/Manila');
        ?>
        <section class=" flex flex-row justify-evenly items-center h-screen">
            <?php if (!isset($_GET['step']) || $_GET['step'] != "overview") { ?>
                <form action="Controller.php" method="post" class=" flex flex-col max-h-[90vh] w-2/5 bg-zinc-100 gap-1 rounded-xl p-4 items-stretch overflow-auto">
                    <?php if (isset($_SESSION['data']['error'])) { ?>
                        <div role="alert" class="alert alert-error p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span><?= $_SESSION['data']['error'] ?></span>
                        </div>
                    <?php unset($_SESSION['data']['error']);
                    } ?>
                    <span class=" self-center font-bold text-2xl border-b-2 border-b-slate-950 mb-2">Reservation Details</span>
                    <input class=" badge badge-primary badge-outline" type="text" name="datetime" value="<?= date('F d, Y - h:i a') ?>" readonly>
                    <span class=" mb-2">Customer:</span>
                    <div class=" grid grid-cols-2 gap-2">
                        <label class="input input-bordered flex items-center gap-2">
                            Name:
                            <input type="text" name="name" placeholder="Juan Dela Cruz" class=" overflow-hidden" required />
                        </label>
                        <label class="input input-bordered flex items-center gap-2">
                            Contact:
                            <input type="text" name="contact" inputmode="numeric" placeholder="0912-345-6789" class=" overflow-hidden" required />
                        </label>
                    </div>
                    <span class=" mb-2">Date:</span>
                    <div class=" grid grid-cols-2 gap-2">
                        <label class="input input-bordered flex items-center gap-2">
                            From:
                            <input type="date" name="dateFrom" class="grow" required />
                        </label>
                        <label class="input input-bordered flex items-center gap-2">
                            To:
                            <input type="date" name="dateTo" class="grow" required />
                        </label>
                    </div>
                    <span class=" mb-2">Room & Payment:</span>
                    <div class=" grid grid-cols-2 gap-2">
                        <label class="form-control w-full max-w-xs">
                            <div class="label">
                                <span class="label-text">Room Type</span>
                            </div>
                            <select name="rType" class="select select-bordered" required>
                                <option value="" disabled selected hidden>Select</option>
                                <option value="Suite">Suite</option>
                                <option value="Deluxe">Deluxe</option>
                                <option value="Luxury">Luxury</option>
                            </select>
                        </label>
                        <label class="form-control w-full max-w-xs">
                            <div class="label">
                                <span class="label-text">Capacity</span>
                            </div>
                            <select name="rCap" class="select select-bordered" required>
                                <option value="" disabled selected hidden>Select</option>
                                <option value="Family">Family</option>
                                <option value="Double">Double</option>
                                <option value="Single">Single</option>
                            </select>
                        </label>
                    </div>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Payment Type</span>
                        </div>
                        <select name="payment" class="select select-bordered" required>
                            <option value="" disabled selected hidden>Select</option>
                            <option value="Cash">Cash</option>
                            <option value="Cheque">Cheque</option>
                            <option value="Credit Card">Credit Card</option>
                        </select>
                    </label>
                    <div class=" flex justify-end gap-4 mt-2">
                        <label for="clear" class="btn btn-outline btn-error">Reset</label>
                        <input type="checkbox" id="clear" class="modal-toggle" />
                        <div class="modal" role="dialog">
                            <div class="modal-box">
                                <h3 class="font-bold text-lg">Reset Form?</h3>
                                <p class="py-4">This will undo all changes made.</p>
                                <div class="modal-action">
                                    <label for="clear" class="btn btn-outline btn-error">No</label>
                                    <button type="reset" class=" btn btn-success">Yes</button>
                                </div>
                            </div>
                        </div>
                        <label for="confirm" class="btn btn-success">Submit</label>
                        <input type="checkbox" id="confirm" class="modal-toggle" />
                        <div class="modal" role="dialog">
                            <div class="modal-box">
                                <h3 class="font-bold text-lg">Submit Form?</h3>
                                <p class="py-4">Save changes and submit your reservation.</p>
                                <div class="modal-action">
                                    <label for="confirm" class="btn btn-outline btn-error">No</label>
                                    <button type="submit" name="submit" value="reserve" class=" btn btn-success">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class=" w-2/5 flex flex-col text-zinc-100 items-end">
                    <span class=" font-extrabold text-6xl">Book with us!</span>
                    <span class=" text-balance text-right">Get one step closer to achieving your dream vacation and ever mesmerizing sunset views, Sunset City Suites got your back.</span>
                </div>
            <?php } else { ?>
                <div class=" w-3/5 h-[90%] flex flex-col items-stretch gap-1 rounded-xl p-4 bg-zinc-100 overflow-auto">
                    <div role="alert" class="alert alert-success text-sm p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>For cash payments. Enjoy 10% discount for 3-5 days stay and 15% discount for 6 days or greater stay.</span>
                    </div>
                    <span class=" font-bold text-2xl p-2 border-b-2 text-center">Sunset City: Billing Information</span>
                    <div class=" grid grid-cols-2 h-full gap-2">
                        <div class=" flex flex-col items-stretch">
                            <div class=" flex flex-col">
                                <div class="badge badge-primary badge-outline my-4">Customer Info</div>
                                <span class=" flex justify-between"><strong>Name: </strong><?= $_SESSION['data']['name'] ?></span>
                                <span class=" flex justify-between"><strong>Contact: </strong><?= $_SESSION['data']['phone'] ?></span>
                                <span class=" flex justify-between"><strong>Inquiry Date: </strong><?= $_SESSION['data']['date'] ?></span>
                                <span class=" flex justify-between"><strong>Time: </strong><?= $_SESSION['data']['time'] ?></span>
                            </div>
                            <div>
                                <div class="badge badge-primary badge-outline my-4">Reservation Details</div>
                                <div class=" flex justify-between">
                                    <span><strong>From: </strong><?= date('F d, Y', strtotime($_SESSION['data']['from'])) ?></span>
                                    <span><strong>To: </strong><?= date('F d, Y', strtotime($_SESSION['data']['to'])) ?></span>
                                </div>
                                <span class=" flex justify-between"><strong>Room Type: </strong><?= $_SESSION['data']['room'] ?></span>
                                <span class=" flex justify-between"><strong>Room Capacity: </strong><?= $_SESSION['data']['cap'] ?></span>
                                <span class=" flex justify-between"><strong>Payment Mode: </strong><?= $_SESSION['data']['payment'] ?></span>
                            </div>
                            <div>
                                <div class="badge badge-primary badge-outline my-4">Billing Statement</div>
                                <span class=" flex justify-between"><strong>Number of Days: </strong><?= $_SESSION['data']['days'] ?></span>
                                <span class=" flex justify-between"><strong>Subtotal: </strong><?= number_format($_SESSION['data']['sub'], 2, ".", ",") ?></span>
                                <span class=" flex justify-between"><strong>Discount: </strong><?= number_format($_SESSION['data']['disc'], 2, ".", ",") ?></span>
                                <span class=" flex justify-between"><strong>Additional Charge: </strong><?= number_format($_SESSION['data']['add'], 2, ".", ",") ?></span>
                                <span class=" flex justify-between p-1 text-error outline-dashed outline-1 outline-slate-950"><strong>Total Amount: </strong><?= number_format($_SESSION['data']['total'], 2, ".", ",") ?></span>
                            </div>
                        </div>
                        <div>
                            <div class=" outline outline-1 outline-slate-950 p-2 flex flex-col h-full justify-between rounded-lg">
                                <p class=" text-justify">The following information is your reservation inquiry for Sunset City Suites. By clicking <strong class=" text-success">Confirm</strong>, you ensure that all given information is correct and your inquiry is subject for approval. By clicking <strong class=" text-error">Cancel</strong>, this request will be voided and you will be redirected back to the reservation form.</p>
                                <form action="Controller.php" method="post" class=" flex justify-end gap-4">
                                    <button onclick="location.href='?'" type="button" class=" btn btn-outline btn-error">Cancel</button>
                                    <button type="submit" name="save" class=" btn btn-success">Confirm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
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