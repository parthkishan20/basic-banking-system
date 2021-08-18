<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="./css/responsive.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./css/table.css">
</head>

<body>
    <header class="navbar navbar-customer" id="thbar">
        <div class="logo" id="homePage">
            <p class="noselect" style="cursor: pointer;"><i class='bx bxs-bank'></i> TSF Bank <i class='bx bxs-bank'></i></p>
        </div>
        <div>
            <ul class="item">
                <li><a href="index.php"><i class='bx bxs-home'></i> Home</a></li>
                <li><a href="customers.php"><i class='bx bxs-group'></i> View Customers</a></li>
            </ul>
        </div>
    </header>
    <h1>Transaction History</h1>
    <div>
        <table class="main-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sender</th>
                    <th>Receiver</th>
                    <th>Amount</th>
                    <th>Date and Time</th>
                </tr>
            </thead>
            <tbody>
                <?php


                $selectquery = "select * from transaction";
                $query = mysqli_query($con, $selectquery);
                $rownum = mysqli_num_rows($query);

                while ($res = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?php echo $res['ID'] ?></td>
                        <td><?php echo $res['SENDER'] ?></td>
                        <td><?php echo $res['RECEIVER'] ?></td>
                        <td><?php echo $res['AMOUNT'] ?></td>
                        <td><?php echo $res['DATE-TIME'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        document.getElementById("homePage").onclick = function() {
            location.href = "index.php";
        };

        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>
</body>

</html>