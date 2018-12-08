{% extends "template.html" %}

{% block title %}List of user account no validate{% endblock %}
{% block style %}<link rel="stylesheet" href="http://projetcinq/css/userAccountManagement.css" />{% endblock %}

{% block content %}
<!--body: Page showing user account to posted-->
    <section class="section container">
        <div class="row">
            <p class="message col-sm-12">{{ message }}</p>
            {% if user %}
                {% for value in user %}
                    <div class="user col-sm-3">
                        <img class="imgUser col-sm-12" src="http://projetcinq/img/avatar/{{ value.getPhoto }}" width="100%" />
                        <p class="col-sm-6"><span>Nom:</span> {{ value.getName }}</p>
                        <p class="col-sm-6"><span>Prénom:</span> {{ value.getFirstName }}</p>
                        <p class="col-sm-12"><span>Présentation:</span> {{ value.getPresentation }}</p>
                        <p class="col-sm-12"><span>créer le {{ value.getDateCreate }}</span></p>
                        <a class="validate col-sm-12 btn btn-danger" href="http://projetcinq/index.php/useraccountvalidate?id={{ value.getId }}&token={{ request.getSession('token') }}">Valider le compte</a>
                        <a class="reject col-sm-12 btn btn-danger" href="http://projetcinq/index.php/useraccountreject?id={{ value.getId }}&token={{ request.getSession('token') }}">Refuser le compte</a>
                    </div>
                {% endfor %}
            {% else %}
                <p>Désoler il y n'a rien à juger!</p>
            {% endif %}
        </div>
    </section>
{% endblock %}
