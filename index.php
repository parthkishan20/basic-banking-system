

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TSF Bank</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="./css/responsive.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Overpass:wght@300;400;600;700&display=swap" rel="stylesheet">

</head>
<body>

<header  class="navbar">
        <div class="logo" id="homePage">
            <!-- logo -->
            <p class="noselect" style="cursor: pointer;"><i class='bx bxs-bank' ></i> TSF Bank <i class='bx bxs-bank' ></i></p>
        </div>
        <div>
            <ul class="item">
                <li><a href="#homePage"><i class='bx bxs-home'></i> Home</a></li>
                <li><a href="#services"><i class='bx bx-cog'></i> Services</a></li>
                <li><a href="customers.php"><i class='bx bxs-group'></i> Customers</a></li>
                <li><a href="transactionHistory.php"><i class='bx bx-history'></i> Transaction History</a></li>
            </ul>
        </div>
    </header>
    <section class="main" id="home">
    <div class="content">
        <h1>
            Welcome To The TSF Multi-National Bank 
        </h1>
        <div class="aboutcontent">
        <p>An Online Bank Managment System where One can easily transfer money, One can check their Transaction History and also One can check their Current Balanace</p>
        <button class="btn" id="customers"><i class='bx bxs-user'></i> View All Customers</button>
    </div>
      </div>
</section> <div class="image">
        </div>
    </section>
    <section id="services">
        <h3>Our Services</h3>
        <div class="card">
            <div class="card_content">
                <img src="./images/people.png" alt="">
                <button id="customersPage" class="btn">Our Customers</button>
            </div>
            <div class="card_content">
                <img src="./images/transaction.png" alt="">
                <button class="btn" id="transactionPage">Our Transaction Logs</button>
            </div>
        </div>
    </section>
    <footer> <i class='bx bx-copyright'></i> TSF-2021 By PARTH PATEL</footer>
    <script type="text/javascript">
        document.getElementById("customers").onclick = function () {
            location.href = "customers.php";
        };
        document.getElementById("customersPage").onclick = function () {
            location.href = "customers.php";
        };
        document.getElementById("transactionPage").onclick = function () {
            location.href = "transactionHistory.php";
        };
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