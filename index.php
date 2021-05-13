<?php
require_once 'class/Pokemon.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<style>

</style>

<body>
    <center>
        <form method="POST" action="PokemonBattle.php">
            <h2 style="text-align: center;">Welcome to the Pokemon World</h2>
            <table>

                <head>
                    <tr>
                        <td></td>
                        <td>
                            <h3>Choose your Pokemon!</h3>
                        </td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>Charmander</td>
                        <td>Bulbasaur</td>
                        <td>Squirtle</td>
                    </tr>

                    <tr>
                        <td><img src="images/charmander.png" width="150" height="150"></td>
                        <td><img src="images/bulbasaur.png" width="150" height="150"></td>
                        <td><img src="images/squirtle.png" width="150" height="150"></td>
                    </tr>

                    <tr>
                        <td>
                            <p>Charmander is a Fire type Pokémon introduced in Generation 1.<br>It is known as the Lizard Pokémon.</p>
                        </td>
                        <td>
                            <p>Bulbasaur is a Grass/Poison type Pokémon introduced in Generation 1.<br>It is known as the Seed Pokémon.</p>
                        </td>
                        <td>
                            <p>Squirtle is a Water type Pokémon introduced in Generation 1.<br>It is known as the Tiny Turtle Pokémon.</p>
                        </td>
                    </tr>

                    <tr>
                        <td><button type="submit" value="Charmander" name="submit">I choose Charmander!</button></td>
                        <td><button type="submit" value="Bulbasaur" name="submit">I choose Bulbasaur!</button></td>
                        <td><button type="submit" value="Squirtle" name="submit">I choose Squirtle!</button></td>
                    </tr>


                </head>
            </table>
        </form>
    </center>
</body>

</html>