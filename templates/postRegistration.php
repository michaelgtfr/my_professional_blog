{% extends "template.html" %}

{% block title %}success post Registration page{% endblock %}
{% block style %}<link rel="stylesheet" href="http://projetcinq/css/postRegistration.css" />{% endblock %}

{% block content %}
<!--body: Page displaying the registration Success message plus a reconfirmation link of the email -->
	<section class="message">
    	<p>{{ message }}</p>
    	<p>si le message n'a pas été envoyer <a href="http://projetCinq/index.php/emailreconfirmation?email={{ request.getPOST('email') }}">cliquer ici</a></p>
	</section>
{% endblock %}