{% extends "template.html" %}

{% block title %}Reset her password{% endblock %}
{% block style %}<link rel="stylesheet" href="http://projetcinq/css/resetPassword.css" />{% endblock %}

{% block content %}
<!--body: Site Registration page -->
    <section class='body container'>
        <div class='row'>
            {% if message is defined %}
                <p class="col-sm-12">{{ message }}</p>
            {% endif %}
        </div>
	    <div>
    	    <form action="/index.php/postresetpassword" method="post" />
        	    <p>
                    <div class="form-group">
            	       <label for="email">email</label><input class="form-control" type="email" name="email" id="email" placeholder="ex: coucou@gmail.com" />
                    </div>
                    <div class="form-group">
            	       <label for="name">nom:</label><input class="form-control" type="text" name="name" id="name" />
                    </div>
                    <div class="form-group">
            	       <label for="passwordOne">nouveau mot de passe:</label><input class="form-control" type="password" name="passwordOne" id="passwordOne" />
                    </div>
                    <div class="form-group">
            	       <label for="passwordTwo">ré-écrivez votre nouveau mot de passe:</label><input class="form-control" type="password" name=passwordTwo id="passwordTwo" /> 
                    </div>
                    <div class="validate form-group">
            	        <button class="btn btn-danger" type="submit">valider</button>
                    </div>
        	    </p>
    	    </form>
        </div> 
	</section>
{% endblock %}