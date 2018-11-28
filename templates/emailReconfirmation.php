{% extends "template.html" %}

{% block title %}Email of reconfirmation{% endblock %}
{% block style %}<link rel="stylesheet" href="http://projetcinq/css/emailReconfirmation.css" />{% endblock %}

{% block content %}
<!--body: Displays the reconfirmation form for an user email-->
	<section>
    	<form action="/index.php/postEmailReconfirmation" method="post" />
        	<p>
            	<label for="email">email</label><input type="email" name="email" id="email" value="{{ email }}" />
            	<input type="hidden" name="previousEmail" value="{{ email }}" />
            	<button type="submit">valider</button>
        	</p>
    	</form> 
	</section>
{% endblock %}
