<?php

require("../src/config.php");

function loginPrompt($redirect = null)
{
    echo '
<div class="centered">
    <div class="container">
        <strong>Please login first.</strong>
        <br>
        <br>
        <form action=/askepoka.al/login>
            <input type="text" name=redirect hidden value="' . $redirect . '" />
            <input type="submit" class="customButton" value="Login" />
        </form>
    </div>
</div>
';
}
