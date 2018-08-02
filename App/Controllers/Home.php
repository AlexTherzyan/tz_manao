<?php

namespace App\Controllers;

use App\Models\UserLogin;
use Core\Controller;
use Core\View;
use App\Models\Task;
use App\Models\Xml;
use SimpleXMLElement;

class Home extends  Controller
{




    public function indexAction()
    {

        // ннужно для запоминания пользователя
        session_start();
        $session_name =  $_SESSION['logged_user']->email;



        if (isset($_SESSION['logged_user'])) {

            Xml::createXML($_SESSION);
            //оповещение об статусе создания файла
            $success = Xml::$success;
        }



        // standart output
        View::render('home/index.php', [
            'session_name'    => $session_name,
            'success'         => $success

        ]);




    }
}











