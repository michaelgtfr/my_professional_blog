{% extends "template.html" %}

{% block title %}item creation{% endblock %}
{% block style %}<link rel="stylesheet" href="/css/articleCreation.css" />{% endblock %}

{% block content %}
    <!--body: Form for creating an article -->
    <section class="formulaire container">
        <div class="row">
            <h3 class="col-sm-12">Formulaire de création d'article</h3>
            <form action="/index.php/postarticlecreation" method="post" enctype="multipart/form-data" class="col-sm-12">
                <div class="form-group">
                    <input type="hidden" name="id" value="{{ request.getSession('id') }}" />
                    <input type="hidden" name="token" value="{{ request.getSession('token') }}" />
                    <label for="title">Titre:</label><input type="text" name="title" id="title" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="chapo">Chapo:</label><input type="text" name="chapo" id="chapo" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="content">Contenu:</label><textarea name="content" id="content" class="form-control" rows="30">Ecrivez ici votre message</textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                    <label for="photo">Photo/Logo (max 2Mo, JPG, PNG) : </label><input type="file" name="photo" id="photo" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="description">Description de la photo:</label><input type="text" name="description" id="description" class="form-control"/>
                </div>
                <div class="validate form-group">
                    <button class="btn btn-danger" type="submit">Valider</button>
                </div>
            </form>
        </div>
    </section>
{% endblock %}