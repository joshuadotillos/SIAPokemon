<?php
require_once 'class/Pokemon.php';
require_once 'class/Charmander.php';
require_once 'class/Bulbasaur.php';
require_once 'class/Squirtle.php';
session_start();

//start here
if (!empty($_POST)) {
    $pick = ['Charmander', 'Bulbasaur', 'Squirtle'];
    $choice = rand(0, 2);
    $computerPick = $pick[$choice];

    $charmanderPlayerImg = 'images/battleImages/charmanderPlayer.gif';
    $charmanderEnemyImg = 'images/battleImages/charmanderE.gif';

    $bulbasaurPlayerImg = 'images/battleImages/bulbasaurPlayer.gif';
    $bulbasaurEnemyImg = 'images/battleImages/bulbasaurEnemy.gif';

    $squirtlePlayerImg = 'images/battleImages/squirtlePlayer.gif';
    $squirtleEnemyImg = 'images/battleImages/squirtleE.gif';

    $pokemonHP = '30';
    $pokemonMP = '20';

    $charmanderAbilities = ['Tackle', 'Flamethrower ', 'Fire Fang', 'Heal'];
    $bulbasaurAbilities = ['Tackle', 'Vine Whip', 'Razor Leaf', 'Heal'];
    $squirtleAbilities = ['Tackle', 'Bite', 'Water Gun', 'Heal'];


    //user pick conditions
    if (isset($_POST["submit"])) {
        if ($_POST["submit"] == 'Charmander') {
            $player = new Charmander('Charmander', $pokemonHP, $pokemonMP, $charmanderAbilities, 'Bulbasaur', 'Squirtle', $charmanderPlayerImg);
            $_SESSION["rounds"] = 1;
            $_SESSION["player"] = $player;
            if ($computerPick == $pick[0]) {
                $comp = new Charmander('Charmander', $pokemonHP, $pokemonMP, $charmanderAbilities, 'Bulbasaur', 'Squirtle', $charmanderEnemyImg);
                $_SESSION["computer"] = $comp;
            } else if ($computerPick == $pick[1]) {
                $comp = new Bulbasaur('Bulbasaur', $pokemonHP, $pokemonMP, $bulbasaurAbilities, 'Squirtle', 'Charmander', $bulbasaurEnemyImg);
                $_SESSION["computer"] = $comp;
            } else if ($computerPick == $pick[2]) {
                $comp = new Squirtle('Squirtle', $pokemonHP, $pokemonMP, $squirtleAbilities, 'Charmander', 'Bulbasaur', $squirtleEnemyImg);
                $_SESSION["computer"] = $comp;
            }
        } else if ($_POST["submit"] == 'Bulbasaur') {
            $player = new Bulbasaur('Bulbasaur', $pokemonHP, $pokemonMP, $bulbasaurAbilities, 'Squirtle', 'Charmander', $bulbasaurPlayerImg);
            $_SESSION["rounds"] = 1;
            $_SESSION["player"] = $player;
            if ($computerPick == $pick[0]) {
                $comp = new Charmander('Charmander', $pokemonHP, $pokemonMP, $charmanderAbilities, 'Bulbasaur', 'Squirtle', $charmanderEnemyImg);
                $_SESSION["computer"] = $comp;
            } else if ($computerPick == $pick[1]) {
                $comp = new Bulbasaur('Bulbasaur', $pokemonHP, $pokemonMP, $bulbasaurAbilities, 'Squirtle', 'Charmander', $bulbasaurEnemyImg);
                $_SESSION["computer"] = $comp;
            } else if ($computerPick == $pick[2]) {
                $comp = new Squirtle('Squirtle', $pokemonHP, $pokemonMP, $squirtleAbilities, 'Charmander', 'Bulbasaur', $squirtleEnemyImg);
                $_SESSION["computer"] = $comp;
            }
        } else if ($_POST["submit"] == 'Squirtle') {
            $player = new Squirtle('Squirtle', $pokemonHP, $pokemonMP, $squirtleAbilities, 'Charmander', 'Bulbasaur', $squirtlePlayerImg);
            $_SESSION["rounds"] = 1;
            $_SESSION["player"] = $player;
            if ($computerPick == $pick[0]) {
                $comp = new Charmander('Charmander', $pokemonHP, $pokemonMP, $charmanderAbilities, 'Bulbasaur', 'Squirtle', $charmanderEnemyImg);
                $_SESSION["computer"] = $comp;
            } else if ($computerPick == $pick[1]) {
                $comp = new Bulbasaur('Bulbasaur', $pokemonHP, $pokemonMP, $bulbasaurAbilities, 'Squirtle', 'Charmander', $bulbasaurEnemyImg);
                $_SESSION["computer"] = $comp;
            } else if ($computerPick == $pick[2]) {
                $comp = new Squirtle('Squirtle', $pokemonHP, $pokemonMP, $squirtleAbilities, 'Charmander', 'Bulbasaur', $squirtleEnemyImg);
                $_SESSION["computer"] = $comp;
            }
        }
    }

    //session
    $_SESSION["playerImg"] = '<img src="' . $_SESSION["player"]->getImg() . '" />';
    $_SESSION["computerImg"] = '<img src="' . $_SESSION["computer"]->getImg() . '" />';

    $_SESSION["playerDMG"] = 0; //player dmg to computer
    $_SESSION["playerHP"] = $_SESSION["player"]->getHp();
    $_SESSION["playerMP"] = $_SESSION["player"]->getMp();

    $all_abilities = $_SESSION["player"]->getAbilities();

    $playerWeakness = $_SESSION["player"]->getWeakness();
    $playerStrength = $_SESSION["player"]->getStrength();

    //playerMove
    if (isset($_POST["choose_attack"])) {
        if ($_POST["choose_attack"] == 0) {
            $_SESSION["playerDMG"] = 3;

            $_SESSION["player_attack_name"] = $all_abilities[$_POST["choose_attack"]];

            $_SESSION["computerHP"]  -= $_SESSION["playerDMG"];
            $computerHP = $_SESSION["computerHP"];
            $_SESSION["computer"]->setHp($computerHP);
        }
        if ($_POST["choose_attack"] == 1) {
            $_SESSION["playerDMG"] = 7;
            $_SESSION["playerMpTaken"] = 3;

            $_SESSION["player_attack_name"] = $all_abilities[$_POST["choose_attack"]];

            if ($_SESSION["playerMP"] != 0 || $_SESSION["playerMP"] > 0) {
                $_SESSION["computerHP"]  -= $_SESSION["playerDMG"];
                $computerHP = $_SESSION["computerHP"];
                $_SESSION["computer"]->setHp($computerHP);

                $_SESSION["playerMP"] -= $_SESSION["playerMpTaken"];
                $playerMP = $_SESSION["playerMP"];
                $_SESSION["player"]->setMp($playerMP);
            } else if ($_SESSION["playerMpTaken"] > $_SESSION["playerMP"]) {
                echo '<script>alert("Not Enough Mana Points!")</script>';
            } else if ($_SESSION["playerMP"] == 0) {
                echo '<script>alert("No More Mana Points!")</script>';
            }
        }
        if ($_POST["choose_attack"] == 2) {
            $_SESSION["playerDMG"] = 10;
            $_SESSION["playerMpTaken"] = 5;

            $_SESSION["player_attack_name"] = $all_abilities[$_POST["choose_attack"]];

            if ($_SESSION["playerMP"] != 0 || $_SESSION["playerMP"] > 0) {
                $_SESSION["computerHP"]  -= $_SESSION["playerDMG"];
                $computerHP = $_SESSION["computerHP"];
                $_SESSION["computer"]->setHp($computerHP);

                $_SESSION["playerMP"] -= $_SESSION["playerMpTaken"];
                $playerMP = $_SESSION["playerMP"];
                $_SESSION["player"]->setMp($playerMP);
            } else if ($_SESSION["playerMP"] == 0) {
                echo '<script>alert("No More Mana Points!")</script>';
            } else if ($_SESSION["playerMpTaken"] > $_SESSION["playerMP"]) {
                echo '<script>alert("Not Enough Mana Points!")</script>';
            }
        }
        if ($_POST["choose_attack"] == 3) {
            $_SESSION["playerHeal"] = 3;
            $_SESSION["playerMpTaken"] = 3;

            $_SESSION["player_attack_name"] = $all_abilities[$_POST["choose_attack"]];

            if ($_SESSION["playerMP"] != 0 || $_SESSION["playerMP"] > 0) {
                $_SESSION["playerHP"]  += $_SESSION["playerHeal"];
                $playerHP = $_SESSION["playerHP"];
                $_SESSION["player"]->setHp($playerHP);

                $_SESSION["playerMP"] -= $_SESSION["playerMpTaken"];
                $playerMP = $_SESSION["playerMP"];
                $_SESSION["player"]->setMp($playerMP);
            } else if ($_SESSION["playerMpTaken"] > $_SESSION["playerMP"]) {
                echo '<script>alert("Not Enough Mana Points!")</script>';
            } else if ($_SESSION["playerMP"] == 0) {
                echo '<script>alert("No More Mana Points!")</script>';
            }
        }
    }

    //computerMoves
    $_SESSION["computerDMG"] = 0; //computer dmg to player
    $_SESSION["computerMP"] = $_SESSION["computer"]->getMp();
    $_SESSION["computerHP"] = $_SESSION["computer"]->getHp();

    $computerMove = [0, 1, 2, 3];
    $movePick = rand(0, 3);
    $computerMovePick = $computerMove[$movePick];

    $all_abilities = $_SESSION["computer"]->getAbilities();

    if (isset($_POST["choose_attack"])) {
        if ($_POST["choose_attack"] == null) {
        } else {
            if (isset($computerMovePick)) {
                if ($computerMovePick == 0) {
                    $_SESSION["computerDMG"] = 3;

                    $_SESSION["computer_attack_name"] = $all_abilities[$computerMovePick];

                    $_SESSION["playerHP"]  -= $_SESSION["playerDMG"];
                    $playerHP = $_SESSION["playerHP"];
                    $_SESSION["player"]->setHp($playerHP);
                }
                if ($computerMovePick == 1) {
                    $_SESSION["computerDMG"] = 7;
                    $_SESSION["computerMpTaken"] = 3;

                    $_SESSION["computer_attack_name"] = $all_abilities[$computerMovePick];

                    if ($_SESSION["computerMP"] == 0 || $_SESSION["computerMP"] < 0 || $_SESSION["computerMP"] < $_SESSION["computerMpTaken"]) {
                    } else {
                        $_SESSION["playerHP"]  -= $_SESSION["computerDMG"];
                        $playerHP = $_SESSION["playerHP"];
                        $_SESSION["player"]->setHp($playerHP);

                        $_SESSION["computerMP"] -= $_SESSION["computerMpTaken"];
                        $computerMP = $_SESSION["computerMP"];
                        $_SESSION["computer"]->setMp($computerMP);
                    }
                }
                if ($computerMovePick == 2) {
                    $_SESSION["computerDMG"] = 10;
                    $_SESSION["computerMpTaken"] = 5;

                    $_SESSION["computer_attack_name"] = $all_abilities[$computerMovePick];

                    if ($_SESSION["computerMP"] == 0 || $_SESSION["computerMP"] < 0 || $_SESSION["computerMP"] < $_SESSION["computerMpTaken"]) {
                    } else {
                        $_SESSION["playerHP"]  -= $_SESSION["computerDMG"];
                        $playerHP = $_SESSION["playerHP"];
                        $_SESSION["player"]->setHp($playerHP);

                        $_SESSION["computerMP"] -= $_SESSION["computerMpTaken"];
                        $computerMP = $_SESSION["computerMP"];
                        $_SESSION["computer"]->setMp($computerMP);
                    }
                }
                if ($computerMovePick == 3) {
                    $_SESSION["computerHeal"] = 3;
                    $_SESSION["computerMpTaken"] = 3;

                    $_SESSION["computer_attack_name"] = $all_abilities[$computerMovePick];

                    if ($_SESSION["computerMP"] == 0 || $_SESSION["computerMP"] < 0 || $_SESSION["computerMP"] < $_SESSION["computerMpTaken"]) {
                    } else {
                        $_SESSION["computerHP"]  += $_SESSION["computerHeal"];
                        $computerHP = $_SESSION["computerHP"];
                        $_SESSION["computer"]->setHp($computerHP);

                        $_SESSION["computerMP"] -= $_SESSION["computerMpTaken"];
                        $computerMP = $_SESSION["computerMP"];
                        $_SESSION["computer"]->setMp($computerMP);
                    }
                }
            }
        }
    }
}

