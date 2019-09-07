{% extends "template.html" %}

{% block title %}Message page{% endblock %}
{% block style %}<link rel="stylesheet" href="http://projetcinq/css/message.css" />{% endblock %}

{% block content %}
<!--body: Page of message-->
	<section>
		<p>{{ message }}</p>
	</section>
{% endblock %}
