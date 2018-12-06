{% extends "template.html" %}

{% block title %}Dashboard{% endblock %}
{% block style %}<link rel="stylesheet" href="http://projetcinq/css/dashboard.css" />{% endblock %}

{% block content %}
<!--body: Show the dashboard-->
<div class="content container">
    <section class="col-xs-12 MyProfil">
        <h3 class="profilTitle" class="col-xs-12">Mon profil :</h3>
        <img class="avatar col-sm-4 col-sm-offset-4 col-xs-12" src="http://projetcinq/img/avatar/{{ result.getPhoto }}" alt="photo de profil" />
        <div class="profilUser col-xs-12">
            <p class="col-sm-6">Nom : {{ result.getName }}</p>
            <p class="col-sm-6">Prénom : {{ result.getFirstName }}</p>
            <p class="col-sm-6">email : {{ result.getEmail }}</p>
            <p class="col-sm-6">Présentation : {{ result.getPresentation }}</p>
            <p class="col-sm-6">Compte créer le {{ result.getDateCreate }}</p>
            <a class="col-xs-12 col-sm-6 btn btn-danger" href="http://projetcinq/index.php/updateherprofil/{{ result.getId }}">Modifier mon profil</a>
        </div>   
    </section>
    <section class="col-xs-12 menuEditor">
        <div class="row">
            <h3 class="titleMenu col-xs-12">Menu</h3>
            {% if result.getRole == 'administrateur' %}
                    <a class="btn btn-primary" href="http://projetcinq/index.php/useraccountmanagement"><span class="glyphicon glyphicon-eye-open"></span>Valider un compte utilisateur</a>
                    <a class="btn btn-primary" href="http://projetcinq/index.php/validatechangearticle"><span class="glyphicon glyphicon-eye-open"></span>Valider une modification des articles</a>
            {% endif %}
            <a class="btn btn-primary" href="http://projetcinq/index.php/articlecreation"><span class="glyphicon glyphicon-eye-open"></span>Créer un article</a>
            {% if result.getRole == 'administrateur' %}
                    <a class="btn btn-primary" href="http://projetcinq/index.php/commentmanagement"><span class="glyphicon glyphicon-eye-open"></span>Valider un commentaire</a>
                    <a class="btn btn-primary" href="http://projetcinq/index.php/articlesmanagement"><span class="glyphicon glyphicon-eye-open"></span>Valider un article</a>
            {% endif %}
        </div>
    </section>
    <section class="col-xs-12 contactForm">
        <Form action="/index.php/contactForm/2" method="post" class="row">
            <h3 class="titleForm col-xs-12">Formulaire de contact:</h3>
            <div>
                <div class="col-sm-8 col-sm-offset-2 form-group">
                    <label class="col-xs-12" for=message>Message :</label><textarea class="col-xs-12" name="message" id=message >écrivez ici votre message</textarea>
                </div>
                <input type="hidden" name="name" value={{ result.getName }} />
                <input type="hidden" name="email" value={{ result.getEmail }} />
                <input type="hidden" name="role" value={{ result.getRole }} />
                <div class="validate col-xs-12 form-group">
                    <button type="submit" class="btn btn-danger">Valider</button>
                </div>
            </div>
        </Form>
    </section>
</div>
{% endblock %}