//round
if ($_SESSION["computerHP"] <= 0) {
    $_SESSION["rounds"] += 1;
    if (isset($_SESSION["playerWins"])) {
        $_SESSION["playerWins"] += 0;

        $_SESSION["playerHP"] = $pokemonHP;
        $_SESSION["playerMP"] = $pokemonMP;
        $_SESSION["player"]->setHp($_SESSION["playerHP"]);
        $_SESSION["player"]->setMp($_SESSION["playerMP"]);

        $_SESSION["computerHP"] = $pokemonHP;
        $_SESSION["computerMP"] = $pokemonMP;
        $_SESSION["computer"]->setHp($_SESSION["computerHP"]);
        $_SESSION["computer"]->setMp($_SESSION["computerMP"]);


        echo '<script>alert("Game Over Player Win Round ' . ($_SESSION["rounds"] - 1) . '!") </script>';
    }
}

if ($_SESSION["playerHP"] <= 0) {
    $_SESSION["rounds"] += 1;
    if (isset($_SESSION["computerWins"])) {
        $_SESSION["computerWins"] += 0;

        $_SESSION["playerHP"] = $pokemonHP;
        $_SESSION["playerMP"] = $pokemonMP;
        $_SESSION["player"]->setHp($_SESSION["playerHP"]);
        $_SESSION["player"]->setMp($_SESSION["playerMP"]);

        $_SESSION["computerHP"] = $pokemonHP;
        $_SESSION["computerMP"] = $pokemonMP;
        $_SESSION["computer"]->setHp($_SESSION["computerHP"]);
        $_SESSION["computer"]->setMp($_SESSION["computerMP"]);

        echo '<script>alert("Game Over Computer Win Round ' . ($_SESSION["rounds"] - 1) . '!") </script>';
    }
}

if ($_SESSION["rounds"] > 5) {
    if ($_SESSION["playerWins"] < $_SESSION["computerWins"]) {
        echo "<script> alert('Game Over Player Wins!'); document.location='http://localhost/Prelim%20Project/PokemonUI.php' </script>";

        $_SESSION["rounds"] = 1;
        $_SESSION["playerWins"] = 0;
        $_SESSION["computerWins"] = 0;
    } else {
        echo "<script> alert('Game Over Computer Wins!'); document.location='http://localhost/Prelim%20Project/PokemonUI.php' </script>";

        $_SESSION["rounds"] = 1;
        $_SESSION["playerWins"] = 0;
        $_SESSION["computerWins"] = 0;
    }
}

if ($_SESSION["rounds"] === 1) {
    $_SESSION["rounds"] = 1;
    $_SESSION["playerWins"] = 0;
    $_SESSION["computerWins"] = 0;
}
