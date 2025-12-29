<?php
session_start();
include('db.php');
if(isset($_SESSION['user'])){ ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Transaction</title>
            <link rel="stylesheet" type="text/css" href="style.css">
            <nav class="navbar">
                <div class="navdiv">
                    <div class="logo"><a href="#">dfy</a></div>
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="#">New transaction</a></li>
                        <li><a href="balances.php">Edit balances</a></li>
                        <li><a href="allocation.php">Edit allocation</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </head>
        <body>
            <form action="transaction_backend.php" method="post">
                <?php 
                if(isset($_GET['error'])){ ?>
                    <p class="error"> <?php echo $_GET['error']; ?></p>
                <?php }
                if(isset($_GET['success'])){ ?>
                <p class="success"> <?php echo $_GET['success']; ?></p>
                <?php } ?>
                <label for="transType">Transaction type</label><br>
                <select name="transType">
                    <option value="deposit">Deposit</option>
                    <option value="withdraw">Withdraw</option>
                </select><br><br>
                <label for="transAmt">Transaction amount</label>
                <input type="number" step = "0.01" name="transAmt" placeholder="Transaction amount" required><br>
                <label for="withdrawType">If a withdrawal, what type?</label><br>
                <select name="withdrawType">
                    <option value="needs">Needs</option>
                    <option value="savings">Savings</option>
                    <option value="invest">Investments</option>
                    <option value="wants">Wants</option>
                </select><br><br>
                <button class="button-style" type="submit" name="transSubmit">Submit</button>

            </form>
        </body>
    </html>
    <?php
}
else{
    header("Location: index.php");
}
