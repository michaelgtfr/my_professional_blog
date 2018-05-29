<!DOCTYPE html>
    <html>
        <head>
            <title><?= $title ?></title>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">     <!--Warning this tag does not pass the W3C validation-->
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="../../bootstrap-3.3.7/bootstrap-3.3.7/dist/css/bootstrap.css"/> <!--udpdate by CDN-->
            <link href="../img/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="../css/styleTemplate.css" />
            <?= $style ?>
            
            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

        </head>

        <body>
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container-fluid">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="homePage.php">Accueil/Contact</a></li>
                        <li><a href="blogPostList.php">ListeDesArticles</a></li>
                    </ul>
                </div>
            </nav>

            <header class="row">
                    <p class="col-sm-4"><img src="../img/logo_blog.jpg" height=60% width=60% alt="logo du site" /></p>
                    <div class="col-sm-8">
                        <h1 class="col-sm-offset-7 col-sm-5">Mon blog</h1>
                        <h3 class="col-sm-offset-9 col-sm-3">Par Michael Garret</h3>
                    </div>
            </header>


            <section>

            <?= $content ?>
            
            </section>

            <footer class="row">
                <ul class="colonneUn col-sm-6">
                    <li><h2>Page: </h2></li>
                    <li>Accueil/ Contact</li>
                    <li>Liste des articles</li>
                </ul>
                <ul class="colonneDeux col-sm-6">
                    <li><h2>Compte:</h2></li>
                    <li><a href="connexion.php">Se connecter</a></li>
                    <li><a href="incription.php">Inscription</a></li>
                </ul>
                <div class= "socialNetworks col-sm-12">
                    <a class="btn btn-primary btn-lg" href="#"><i class="fa fa-facebook fa-2x"></i></a>
                    <a class="btn btn-primary btn-lg" href="#"><i class="fa fa-twitter fa-2x"></i></a>
                    <a class="btn btn-primary btn-lg" href="#"><i class="fa fa-github fa-2x"></i></a>
                    <a class="btn btn-primary btn-lg" href="#"><i class="fa fa-linkedin fa-2x"></i></a>
                </div>
                <p class="copyright col-sm-12">Copyright 2018</p>
            </footer>

        </body>
    </html>