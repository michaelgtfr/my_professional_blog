{% extends "template.html" %}

{% block title %}Change article page{% endblock %}
{% block style %}<link rel="stylesheet" href="http://projetcinq/css/validateChangeArticle.css" />{% endblock %}

{% block content %}
<!--body: Page showing the posted items-->
    <section>
        <p>{{ message }}</p>
        {% if article %}
            {% for value in article %}
                <p>Auteur: {{ value.getFirstName }}</p>
                <p>Titre: {{ value.getTitle }}</p>
                <p>Chapo: {{ value.getChapo }}</p>
                <img src="http://projetcinq/img/imgPost/{{ value.getNamePicture }}.{{ value.getExtentionPicture }}" alt="{{ value.getDescriptionPicture }}"/>
                <a href="http://projetcinq/index.php/detailarticlemodify/{{ value.getId }}" target="_blank">Voir l'article modifié</a>
                <a href="http://projetcinq/index.php/articledetail/{{ value.getIdBlogPost }}" target="_blank">Voir l'article</a>
                <p>Description de l'image: {{ value.getDescriptionPicture }}</p>
                <a href="http://projetcinq/index.php/validatethechange?id={{ value.getId }}&token={{ request.getSession('token') }}" >Valider le changement</a>
                <a href="http://projetcinq/index.php/refusethechange?id={{ value.getId }}&token={{ request.getSession('token') }}" >Refuser le changement</a>
            {% endfor %}
        {% else %}
            <p>Désolé, il n'y a rien à valider!</p>
        {% endif %}
    </section>
{% endblock %}
