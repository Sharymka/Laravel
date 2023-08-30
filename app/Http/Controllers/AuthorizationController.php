<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    function signIn() {
        return<<<php
        <form action="action.php" method="post">
            <label for="login">Your login:</label>
            <input name="login" id="login" type="text">
            <label for="password">Your password:</label>
            <input name="password" id="password" type="text">
            <p>rememberme: <input type="checkbox" name="rememberme" value="" /></p>
            <button type="submit">signin</button>
        </form>
php;
    }
}
