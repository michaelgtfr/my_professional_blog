{% extends "template.html" %}

{% block title %}Detail item no validate{% endblock %}
{% block style %}<link rel="stylesheet" href="http://projetcinq/css/detailArticleNoValidate.css" />{% endblock %}

{% block content %}
<!--body: Show the detail of an unreleased article-->
	<section class="validateArticle container">
		<div class="row">
    		<h3 class="col-sm-12">Validation des articles: Detail de l'article</h3>
    		<p class="titleItems col-sm-12">{{ article.getTitle }}</p>
    		<img class="col-sm-8 col-sm-offset-2" src="http://projetcinq/img/imgPost/{{ article.getNamePicture }}.{{ article.getExtentionPicture }}" alt="{{ article.getDescriptionPicture }}" width="100%" />
        	<p class="chapoItems col-sm-12">{{ article.getChapo }}</p>
        	<p class="contentItems col-sm-12">{{ article.getContent }}</p>
        	<p class="firstNameItems col-sm-12">Créer par {{ article.getFirstName }}, le {{ article.getDateUpdate }}</p>
    	</div>
	</section>
{% endblock %}
