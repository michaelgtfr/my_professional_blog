{% extends "template.html" %}

{% block title %}Change article page{% endblock %}
{% block style %}<link rel="stylesheet" href="http://projetcinq/css/validateChangeArticle.css" />{% endblock %}

{% block content %}
<!--body: Page showing the posted items-->
    <section class="section container">
        <div class="row">
            <p class="message col-xs-12">{{ message }}</p>
            <div class="posts col-xs-12">
                {% if article %}
                    {% for value in article %}
                        <div class="post col-xs-12 col-sm-4">
                            <img class="col-xs-12" src="http://projetcinq/img/imgPost/{{ value.getNamePicture }}.{{ value.getExtentionPicture }}" alt="{{ value.getDescriptionPicture }}"/>
                            <p class="author col-xs-12">Auteur: {{ value.getFirstName }}</p>
                            <p class="col-xs-12"><span>Titre:</span> {{ value.getTitle }}</p>
                            <p class="col-xs-12"><span>Chapo:</span> {{ value.getChapo }}</p>
                            <a class="col-xs-12 btn btn-danger" href="http://projetcinq/index.php/detailarticlemodify/{{ value.getId }}" target="_blank">Voir l'article modifié</a>
                            <a class="col-xs-12 btn btn-danger" href="http://projetcinq/index.php/articledetail/{{ value.getIdBlogPost }}" target="_blank">Voir l'article</a>
                            <a class="col-xs-12 btn btn-danger" href="http://projetcinq/index.php/validatethechange?id={{ value.getId }}&token={{ request.getSession('token') }}" >Valider le changement</a>
                            <a class="col-xs-12 btn btn-danger" href="http://projetcinq/index.php/refusethechange?id={{ value.getId }}&token={{ request.getSession('token') }}" >Refuser le changement</a>
                        </div>
                    {% endfor %}
                {% else %}
                    <p class="col-xs-12">Désolé, il n'y a rien à valider!</p>
                {% endif %}
            </div>
        </div>
    </section>
{% endblock %}
