{% extends "template.html" %}

{% block title %}Item modify{% endblock %}
{% block style %}<link rel="stylesheet" href="http://projetcinq/css/modifyArticle.css" />{% endblock %}

{% block content %}
<!--body: Page de modification d'un article déjà validé-->
	<section class="formulaire container">
		<div class="row">
			<h3 class="col-sm-12">Modification de l'article</h3>
			<form action="/index.php/postmodifyarticle" method="post" enctype="multipart/form-data">
				<div class="col-sm-12 form-group">
		    		<label for="title">Titre:</label><input class="form-control" type="text" name="title" id="title" value="{{ data.getTitle }}" />
				</div>
				<div class="col-sm-12 form-group">
		    		<label for="chapo">Chapo:</label><input class="form-control" type="text" name="chapo" id="chapo" value="{{ data.getChapo }}" />
				</div>
				<div class="col-sm-12 form-group">
		    		<label for="content">Contenu:</label><textarea class="form-control" name="content" id="content" rows="10" cols="100">{{ data.getContent }}</textarea>
	    		</div>
	    		<div class="col-sm-12 form-group">
		    		<img src="http://projetcinq/img/imgPost/{{ data.getNamePicture }}.{{ data.getExtentionPicture }}"/>
				</div>
				<div class="col-sm-12 form-group">
		    		<input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
		    		<label for="picture">Image (max: 2MO , JPG, PNG):</label><input type="file" name="picture" id="picture" class="form-control" />
				</div>
				<div class="col-sm-12 form-group">
		    		<label for="description">Description de la photo:</label><input type="text" name="description" id="description" value="{{ data.getDescriptionPicture }}" class="form-control" />
				</div>
				<input type="hidden" name="author" value="{{ request.getSession('id') }}" />
				<input type="hidden" name="blogPost" value="{{ data.getId }}" />
				<input type="hidden" name="token" id="token" value="{{ request.getSession('token') }}" />
				<div class="validate">
					<button class="btn btn-danger" type="submit">Valider</button>
				</div>
			</form>
		</div>
	</section>
{% endblock %}
