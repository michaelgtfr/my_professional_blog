{% extends "template.html" %}

{% block title %}Home page{% endblock %}

{% block style %}<link rel="stylesheet" href="http://projetcinq/css/home_page_style.css" />{% endblock %}

{% block content %}
<!--body: Home page of the site-->

<div class="container">
<section class= "presentation row">
    <div class="col-sm-12"> 
        <div class="col-sm-3">
            <p><img src="img/photo_profil.jpg" alt="photo de profil" width="100%" height="100%" /></p>
        </div>
        <div class="col-sm-9">
            <div class="titlePresentation  col-sm-12" >  
                <p>Je me Présente :</p>
            </div>
            <div class="col-sm-6">
                <p> Bonjour, je m'appelle michael et ici vous étes sur mon blog professionnel. Je suis actuellement en formation diplomante au titre de developpeur PHP/Symfony. Si vous voulais plus de renseignement à mon sujet cliqué sur la case PDF ou envoyer moi un message en utilisant le formulaire de contact ci-dessous. Sinon ceci est un blog créer par moi que vous pouvez visiter voir vous inscrire pour contribuer ou avoir un visuel sur mes qualifications. Il ne me reste plus qu'a vous dire bonne visite. Domaine lier à mes connaissance:</p>
            </div>
            <div class="col-sm-3">
                <ul>
                    <li>HTML (niveau 1 sur 3)</li>
                    <li>CSS (niveau 1 sur 3)</li>
                    <li>PHP (niveau 1 sur 3)</li>
                    <li>SQL (niveau 1 sur 3)</li>
                    <li>Javascript (notion)</li>
                    <li>Boostrap (niveau 1 sur 3)</li>
                </ul>
            </div>
            <div class="blockCV col-sm-3">  
                <a target="_blank" href="img/cv_michael.pdf"><i class="fa fa-file-pdf-o fa-3x"></i></a>
            </div>
        </div>
    </div>
</section>
<section class= "lastAddition row"> 
    <div class="titleLastAddition col-sm-12">
        <h4>Les trois derniers ajouts:</h4>
    </div>
    <div class="post col-sm-12">
        {% if article %}
            {% for value in article %}
                <div class="blogpost col-sm-4">
                    <div class="picture col-sm-12">
                        <p><img src="http://projetcinq/img/imgPost/{{ value.getNamePicture }}.{{ value.getExtentionPicture }}" alt=" {{ value.getDescriptionPicture }}" width="100%" /></p>
                    </div>
                    <div class="col-sm-12">
                        <h6 class="titlePost">{{ value.getTitle }}</h6>
                    </div>
                    <div class="col-sm-12">
                        <p class="chapoPost">{{ value.getChapo }}</p>
                    </div>
                    <div class="col-sm-12 ">
                        <p class="authorPost pull-right">{{ value.getFirstName }}</p>
                    </div>
                    <div class="col-sm-12">
                        <p><a class="lien btn btn-danger" href="http://projetCinq/index.php/articledetail/{{ value.getId }}">Voir l'article</a></p>
                    </div>
                </div>
            {% endfor %}
        {% else %}
        <p class="noArticle">Désolé mais il y a pas d'article disponible sur le blog</p>
        {% endif %}
    </div>
</section>
<section class="formContact row">
    <h4>Formulaire de contact</h4>
    <form action="index.php/contactForm/1" method="post" class="col-sm-12"> 
        <p>
            <div class="col-sm-offset-2 col-sm-3 form-group">
                <label for="name">Nom : </label><input type="text" class="form-control" id="name" name="name" placeholder="ex: stella" />
            </div>
            <div class="email col-sm-offset-2 col-sm-3 form-group">
                <label for="email">Email : </label><input type="email" class="form-control" id="name" 
                name="email" value="ex: quelquechose@hotmail.fr" />
            </div>
            <div class="message col-sm-12 form-group">
                <label for="message">Message : </label><textarea class="form-control" id="message" name="message" rows="10" cols="50">Ecrivez ici votre message</textarea>
            </div>
            <div class="validation col-sm-12 form-group"> 
                <input type="submit" class="btn btn-danger" name="Validate" value="valider" />
            </div>   
        </p>
    </form>
</section>
</div>
{% endblock %}
