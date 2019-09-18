{% extends "template.html" %}

{% block title %}Update her profil{% endblock %}
{% block style %}<link rel="stylesheet" href="http://projetcinq/css/updateHerProfil.css" />{% endblock %}

{% block content %}
<!--body: Page displaying the profile modification form -->
    <section class="body container">
        <div class="row">
            <h3 class="titleBlock col-xs-12">Modification du profil:</h3>
            <img class="col-xs-12 col-sm-6 col-sm-offset-3" src="http://projetcinq/img/avatar/{{ user.getPhoto }}" alt="photo de profil" />
            <div class="col-sm-8 col-sm-offset-2">
                <form action="/index.php/postupdateherprofil" method="post" enctype="multipart/form-data">
                    <div class="col-xs-12 form-group">
                        <label for="name">Nom:</label><input class="form-control" type="text" name="name" id="name" value="{{ user.getName }}" />
                    </div>
                    <div class="col-xs-12 form-group">
                        <label for="firstName">prenom:</label><input class="form-control" type="text" name="firstName" id="firstName" value="{{ user.getFirstName }}" />
                    </div>
                    <div class="col-xs-12 form-group">
                        <label for="email">Email:</label><input class="form-control" type="email" name="email" id="email" value="{{ user.getEmail }}" />
                    </div>
                    <div class="col-xs-12 form-group">
                        <label for="presentation">presentation:</label><input class="form-control" type="text" name="presentation" id="presentation" value="{{ user.getPresentation|raw }}"/>
                    </div>
                    <input type="hidden" name="maxFileSize" value="1048576" />
                    <div class="col-xs-12 form-group">
                        <label for="photo">Photo/Logo (max 1Mo, JPG, PNG) : </label><input class="form-control" type="file" name="photo" id="photo" />
                    </div>
                    <input type="hidden" name="avatar" value="{{ user.getphoto }}" />
                    <input type="hidden" name="token" id="token" value="{{ request.getSession('token') }}" />
                    <div class="validate col-xs-12 form-group">
                        <button class="btn btn-danger" type="submit">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
{% endblock %}
