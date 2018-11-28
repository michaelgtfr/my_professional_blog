{% extends "template.html" %}

{% block title %}Login page {% endblock %}
{% block style %}<link rel="stylesheet" href="http://projetcinq/css/loginPage.css" />{% endblock %}

{% block content %}
<!--body: Page de connexion-->

    <section class="container">
        <div class="row">
            <h4 class="col-sm-12 titleContent">Se connecter:</h4>
            <form action="http://projetcinq/index.php/postconnection" method="post" class="connection col-sm-offset-4 col-sm-4">
                <p>
                    <div class="email col-sm-12 form-group">
                        <label for="email">Email : </label><input type="email" name="email" id="email" class="form-control" placeholder="ex:coucou45@gmail.com" />
                    </div>
                    <div class="password col-sm-12 form-group">
                        <label for="password">Mot de passe : </label><input type="password" name="password" id="password" class="form-control" value="ex: stml2134" />
                    </div>
                    <input type="hidden" name="token" id="token" value="{{ request.getSession('token') }}" />
                    <div class="validate col-sm-12 form-group">
                        <button class="btn btn-danger" type="submit">valider</button>
                    </div>
                </p>
            </form>
            <a href="http://projetcinq/index.php/resetpassword" class="resetPassword col-sm-12">Je ne me souviens plus de mon mot de passe</a>
            <a href="http://projetcinq/index.php/registrationpage" class="inscription col-sm-12">Cliquer ici pour s'inscrire</a>
        </div>
    </section>
{% endblock %}
