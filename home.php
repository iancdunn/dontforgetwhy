<?php
session_start();
include('db.php');
if(isset($_SESSION['user'])){
    $username = $_SESSION['user'];
    $user_stmt = $pdo->prepare("SELECT totalBal, needsBal, `needs%`, savingsBal, `savings%`, investBal, 
    `invest%`, wantsBal, `wants%`, recent, secondRecent, thirdRecent FROM users WHERE user = '$username'");
    $user_stmt->execute();
    $user = $user_stmt->fetch();
    $_SESSION['totalBal'] = $user['totalBal'];
    $_SESSION['needsBal'] = $user['needsBal'];
    $_SESSION['needsPercent'] = $user['needs%'];
    $_SESSION['investBal'] = $user['investBal'];
    $_SESSION['investPercent'] = $user['invest%'];
    $_SESSION['savingsBal'] = $user['savingsBal'];
    $_SESSION['savingsPercent'] = $user['savings%'];
    $_SESSION['wantsBal'] = $user['wantsBal'];
    $_SESSION['wantsPercent'] = $user['wants%'];
    $_SESSION['recent'] = $user['recent'];
    $_SESSION['secondRecent'] = $user['secondRecent'];
    $_SESSION['thirdRecent'] = $user['thirdRecent'];
    ?>

    <!DOCTYPE html>
    <html>
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Home</title>
            <link rel="stylesheet" type="text/css" href="style.css">
            <nav class="navbar">
                <div class="navdiv">
                    <div class="logo"><a href="#">Hello, <?php echo $_SESSION['user']; ?>! Welcome to 
                    dontforgetwhy!</a></div>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="transaction.php">New transaction</a></li>
                        <li><a href="balances.php">Edit balances</a></li>
                        <li><a href="allocation.php">Edit allocation</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </head>
        <body>
            <div class="content">
                <h2>Balances</h2>
                <p>Total: $<?php echo $_SESSION['totalBal'];?> <br>Needs: $<?php echo $_SESSION['needsBal'];?> 
                <br>Savings: $<?php echo $_SESSION['savingsBal'];?> <br>Investments: $<?php echo 
                $_SESSION['investBal'];?> <br>Wants: $<?php echo $_SESSION['wantsBal'];?><br></p>
                <h2>Recent transactions</h2>
                <?php
                if($_SESSION['recent'] === NULL){ ?>
                <p>You have no transactions.</p>
                <?php }
                else{
                    $recents = array($_SESSION['recent'], $_SESSION['secondRecent'], 
                    $_SESSION['thirdRecent']);
                    for($i = 0; $i < 3; $i++){
                        if($recents[$i] === NULL){
                        }
                        else if($recents[$i] < 0){
                            echo "-$" . abs($recents[$i]) . "<br>";
                        }
                        else{
                            echo "+$" . abs($recents[$i]) . "<br>";
                        }
                    }
                }?>
            </div>
        </body>
    </html>
    <?php
}
else{
    header("Location: index.php");
}
?>
