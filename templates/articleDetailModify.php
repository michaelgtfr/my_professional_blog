{% extends "template.html" %}

{% block title %}Item detail{% endblock %}
{% block style %}<link rel="stylesheet" href="http://projetcinq/css/articleDetailModify.css" />{% endblock %}

{% block content %}
<!--body: Detail of the modification of an article-->
	<h3>{{ article.getTitle }}</h3>
	<p><img src="http://projetcinq/img/imgPost/{{ article.getNamePicture }}.{{ article.getExtentionPicture }}" alt="{{ article.getDescriptionPicture }}" /></p>
	<p>{{ article.getChapo }}</p>
	<p>{{ article.getContent }}</p>
	<p>{{ article.getFirstName }}</p>
{% endblock %}
