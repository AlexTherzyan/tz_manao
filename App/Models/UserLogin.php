<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 01.08.2018
 * Time: 0:27
 */

namespace App\Models;


use \RedBeanPHP\R as R;

class UserLogin
{




    public static function get_email ()
    {
       $data = $_POST;
            if(isset($data['email']))
                return $email = htmlspecialchars($data['email']);
            else  return $email = '';
        }


    /*
     *  Вход
     */

    public static function login()
    {


        R::setup( 'mysql:host=localhost;dbname=manao_tz',
            'root', '' );

        // нужно для запоминания пользователя
        session_start();


        $data = $_POST;

        if(isset($data['do_login']))
        {
            $errors =  array();

            if(trim(htmlspecialchars($data['email'] == '')))
            {
                $errors[] = 'поле email не должно быть пустым';
            }

            if(trim(htmlspecialchars($data['password'] == '')))
            {
                $errors[] = 'поле пароль не должно быть пустым';
            }

            //-- находим пользователя
            $user = R::findOne('userstest', 'email = ?', array($data['email']));
            //-- если пользователь существует
            if ($user) {

                if (password_verify(htmlspecialchars($data['password']), $user->password)) {

                    //запоминаем пользователя
                    $_SESSION['logged_user'] = $user;


                    //--------


                    //--------

                    header('Location: /');
                }
                else
                {
                    $errors[] = 'Неверное имя пользователя или пароль';
                }

            }else
            {
                $errors[] = 'Пользователь с таким email не найден';
            }

            if(!empty($errors))
            {
                echo '<div  style="color: red; "> '.array_shift($errors).' </div>';
            }


        }
    }


    /*
    *  регистрация
    */

    public static function register()
    {

        R::setup( 'mysql:host=localhost;dbname=manao_tz',
            'root', '' );

        // нужно для запоминания пользователя
        session_start();


        $data = $_POST;



        if(isset($data['do_signup']))
        {
            //обрабатываем данные

            $errors =  array();


            if(trim(htmlspecialchars($data['email'] == '')))
            {
                $errors[] = 'поле email не должно быть пустым';
            }

            if(trim(htmlspecialchars($data['login'] == '')))
            {
                $errors[] = 'поле login не должно быть пустым';
            }
            if(trim(htmlspecialchars($data['name'] == '')))
            {
                $errors[] = 'поле name не должно быть пустым';
            }

            if(trim(htmlspecialchars($data['password'] == '')))
            {
                $errors[] = 'поле пароль не должно быть пустым';
            }

            if(htmlspecialchars($data['reply_password']) != htmlspecialchars($data['password']))
            {
                $errors[] = 'повторный пароль не совпадает';
            }

            if (R::count('userstest', 'email = ?', array(htmlspecialchars($data['email']))) > 0) {
                $errors[] = 'пользователь с таким email уже существует';
            }

            if (R::count('userstest', 'login = ?', array(htmlspecialchars($data['login']))) > 0) {
                $errors[] = 'пользователь с таким login-ом уже существует';
            }

            if(empty($errors)){
                // все хорошо, регистрируем

                //создаем таблицу users
                $user = R::dispense('userstest');
                $user -> login  = htmlspecialchars($data['login']);
                $user -> name   = htmlspecialchars($data['name']);
                $user -> email  = htmlspecialchars($data['email']);
                $user -> password = password_hash(htmlspecialchars($data['password']), PASSWORD_DEFAULT);

                R::store($user);


                echo   '<div class="container" style="color: green; float=right;">' .  'Вы успешно зарегистрированы  <a href="login"> Войти</a> ' . '</div>';

            }
            else
            {

                echo '<div  style="color: red; "> '.array_shift($errors).' </div>';
            }

        }

    }


    /*
    *  Выход
    */

    public static function logout()
    {
        session_start();
        unset($_SESSION['logged_user']);

        header('Location: /');

    }


}




























