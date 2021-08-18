<?php 
include 'db.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>customers</title>
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="./css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./css/table.css">

</head>
<body>
    <header class="navbar navbar-customer" id="cbar">
    <a href="#" class="logo" id="homePage">
           <p class="noselect" style="cursor: pointer;"><i class='bx bxs-bank' ></i> TSF BANK <i class='bx bxs-bank' ></i></p> 
        </a>
        <ul class="item">
            <li><a href="index.php"><i class='bx bxs-home'></i> Home</a></li>
            <li><a href="transactionHistory.php"><i class='bx bx-history'></i> Transaction</a></li>
        </ul>
    </header>
    <h1>Record of Customers</h1>
    <div>
        <table class="main-table">
            <thead>
                <tr>
                    <th>Ac. No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Current Balance</th>
                    <th>Transfer</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $selectquery = "select * from customers";
                $query = mysqli_query($con, $selectquery);
                $rownum = mysqli_num_rows($query);

                while($res = mysqli_fetch_array($query)){
                ?>
                    <tr>
                        <td><?php echo $res['ID'] ?></td>
                        <td><?php echo $res['NAME'] ?></td>
                        <td><?php echo $res['EMAIL'] ?></td>
                        <td><?php echo $res['CB'] ?></td>
                        <td><button class="transferbtn"><a class="btn1" href="transaction.php?ID=<?php echo $res['ID'] ?>"><p>Transfer Money</p></a></button></td>
                    </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
    </div>
    <footer> <i class='bx bx-copyright'></i> TSF-2021 By PARTH PATEL</footer>
    <script>
        document.getElementById("homePage").onclick = function () {
            location.href = "index.php";
        };

        window.addEventListener("scroll", function(){
          var header = document.querySelector("header");
          header.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>
</body>
</html>