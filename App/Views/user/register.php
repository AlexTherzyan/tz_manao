<?php

$reg = '';
$data_email = $data['email'];
?>



<div class="container" style=" border: 1px solid gray; margin-top: 150px; width: 350px; ">

    <form action="register" method="post" style="padding: 30px;">

        <div class="form-group">
            <label for="exampleInputEmail1">Логин</label>
            <input name="login"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите логин...">

        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Введите пароль</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Введите пароль еще раз</label>
            <input name="reply_password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Ваша почта</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?=$data_email?>">

        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Имя</label>
            <input name="name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите имя...">

        </div>


        <a href="login"><smal> Войти</smal></a>
        <button name="do_signup" type="submit" class="btn btn-primary" style="float: right;">Зарегистрироваться</button>

    </form>
    <?=$reg;?>
</div>
