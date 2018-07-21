<!DOCTYPE html>
    <html>
        <head>
            <title><?= $title ?></title>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">     <!--Warning this tag does not pass the W3C validation-->
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="http://projetcinq/bootstrap-3.3.7/bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet"/> <!--udpdate by CDN-->
            <link href="http://projetcinq/img/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="http://projetcinq/css/styleTemplate.css" />
            <?= $style ?>
            
            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->


            <!--metatag social networks-->

            <meta name="description" content="Blog professionnel crée par Michael " />

            <!-- Twitter Card data -->
            <meta name="twitter:card" value="summary">

            <!-- Open Graph data -->
            <meta property="og:title" content="Page du blog de Michael" />
            <meta property="og:type" content="website" />
            <meta property="og:url" content="#" />
            <meta property="og:image" content="#" />
            <meta property="og:description" content="Blog professionnel créé par Michael " />

        </head>

        <body>
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                    <div class=navbar-header>
                        <h2 class="titleBar">Cocoworking blog</h2>
                    </div>
                    <ul class="nav navbar-nav navbar-right menu">
                        <li><a href="/">Accueil/Contact</a></li>
                        <li><a href="http://projetcinq/index.php/listofarticles/1">Liste Des Articles</a></li>
                    </ul>
                </div>
            </nav>

            <header>
            <div class="banner">
                <div>
                    <p><img src="http://projetcinq/img/logoblogdeux.jpg" alt="logo du site" width="20%" height="20%" /></p>
                </div>
                <div>
                    <h1>Cocoworking<br />blog</h1>
                </div>
            </div>
            </header>


            <section>

                <?= $content ?>
            
            </section>

            <footer class="row">
                <ul class="colomnOne col-sm-6">   
                    <li><h2>Page: </h2></li>
                    <li>Accueil/ Contact</li>
                    <li>Liste des articles</li>
                </ul>
                <ul class="colomnTwo col-sm-6">    
                    <li><h2>Compte:</h2></li>
                    <li><a href="http://projetcinq/index.php/loginpage">Se connecter</a></li>
                    <li><a href="http://projetcinq/index.php/registrationpage">Inscription</a></li>
                </ul>
                <div class= "socialNetworks col-sm-12">
                    <a class="btn btn-primary btn-lg" href="https://fr-fr.facebook.com/"><i class="fa fa-facebook fa-2x"></i></a>
                    <a class="btn btn-primary btn-lg" href="https://twitter.com/?lang=fr"><i class="fa fa-twitter fa-2x"></i></a>
                    <a class="btn btn-primary btn-lg" href="https://github.com/michaelgtfr/my_professional_blog"><i class="fa fa-github fa-2x"></i></a>
                    <a class="btn btn-primary btn-lg" href="https://www.linkedin.com/in/michaël-garret-130828151/"><i class="fa fa-linkedin fa-2x"></i></a>
                </div>
                <p class="copyright col-sm-12">Copyright 2018</p>
            </footer>

        </body>
    </html>
