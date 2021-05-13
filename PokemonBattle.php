<?php
require_once 'pokeLauncher.php';

// if ($_POST["submit"] == null) {
//     header('Location:http://localhost/Prelim%20Project/PokemonUI.php');
//     exit;
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon Battle</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <center>
        <h2>Pokemon Battle Round</h2>
        <h3>Round
            <?php
            if(isset($_SESSION["rounds"])){
                echo $_SESSION["rounds"];
            }
            ?>
        </h3>

        <div class="main">
            <div class="enemyInfo">
                <p style="font-size: 20px;"> <?php echo 'Enemy HP: ' . $_SESSION['computerHP'] . '<br> Enemy MP: ' . $_SESSION['computerMP'] ?> </p>
            </div>

            <div class="container">
                <div class="player"> <?php echo $_SESSION["playerImg"]; ?> </div>
                <div class="enemy"> <?php echo $_SESSION["computerImg"]; ?></div>
            </div>
            <div class="playerInfo">
                <p style="font-size: 20px; "> <?php echo 'Player HP: ' . $_SESSION["playerHP"] . '<br> Player MP: ' . $_SESSION["playerMP"] ?></p>
            </div>
            <form method="POST" action="">
                <div class="actions">
                    <p style="font-size: 15px;">Abilities:</p>
                    <?php
                    $player = $_SESSION["player"];
                    $_SESSION["playerMpTaken"] = 0;
                    foreach ($player->getAbilities() as $index => $attack_name) {
                        echo "<button type='submit' value='$index' name='choose_attack'> $attack_name </button>";
                    }
                    ?>
                </div>
            </form>

            <div class="computerMessage">
                <p style="font-size: 20px; ">
                    <?php
                    if (isset($_SESSION["computer_attack_name"])) {
                        if ($_SESSION["computer_attack_name"] == null) {
                            echo "";
                        } else {
                            echo 'Computer use ' . $_SESSION["computer_attack_name"];
                        }
                    }
                    ?>
                </p>
            </div>

            <div class="playerMessage">
                <p style="font-size: 20px; ">
                    <?php
                    if (isset($_SESSION["player_attack_name"])) {
                        if ($_SESSION["player_attack_name"] == null) {
                            echo "";
                        } else {
                            echo 'Player use ' . $_SESSION["player_attack_name"];
                        }
                    }
                    ?>
                </p>
            </div>
        </div>
    </center>
</body>
</html>