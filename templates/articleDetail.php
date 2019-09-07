{% extends "template.html" %}

{% block title %}Item detail{% endblock %}

{% block style %}<link rel="stylesheet" href="/css/articleDetail.css" />{% endblock %}

{% block content %}
<!--body: Detail of an article-->
<section class="articleDetail container">
	{% if request.getSession('id') and request.getSession('email') and request.getSession('role') %}
    	<nav class="adminNav row">
        	<div class="Modify col-xs-6">
            	<a class="btn btn-danger" href="http://projetcinq/index.php/modifyarticle/{{ article.getId }}">Modifier l'article</a>
        	</div>
	{% endif %}
	{% if request.getSession('role') == 'administrateur' %}
            <div class="deleted col-xs-6">
                <a class="btn btn-danger" href="http://projetcinq/index.php/deletedarticle/{{ article.getId }}">Supprimer l'article</a>
            </div>
        </nav>
	{% endif %}

	<section class="article row">
    	{% if message is defined %}
        	<p class="col-xs-12">{{ message }}</p>
    	{% endif %}

    	<h3 class="col-xs-12">{{ article.getTitle }}</h3>
    	<img class="col-sm-8 col-sm-offset-2" src="http://projetcinq/img/imgPost/{{ article.getNamePicture }}.{{ article.getExtentionPicture }}" alt="{{ article.getDescriptionPicture }}" width="100%" />
    	<p class="chapoItems col-xs-12">{{ article.getChapo }}</p>
    	<p class="contentItems col-xs-12">{{ article.getContent }}</p>
    	<p class="col-xs-12">Créer par {{ article.getFirstName }}, le {{ article.getDateCreate }}</p>
	</section>
	<section class="commentary row">
        <h3>Les Commentaires</h3>
        <div class="commentaryBlock col-sm-6 col-sm-offset-3 col-xs-12">
    	{% for values in comment %}
        	<p class="contentComment col-xs-12">{{ values.getContentComment }}</p>
        	<p class="authorComment col-xs-12">Créé par {{ values.getAuthorComment }} le {{ values.getDateCreateComment }}</p>
    	{% endfor %}
        </div>
	</section>
	<section class="formComment row">
        <h3>Formulaire de commentaire</h3>
    	<form class="col-xs-12" action="/index.php/formcomment" method="post">
            <div class="form-group col-sm-6">
        	   <label for="author">Pseudo:</label><input type="text" name="author" id="author" class="form-control" />
            </div>
            <div class="form-group col-sm-6">
        	   <label for="email">Email:</label><input type="email" name="email" id="email" class="form-control" />
            </div>
            <div class="form-group col-sm-8 col-sm-offset-2">
        	   <label for="content">Message:</label><textarea id="content" name="content" rows="10" class="form-control">écrivez votre texte ici</textarea>
            </div>
        	<input type="hidden" name="id" value="{{ article.getId }}" />
            <div class="validate form-group col-xs-12">
        	   <button class="btn btn-danger" type="submit">Valider</button>
            </div>
    	</form> 
	</section>
</section>
{% endblock %}
