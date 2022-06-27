<?php
session_start();

if (isset($_SESSION["sess_id"])) {
    $usr_id = $_SESSION["sess_id"];
    if ($_SESSION["sess_status"] == "admin") {
        header('location: admin/pnl_user');
    }
    if ($_SESSION["sess_status"] == "shop") {
        header('location: shop/pnl_order');
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="favicon.ico">
    <title>Система замовлень товару</title>
    <link rel="stylesheet" href="bootstrap/css/all.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css">
        .masthead {
            height: 100vh;
            min-height: 500px;
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url('https://source.unsplash.com/-YHSwy6uqvk/1920x1080');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body class="content">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top shadow bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">FOS</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Головна<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="browse">Товар</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="checkout">Кошик</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="order">Замовлення</a>
                </li>
            </ul>
            <div class="my-2 my-lg-0">
                <ul class="navbar-nav ml-auto">
                    <?php
                    if (isset($_SESSION['sess_id'])) {
                    ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i> </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                                <a class="dropdown-item" href="profile">Профіль</a>
                                <a class="dropdown-item" href="action?act=lgout">Вихід</a>
                            </div>
                        </li>
                    <?php
                    } else {
                    ?>
                        <a href="" class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#modalLoginForm">Авторизація</a>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Alert -->
    <div id="alert" style="position:absolute;z-index:1;" class="m-5">
    </div>

    <!-- Content -->
    <!-- Full Page Image Header with Vertically Centered Content -->
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <?php
                if (isset($_SESSION['sess_id'])) {
                    echo '<div class="col-12 text-center text-white">';
                    echo '<h1 class="font-weight-light">Привіт, ' . $_SESSION["sess_username"] . '!</h1>';
                    echo '<p class="lead">Гарного дня, переглядайте товар наших партнерів.</p>';
                    echo '<a href="profile?act=update" class="btn btn-outline-light">Обновити дані профіля</a>';
                    echo '</div>';
                } else {
                    echo '<div class="col-12 text-center text-white">';
                    echo '<h1 class="font-weight-light">Зручний та швидкий спосіб доскавки товару</h1>';
                    echo '<p class="lead"><a href="browse" class="btn btn-outline-light">Замовити зараз.</a></p>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <section class="py-5">
        <div class="container text-justify">
            <h2 class="font-weight-light">FOS про нас</h2>
            <p> FOS — це піддодаток у сімействі системи управління доставкою їжі (FDMS).
                 Ми спростили замовлення та винос їжі за допомогою простих кроків, що полегшить взаємодію між клієнтом і постачальником їжі.
                 це забезпечує задоволення наших клієнтів і забезпечує найкращі засоби та автоматизацію найпростішим можливим способом.
                 У 2022 році FOS прагне стати вибором номер один у замовленні та управлінні продуктами харчування.
                 Допомагає нам досягти нашої мети, підтримуючи нас і продовжуючи використовувати наші улюблені програми, щоб насолоджуватися щоденною їжею.
                 Слідкуйте за нашими щоденними акціями та змінами цін на послуги. Сподіваємося, що ви проведете найкращий час, використовуючи наші програми.
            </p>
        </div>
        <div class="container pt-4 text-justify">
            <h2 class="font-weight-light">FOS правила</h2>
            <p>
                Ці Умови використання («Умови») регулюють використання вами веб-сайтів і мобільних додатків, наданих FOS (або іменованих «ми»)
                 (разом «Платформи»). Будь ласка, уважно прочитайте ці Умови. Отримуючи доступ та використовуючи Платформи, ви погоджуєтеся, що прочитали,
                 зрозумів і прийняв Умови, включаючи будь-які додаткові положення та умови, а також будь-яку політику, на яку посилаються тут, доступні на сайті
                 Платформи або доступні за гіперпосиланням. Якщо ви не згодні або підпадаєте під Умови, не використовуйте Платформи.
            </p>
            <p>
                Платформи можуть використовувати (i) фізичні особи, які досягли 18-річного віку, і (ii) юридичні особи, наприклад компанії.
                 У разі необхідності, ці Умови підпадають під дію положень, що стосуються конкретної країни, як викладено тут.
            </p>
            <p>
                Користувачі віком до 18 років повинні отримати згоду батьків (батьків) або законних опікунів, які, приймаючи ці Умови, погоджуються прийняти
                 відповідальність за ваші дії та будь-які збори, пов’язані з використанням вами Платформ та/або купівлею Товарів. Якщо у вас немає
                 за згодою ваших батьків (батьків) чи законного опікуна(ів), ви повинні негайно припинити використання/отримувати доступ до Платформ.
            </p>
            <p>
                FOS залишає за собою право змінювати або модифікувати ці Умови (включаючи нашу політику, яка включена в ці Умови) у будь-який час.
                 Настійно рекомендуємо вам регулярно читати ці Умови. Вважається, що ви погодилися зі зміненими Умовами, якщо ви продовжуєте використовувати
                 Платформ після дати публікації змінених Умов.
            </p>
        </div>
    </section>

    <!-- Model Signup -->
    <div class="modal fade" id="modalSignupForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="action.php" method="post" id="signup_form">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Ласкаво просимо до нашої сім'ї!</h4>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Введіть ваше ім'я">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="usr" name="username" placeholder="Створіть юзернейм">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                    </div>
                                    <input type="password" class="form-control" id="pwd" name="password" placeholder="Задайте пароль">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                    </div>
                                    <input type="password" class="form-control" id="c_pwd" name="confirm_password" placeholder="Повторіть пароль">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-map-marked-alt"></i></div>
                                    </div>
                                    <textarea class="form-control" rows="3" id="address" name="address" placeholder="Введіть вашу адресу"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <div class="col text-center">
                            <input type="hidden" name="signup" value="user">
                            <input type="submit" class="btn btn-default" value="Зареєструватись">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Model Vendor -->
    <div class="modal fade" id="modalVendorForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="action.php" method="post" id="vendor_form">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Стати постачальником!</h4>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="Введіть ім'я вашого магазину">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="shop_username" name="shop_username" placeholder="Створіть юзернейм магазину">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                    </div>
                                    <input type="password" class="form-control" id="shop_password" name="shop_password" placeholder="Задайте пароль">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                    </div>
                                    <input type="password" class="form-control" id="shop_confirm_password" name="shop_confirm_password" placeholder="Підтвердіть пароль">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <div class="col text-center">
                            <input type="hidden" name="signup" value="vendor">
                            <input type="submit" class="btn btn-default" value="Зареєструвати">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Model Login -->
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="action.php" method="post" id="login_form">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Привіт</h4>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="row">
                            <div class="col">
                                <label class="sr-only" for="inlineFormInputGroup1"></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                                    </div>
                                    <input type="text" class="form-control" name="username" placeholder="Юзернейм">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="sr-only" for="inlineFormInputGroup2"></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                    </div>
                                    <input type="password" class="form-control" name="password" placeholder="Пароль">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <small class="text-muted text-center"> Не має аккаунта? <a href="" class="text-primary" data-toggle="modal" data-dismiss="modal" data-target="#modalSignupForm">Зареєструйтесь</a> зараз!</small><br>
                                <small class="text-muted text-center"> Ви постачальник, зареєструйтесь <a href="" class="text-primary" data-toggle="modal" data-dismiss="modal" data-target="#modalVendorForm">Тут</a>.</small>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <div class="col text-center">
                            <input type="hidden" name="login">
                            <input type="submit" class="btn btn-default" value="Авторизуватись">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script src="bootstrap/js/app.js"></script>
</body>

</html>