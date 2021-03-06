{% extends "template.html" %}

{% block title %}Registration page{% endblock %}
{% block style %}<link rel="stylesheet" href="http://projetcinq/css/registrationPage.css" />{% endblock %}

{% block content %}
<!--body: Page displaying the registration form -->

	{% if message is defined %}
    	<p>{{ message }}
	{% endif %}

<section class="row">
    <form action="/index.php/postregistration" method="post" enctype="multipart/form-data" class="col-sm-4 col-sm-offset-4">
        <p>
            <div class="name form-group">
                <label for="name">Nom : </label><input type="text" name="name" id="name" class="form-control" placeholder="loka" />
            </div>
            <div class="firstname form-group">
                <label for="firstname">Prénom : </label><input type="text" name="firstname" id="firstname" class="form-control" placeholder="naomie" />
            </div>
            <div class="email form-group">
                <label for="email">Email : </label><input type="email" name="email" id="email" class="form-control" placeholder="coucou62@gmail.com" />
            </div>
            <div class="passwordOne form-group">
                <label for="passwordOne">Mot de passe : </label><input type="password" name="passwordOne" id="passwordOne" class="form-control" value="13245" />
            </div>
            <div class="passwordTwo form-group">
                <label for="passwordTwo">Réecrivez votre mot de passe : </label><input type="password" name="passwordTwo" id="passwordTwo" class="form-control" value="12345" />
            </div>
            <div class="photo form-group">
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                <label for="photo">Photo/Logo (max 1Mo, JPG, PNG) : </label><input type="file" name="photo" id="photo" class="form-control" />
            </div>
            <div class="presentation form-group">
                <label for="presentation">Présentation :</label><textarea class="form-control" name="presentation" id="presentation" rows="10" cols="50">Ecrivez votre présentation ici</textarea>
            </div>
            <div class="validate col-sm-12 form-group">
                <button class="btn btn-danger" type="submit">valider</button>
            </div>
        </p>
    </form>
{% endblock %}
