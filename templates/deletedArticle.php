{% extends "template.html" %}

{% block title %}deleted an article{% endblock %}
{% block style %}<link rel="stylesheet" href="http://projetcinq/css/deletedArticle.css" />{% endblock %}

{% block content %}
<!--body: Validation of an article deletion-->
	<section class="confirmation container">
		<div class="row">
    		<p>Etes vous sur de vouloir effacer cet article</p>
    		<div class="col-sm-12">
    			<a class="col-sm-3 col-sm-offset-2 btn btn-danger" href="http://projetcinq/index.php/articledetail/{{ request }}">Annuler</a>
    			<a class="col-sm-3 col-sm-offset-2 btn btn-danger" href="http://projetcinq/index.php/postdeletedarticle/{{ request }}">Supprimer</a>
    		</div>
    	</div>
	</section>
{% endblock %}
