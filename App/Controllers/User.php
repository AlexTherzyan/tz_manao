<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 01.08.2018
 * Time: 0:25
 */

namespace App\Controllers;


use App\Models\UserLogin;
use Core\Controller;
use Core\View;


class User extends Controller
{

    public function signupAction()
    {

    }

    public function loginAction()
    {

        UserLogin::login();

        View::render('user/login.php', []);

    }

    public function logoutAction()
    {

        UserLogin::logout();

    }

    public function registerAction()
    {

        UserLogin::register();

        View::render("user/register.php");

    }

}
















