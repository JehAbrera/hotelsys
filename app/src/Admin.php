<?php
session_start();

if (!isset($_SESSION['isLogged'])) {
    header('Location: Login.php');
}
?>
<!DOCTYPE html>
<html lang="en" class=" scroll-smooth" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <title>Admin</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        * {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>

<body class=" flex flex-col w-full min-h-screen">
    <header class=" w-full p-2 flex justify-end sticky">
        <button type="button" class=" btn btn-error" onclick="location.href = 'Login.php'">Logout&nbsp;<i data-lucide="log-out"></i></button>
    </header>
    <main class=" w-full flex flex-col items-center gap-4">
        <div class=" w-3/5">
            <form action="Controller.php" method="post" class=" w-full join grid grid-cols-3">
                <button type="submit" name="page" value="Pending" class="btn btn-warning btn-outline join-item">Pending</button>
                <button type="submit" name="page" value="Accepted" class="btn btn-success btn-outline join-item">Accepted</button>
                <button type="submit" name="page" value="Rejected" class="btn btn-error btn-outline join-item">Rejected</button>
            </form>
        </div>
        <div class=" flex justify-between w-3/5">
            <div class=" font-semibold text-xl">
                <?php
                if (isset($_SESSION['page'])) {
                    echo $_SESSION['page'];
                } else {
                    echo "Pending";
                }
                ?>
            </div>
            <div>
                <form action="Controller.php" method="post">
                    <div class="join">
                        <div>
                            <div>
                                <input class="input input-bordered join-item" name="name" placeholder="Search Name" />
                            </div>
                        </div>
                        <div class="indicator">
                            <button type="submit" name="find" class="btn btn-primary join-item">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <table class=" w-3/5 table table-zebra outline">
            <thead>
                <tr>
                    <th>Reservee</th>
                    <th>Inquiry Date</th>
                    <th>Reservation Date</th>
                    <th>Checkout Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <?php if (isset($_SESSION['nodata']) && !isset($_SESSION['view'])) { ?>
                <tr>
                    <td colspan="5" class=" text-center"><?= $_SESSION['nodata'] ?></td>
                </tr>
                <?php } else {
                $page = $_SESSION['page'];
                foreach ($_SESSION['view'] as $value) { ?>
                    <tr>
                        <td><?= $value[1] ?></td>
                        <td><?= $value[3] ?></td>
                        <td><?= date('F d, Y', strtotime($value[5])) ?></td>
                        <td><?= date('F d, Y', strtotime($value[6])) ?></td>
                        <td>
                            <label class=" cursor-pointer btn btn-primary" for="modal<?= $value[0] ?>">View</label>
                            <input type="checkbox" id="modal<?= $value[0] ?>" class="modal-toggle" />
                            <div class="modal" role="dialog">
                                <div class="modal-box">
                                    <h3 class="font-bold text-lg text-center">Reservation Details</h3>
                                    <div class=" grid grid-cols-2 gap-4">
                                        <div class=" flex flex-col gap-2">
                                            <span class=" text-xl font-bold">Customer Information</span>
                                            <span>Name: <strong><?= $value[1] ?></strong></span>
                                            <span>Start: <strong><?= date('F d, Y', strtotime($value[5])) ?></strong></span>
                                            <span>End: <strong><?= date('F d, Y', strtotime($value[6])) ?></strong></span>
                                            <span>Room: <strong><?= $value[7] . " - " . $value[8] ?></strong></span>
                                            <span>Duration: <strong><?= $value[10] ?></strong></span>
                                        </div>
                                        <div class=" flex flex-col gap-2">
                                            <span class=" text-xl font-bold">Billing Information</span>
                                            <span>MOP: <strong><?= $value[9] ?></strong></span>
                                            <span>Subtotal: <strong><?= $value[11] ?></strong></span>
                                            <span>Discount: <strong><?= $value[12] ?></strong></span>
                                            <span>Additional: <strong><?= $value[13] ?></strong></span>
                                            <span class=" block p-1 bg-success text-zinc-100">Total: <strong><?= $value[14] ?></strong></span>
                                        </div>
                                    </div>
                                    <div class="modal-action">
                                        <label for="modal<?= $value[0] ?>" class="btn">Close!</label>
                                        <form action="Controller.php" method="post">
                                            <input type="hidden" name="valueId" value="<?= $value[0] ?>">
                                            <?php
                                            if ($page == "Pending") { ?>
                                                <button type="submit" name="update" value="Rejected" class=" btn btn-error">Reject</button>
                                                <button type="submit" name="update" value="Accepted" class=" btn btn-success">Accept</button>
                                            <?php } else { ?>
                                                <button type="submit" name="update" value="Delete" class=" btn btn-error">Delete</button>
                                            <?php } ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
            <?php }
            } ?>
        </table>
    </main>
    <!-- Icon CDN # Source: Lucide.dev -->
    <!-- Development version -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <!-- Production version -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
</body>

</html>