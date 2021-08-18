<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="./css/responsive.css">

    <title>Transaction</title>
    <link rel="stylesheet" href="./css/transaction.css">
    <link rel="stylesheet" href="./css/table.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

</head>

<body>
    <header class="navbar navbar-customer" id="tbar">
        <div class="logo" id="homePage">
            <!-- logo -->
            <p class="noselect" style="cursor: pointer;"><i class='bx bxs-bank'></i> TSF Bank <i class='bx bxs-bank'></i></p>
        </div>
        <div>
            <ul class="item">
                <li><a href="index.php"><i class='bx bxs-home'></i> Home</a></li>
                <li><a href="transactionHistory.php"><i class='bx bx-history'></i> Transaction history</a></li>
            </ul>
        </div>
    </header>
    <div class="mainSection">
        <h2><i class='bx bxs-detail'></i> Transaction Details</h2>
        <form action="" method="post">
            <?php
            global $sender;
            $customerId = $_GET['ID'];
            $selectquery = "SELECT * FROM customers WHERE ID = '$customerId'";
            $showdata = mysqli_query($con, $selectquery);
            if ($bool = mysqli_fetch_array($showdata)) {
                // echo $bool['Name'];
                $money = $bool['CB'];
                $sender = $bool['NAME'];
            }
            ?> <table class="table">
                <tr>
                    <td>
                        <p class="form-field">Transfer From:</p>
                    </td>
                    <td>
                        <?php echo $sender . '(' . $bool['CB'] . ')'; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="form-field">Transfer To: </p>
                    </td>
                    <td>
                        <select name="customers" id="customerlist" class="input">

                            <?php
                            $selectquery = "SELECT NAME,CB FROM customers WHERE NOT ID = '$customerId'";
                            $showdata = mysqli_query($con, $selectquery);

                            while ($transferTo = mysqli_fetch_array($showdata)) {
                            ?>
                                <option value="<?php echo $transferTo['NAME']; ?>"><?php echo $transferTo['NAME'] . '(' . $transferTo['CB'] . ')'; ?></option>
                            <?php
                            }
                            global $getMax;
                            // $getMaxQuery = mysqli_query($con, "SELECT `CB` FROM `customers` WHERE `Name` = '$receiver'");
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="form-field">Enter Amount:<i class='bx bx-dollar'></i> </p>
                    </td>
                    <td>
                        <input type="number" name="amount" id="amt" placeholder="Enter amount " class="input" required min="1" max=<?php echo "$money"; ?>>
                    </td>
                </tr>
            </table>
            <button type="submit" class="btn"><i class='bx bx-transfer'></i> Transfer</button>

        </form>
        <?php
        global $update;
        global $receiver;
        if (!empty($_POST['amount'])) {
            $transfer = $_POST['amount'];
            // $add = $_POST['amount'];
            $amount = $money - $transfer;
            $receiver = $_POST['customers'];
            //get money
            $getMoneyQuery = "SELECT `CB` FROM `customers` WHERE `NAME` = '$receiver'";
            $getMoney = mysqli_query($con, $getMoneyQuery);
            // echo $getMoneyQuery;
            // echo $getMoney;
            if ($amt = mysqli_fetch_array($getMoney)) {
                // echo $amt[0];
                $addmoney = $amt[0] + $transfer;
            }

            // echo $addmoney;
            $updatequery = "UPDATE `customers` SET `CB` = '$amount' WHERE `ID` = '$customerId'";
            $update = mysqli_query($con, $updatequery);

            $updateToQuery = "UPDATE `customers` SET `CB` = '$addmoney' WHERE `NAME` = '$receiver'";
            $updateTo = mysqli_query($con, $updateToQuery);

            $TransactionHistoryQuery = "INSERT INTO `transaction` (`SENDER`, `RECEIVER`, `AMOUNT`, `DATE-TIME`) VALUES ('$sender','$receiver','$transfer', current_timestamp());";
            $TransactionHistory = mysqli_query($con, $TransactionHistoryQuery);
        }
        if ($update) {
        ?>
            <script type="text/javascript">
                alert("Transaction Successful");
                window.location.href = "transactionHistory.php";

                window.addEventListener("scroll", function() {
                    var header = document.querySelector("header");
                    header.classList.toggle("sticky", window.scrollY > 0);
                })
            </script>
        <?php } ?>

    </div>
    <script>
        document.getElementById("homePage").onclick = function() {
            location.href = "index.php";
        };
    </script>
</body>

</html>