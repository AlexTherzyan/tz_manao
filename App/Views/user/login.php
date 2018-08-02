
<div class="container" style=" border: 1px solid gray; margin-top: 150px; width: 350px; ">


    <form action="login" method="post" style="padding: 30px;">

    <div class="form-group">
        <label for="exampleInputEmail1">Электронный адрес</label>
        <input value="<?=\App\Models\UserLogin::get_email();?>" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите email...">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Пароль</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль...">
    </div>
        <a href="register">Зарегистрироваться</a>
    <button style="float: right"  name="do_login" type="submit" class="btn btn-primary">Войти</button>
</form>

</div>




















