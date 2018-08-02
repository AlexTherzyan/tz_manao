<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <a class="navbar-brand" href="/">TZ-manao</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">




        <?php if (!empty($_SESSION['logged_user'])): ?>
        <li class="nav-item dropdown">



            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?= htmlspecialchars($session_name) ?>
            </a>


            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                <a class="dropdown-item" href="user/logout">
                    Выйти
                </a>
            </div>
        </li>


                <?php else: ?>

            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Авторизация
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                <a class="dropdown-item" href="user/login">
                      Вход
                  </a>
                <a class="dropdown-item" href="user/register">
                    Регистрация
                </a>
                </div>
              </li>


                <?php endif; ?>
            </ul>


    </div>
</nav>


<!--=========================================LIST GROUP==============================================================-->

<div class="container" style="margin-top: 200px">

    <?php if (!empty($_SESSION['logged_user'])): ?>

    <h1>Привет, <?=$session_name?></h1>

    <?php else: ?>

        <h1> Вы не авторизированы </h1>

    <?php endif; ?>

    <?=$success?>

</div>












