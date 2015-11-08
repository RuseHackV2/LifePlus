<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Life +</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic,cyrillic-ext' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<!------------------------------------------------------------------------------------------------------------------------------------------------------->

<!--<script src="./fbSdk.js"></script>-->
<script src="./fbLogin.js"></script>
<script src="//connect.facebook.net/en_US/sdk.js"></script>

<!------------------------------------------------------------------------------------------------------------------------------------------------------->

<body onload="loadData();">
<header>
    <div class="container over-nav">
        <a class="navbar-brand" href="#"><img src="images/logo.png" alt="logo"></a>
    </div>

    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav main-nav">
                    <li class="active"><a href="index.php">Начало</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Хранене <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="results.php">Заведения</a></li>
                            <li><a href="results.php">Рецепти</a></li>
                            <li><a href="results.php">Диети</a></li>
                            <li><a href="results.php">Магазини</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Спорт <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="results.php">Паркове</a></li>
                            <li><a href="results.php">Спортни зали</a></li>
                            <li><a href="results.php">Фитнес</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="results.php">Намери другар</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav main-menu ale">
                    <li><a class="getloc" href="#" alt="Местоположение" onclick="getLocation()"><i class="fa fa-map-marker"></i></a></li>
                    <li><a class="notific" href="#"><i class="fa fa-bell"></i></a></li>
                    <li class="dropdown">
                        <a href="#" class="top-ava dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <img class="user-ava" src="<?php echo $_SESSION['picUrl']; ?>"></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://facebook.com">Профил</a></li>
                            <li><a href="#">Съобщения</a></li>
                            <li><a href="#">Настройки</a></li>
                            <li><a href="#">Изход</a></li>
                        </ul>
                    </li>
                </ul>

                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" id="query-string" class="form-control" placeholder="Search">
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="city-select">
                            <option>Ruse</option>
                            <option>Varna</option>
                            <option>Burgas</option>
                            <option>Sofia</option>
                            <option>Silistra</option>
                            <option>Shumen</option>
                            <option>Dobrich</option>
                            <option>Montana</option>
                            <option>Vidin</option>
                            <option>Dimitrovgrad</option>
                        </select>
                    </div>
                    <button type="submit" id="search-btn" class="btn btn-default search">Търси</button>
                </form>
            </div>
        </div>
    </nav>
</header>
<div class="container">
    <div class="row">
        <!-- SIDEBAR -->
        <div class="col-md-3 sidebar" id="sidebar">
            <div class="side-widget gr-border widget">
                <div class="ava-bg" style="background-image: url(images/sample-bg.jpg);"></div>
                <div class="user-info-box">
                    <a href="profile/index.php">
                        <img class="user-avatar" src="<?php echo $_SESSION['picUrl']; ?>">
                    </a>

                    <h5 class="user-name">
                        <a class="user-name" href="profile/index.php"><?php echo $_SESSION['name']; ?></a>
                    </h5>
                    <?php
                    if ($_SESSION['name'] === "Не сте влезли!") {
                        echo '<fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button>';
                    }
                    ?>
                    <p class="bio">
                        Това е кратка информация за мен. Аз съм як пич.
                    </p>

                    <ul class="user-meter">
                        <li class="meter-value">
                            <a href="#" class="review" data-toggle="modal">
                                Здраве
                                <h5 class="value">35%</h5>
                            </a>
                        </li>

                        <li class="meter-value">
                            <a href="#" class="review" data-toggle="modal">
                                Отзиви
                                <h5 class="value">5</h5>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="side-widget gr-border widget">
                <div class="about-box">
                    <h5 class="ald">Инфо
                        <small><a href="#">Редаркирай</a></small>
                    </h5>
                    <ul class="info-list">
                        <li>
                            <p>
                                <dt>Тип хранене:</dt>
                                вегетарианско
                            </p>
                        </li>
                        <li>
                            <p>
                                <dt>Предпочитани храни:</dt>
                                плодове, салати, суши
                            </p>
                        </li>
                        <li>
                            <p>
                                <dt>Посетени места:</dt>
                                52
                            </p>
                        </li>
                        <p>
                            <dt>Предпочитани спортове:</dt>
                            колоездене, тенис, футбол
                        </p>
                        <li>
                            <p>
                                <dt>Активност:</dt>
                                72%
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- BODY FEED -->
        <div class="col-md-9 feed" id="body-feed">
            <div class="center-block">
                <br><br>
                <br><br>
                <img class="center-block img-responsive" src="images/page-loader.gif" alt="Зареждане ...">
            </div>
            <!--            <article class="feed-entry gr-border">-->
            <!--                <a class="article-img" href="#"><img class="article-img" src="images/sample-avatar.jpg"></a>-->
            <!---->
            <!--                <div class="article-body">-->
            <!--                    <div class="title">-->
            <!--                        <small class="time-stamp">14 мин</small>-->
            <!--                        <h5>Посети "Planet Food"</h5>-->
            <!--                    </div>-->
            <!--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse luctus nunc lorem, non gravida ligula vehicula a. Nunc laoreet tincidunt laoreet. Nam vitae efficitur nunc, facilisis commodo-->
            <!--                        velit. Nam faucibus convallis semper. Quisque in auctor neque, eget tempor sem. Etiam commodo nec eros ac viverra. Morbi egestas odio elit, id tempor odio vulputate et. Interdum et malesuada fames-->
            <!--                        ac ante ipsum primis in faucibus. Curabitur at tristique est. Praesent sagittis aliquam sem nec venenatis. Nulla feugiat est vel sem tristique, et accumsan ipsum congue. Morbi consequat lorem-->
            <!--                        interdum purus mollis, malesuada feugiat eros eleifend. Nam vulputate dui in quam vehicula egestas.</p>-->
            <!--                </div>-->
            <!--            </article>-->
        </div>

    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<!-- Custom JS -->
<script src="js/custom.js"></script>

</body>
</html>