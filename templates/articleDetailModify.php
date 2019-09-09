{% extends "template.html" %}

{% block title %}Item detail{% endblock %}
{% block style %}<link rel="stylesheet" href="http://projetcinq/css/articleDetailModify.css" />{% endblock %}

{% block content %}
<!--body: Detail of the modification of an article-->
	<section class="section container">
		<div class="row">
			<h3 class="titleSection col-xs-12">{{ article.getTitle|raw }}</h3>
			<p><img class="col-xs-12" src="http://projetcinq/img/imgPost/{{ article.getNamePicture }}.{{ article.getExtentionPicture }}" alt="{{ article.getDescriptionPicture }}" /></p>
			<p class="chapoSection col-xs-12">{{ article.getChapo|raw }}</p>
			<p class="contentSection col-xs-12">{{ article.getContent|raw }}</p>
			<p class="author col-xs-12">Créer par {{ article.getFirstName }}</p>
		</div>
	</section>
{% endblock %}
