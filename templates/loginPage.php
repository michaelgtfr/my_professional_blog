<?php $title = 'login page' ?>
<?php $style ='<link rel="stylesheet" href="http://projetcinq/css/loginPage.css" />' ?>

<!--body: Page de connexion-->
<?php ob_start(); ?>

<section class="row">
    <h4>Se connecter:</h4>
    <form action="http://projetcinq/index.php/postconnection" method="post" class="connection col-sm-offset-4 col-sm-4">
    <p>
        <div class="email col-sm-12 form-group">
            <label for="email">Email : </label><input type="email" name="email" id="email" class="form-control" placeholder="ex:coucou45@gmail.com" />
        </div>
        <div class="password col-sm-12 form-group">
            <label for="password">Mot de passe : </label><input type="password" name="password" id="password" class="form-control" value="ex: stml2134" />
        </div>
        <div class="validate col-sm-12 form-group">
            <input type="submit" name="validate" value="valider" />
        </div>
    </p>
    </form>
    <a href="http://projetcinq/index.php/resetpassword" class="resetPassword col-sm-12">Je ne me souviens plus de mon mot de passe</a>
    <a href="http://projetcinq/index.php/registrationpage" class="inscription col-sm-12">Cliquer ici pour s'inscrire</a>
</section>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>
