{% extends "template.html" %}

{% block title %}Item detail{% endblock %}
{% block style %}<link rel="stylesheet" href="http://projetcinq/css/commentManagement.css" />{% endblock %}

{% block content %}
<!--body: Displays uncommitted comments-->
    <section class="board container"> 
        <div class="row">                                          
	        <h3 class="titleContent col-xs-12">Tableau de validation des commentaires:</h3>
            <p class="message col-xs-12">{{ message }}</p>

            <div class="col-xs-12">
	        {% if comment %}
	            {% for value in comment %}
                    <div class="block col-sm-3 col-xs-12">
                        <p class="titleBlock col-xs-12">Commentaire:</p>
                        <p class="contentBlock col-xs-12">" {{ value.getContentComment }} "</p>
                        <p class="col-xs-12">Créer par {{ value.getAuthorComment }},<br /> le {{ value.getDateCreateComment }}</p>
                        <div class=col-xs-12>
                            <p><a class="col-xs-12 button btn btn-danger" href="/index.php/articledetail/{{ value.getBlogPostIdComment }}">Voir le detail</a></p>
                            <p><a class="col-xs-12 button btn btn-danger" href="http://projetcinq/index.php/validatecomment?id={{ value.getIdComment }}&token={{ request.getSession('token') }}">Valider le commentaire</a></p>
                            <p><a class="reject col-xs-12 button btn btn-danger" href="http://projetcinq/index.php/deletecomment?id={{ value.getIdComment }}&token={{ request.getSession('token') }}">Refuser le commentaire</a></p>
                        </div>
                    </div>
                {% endfor %}
            {% else %}
                <p class="col-xs-12">Désoler il n'y a rien à juger!</p>
            {% endif %}
            </div>
        </div>
    </section>
{% endblock %}