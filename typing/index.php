<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION["Username"]))
{
    echo "<script>";
    echo 'alert ("wrong username or password")';
    echo "</script>";
    exit();
}
?>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <h1 class="head">Hussein <span class="second-half"> Noureddine</span></h1>

    <div class="container">
        <div class="gamemode">
            <div>
                <input type="radio" name="gamemode" id="1">
                <label for="1">words</label>
            </div>
            <div>
                <input type="text" class="words" value="5" id="words" />
                <label for="words">Word Count </label>
            </div>
            <div>
                <input type="radio" name="gamemode" id="2">
                <label for="2">sentences</label>
            </div>
        </div>
        <div class="wpm">
            <div>
                <h1>0</h1> <span class="tiny">wpm</span>
            </div>

        </div>
        <div class="upper half">
            <div class="style-text">
                <span class="text right"></span>
                <span class="text"></span>
            </div>
        </div>
        <div class="lower half">
            <div class="reset">
                <button></button>
                <img src="replay.png">
            </div>
            <div class="type"><textarea></textarea></div>
        </div>
    </div>
</body>
<script src="app.js"></script>

</html>