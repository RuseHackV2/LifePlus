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

	<body>

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

								<li><a href="#">Заведения</a></li>

								<li><a href="#">Рецепти</a></li>

								<li><a href="#">Диети</a></li>

								<li><a href="#">Магазини</a></li>

							</ul>

						</li>

						<li class="dropdown">

							<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Спорт <span class="caret"></span></a>

							<ul class="dropdown-menu">

								<li><a href="#">Паркове</a></li>

								<li><a href="#">Спортни зали</a></li>

								<li><a href="#">Фитнес</a></li>

								<li role="separator" class="divider"></li>

								<li><a href="#">Намери другар</a></li>

							</ul>

						</li>

					</ul>



					<ul class="nav navbar-nav main-menu ale">

						<li><a class="getloc" href="#" alt="Местоположение" onclick="getLocation()"><i class="fa fa-map-marker"></i></a></li>

						<li><a class="notific" href="#"><i class="fa fa-bell"></i></a></li>

						<li class="dropdown">

							<a href="#" class="top-ava dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

								<img class="user-ava" src="images/sample-avatar.jpg"></a>

							<ul class="dropdown-menu">

								<li><a href="#">Профил</a></li>

								<li><a href="#">Съобщения</a></li>

								<li><a href="#">Настройки</a></li>

								<li><a href="#">Изход</a></li>

							</ul>

						</li>

					</ul>



					<form class="navbar-form navbar-right" role="search">

						<div class="form-group">

							<input type="text" class="form-control" placeholder="Search">

						</div>

						<div class="form-group">

							<select class="form-control" id="city-select">

							<option>Русе</option>

							<option>Габрово</option>

							<option>Варна</option>

							<option>София</option>

							</select>

						</div>

						<button type="submit" class="btn btn-default search">Търси</button>

					</form>

				</div>

			</div>

		</nav>

	</header>

	<div class="container">

		<div class="row">

			<!-- SIDEBAR -->

			<div class="col-md-4 listing" id="listing">

				<article class="feed-entry gr-border">

					<a class="article-img" href="#"><img class="article-img result" src="images/sushi.jpg"></a>

					<div class="article-body">

						<div class="title">

							<h5>Title is here</h5>

						</div>

						<ul class="no-style loc-info">

							<li class="address"><i class="fa fa-map-marker"></i>ул. Някоя 13</li>

							<li class="tel"><i class="fa fa-mobile"></i><a href="tel:#">+359 02 755 834</a></p>

						</ul>

					</div>

				</article>



				<article class="feed-entry gr-border">

					<a class="article-img" href="#"><img class="article-img result" src="images/sushi.jpg"></a>

					<div class="article-body">

						<div class="title">

							<h5>Title is here</h5>

						</div>

						<ul class="no-style loc-info">

							<li class="address"><i class="fa fa-map-marker"></i>ул. Някоя 13</li>

							<li class="tel"><i class="fa fa-mobile"></i><a href="tel:#">+359 02 755 834</a></p>

						</ul>

					</div>

				</article>



				<article class="feed-entry gr-border">

					<a class="article-img" href="#"><img class="article-img result" src="images/sushi.jpg"></a>

					<div class="article-body">

						<div class="title">

							<h5>Title is here</h5>

						</div>

						<ul class="no-style loc-info">

							<li class="address"><i class="fa fa-map-marker"></i>ул. Някоя 13</li>

							<li class="tel"><i class="fa fa-mobile"></i><a href="tel:#">+359 02 755 834</a></p>

						</ul>

					</div>

				</article>

			</div>



			<!-- BODY FEED -->

			<div class="col-md-8 map-wrap" id="wrap-map">

				<div id="map" class="google-map">

					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2877.0430465571326!2d25.96738551520381!3d43.854936447380766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40ae60b54dcf2b09%3A0x5ac4d047d78bc3dc!2z0JrRgNGK0YHRgtC90LjQutGK0YI!5e0!3m2!1sen!2sbg!4v1446984205191" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

				</div>

			</div>

			

		</div>

	</div>



	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->

	<script src="js/bootstrap.min.js"></script>

	</body>

</html>