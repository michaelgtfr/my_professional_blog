{% extends "template.html" %}

{% block title %}Item detail{% endblock %}
{% block style %}<link rel="stylesheet" href="http://projetcinq/css/articleManagement.css" />{% endblock %}

{% block content %}
<!--body: Shows uncommitted items-->
    <section class="validateArticle container">
        <div class="row">
            <h3 class="col-xs-12">Valider des articles:</h3>
            <p class="col-xs-12">{{ message }}</p>
            {% if items %}
                {% for value in items %}
                    <div class="items col-sm-3 col-xs-12">
                        <img class=" imgItems col-xs-12" src="http://projetcinq/img/imgPost/{{ value.getNamePicture }}.{{ value.getExtentionPicture}}" alt="{{ value.getDescriptionPicture }}" width="100%" />
                        <p class="col-xs-12">{{ value.getTitle }}</p>
                        <p class="col-xs-12">{{ value.getChapo }}</p>
                        <p class="col-xs-12">{{ value.getFirstName }}</p>
                        <p class="col-xs-12">Créer le {{ value.getDateUpdate }}</p>
                        <a class="detailItems col-xs-12 btn btn-danger" href="http://projetcinq/index.php/detailarticlenovalidate/{{ value.getId }}" target="_blank">Voir l'article</a>
                        <a class="validateItems col-xs-12 btn btn-danger" href="http://projetcinq/index.php/validatearticle?id={{ value.getId }}&token={{ request.getSession('token') }}">Valider l'article</a>
                        <a class="rejectItems col-xs-12 btn btn-danger" href="http://projetcinq/index.php/deletearticle?id={{ value.getId }}&token={{ request.getSession('token') }}&picture={{ value.getNamePicture }}.{{ value.getExtentionPicture }}">Refuser l'article</a>
                    </div>
                {% endfor %}
            {% else %}
                <p class="col-xs-12">Désoler il n'y a rien à valider</p>
            {% endif %}
        </div>
    </section>
{% endblock %}
