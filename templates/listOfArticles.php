{% extends "template.html" %}

{% block title %}List of articles{% endblock %}
{% block style %}<link rel="stylesheet" href="http://projetcinq/css/listOfArticle.css" />{% endblock %}

{% block content %}
<!--body: Displays the list of articles on the website-->
<section class="container">
    <div class="list row">
        <div class="items col-sm-12">
            {% for value in message %}
                <div class="article col-sm-12">
                    <img class="blockOne col-sm-4" src="http://projetcinq/img/imgPost/{{ value.getNamePicture }}.{{ value.getExtentionPicture }}" alt="{{ value.getDescriptionPicture }}" />
                    <div class="blockTwo col-sm-5">
                        <h3 class="col-sm-12">{{ value.getTitle }}</h3>
                        <p class="col-sm-12">{{ value.getChapo }}</p>
                    </div>
                    <div class="blockThree col-sm-3">
                        <p class="col-sm-12">Créer par {{ value.getFirstName }}</p>
                        <a class="col-sm-12 btn btn-danger" href="/index.php/articledetail/{{ value.getId }}">Voir le detail</a><br />
                    </div>
                </div>
            {% endfor %}
        </div>
        <div class="page col-sm-12">
            {% for i in 1..numberOfPages %}
                {% if i == currentPage %}      
                    <p class="page">{{ i }}</p> 
                {% else %}    
                    <a class="pagination" href="index.php/listofarticles/page={{ i }}">{{ i }}</a>
                {% endif %}
            {% endfor %}
        </div>
    </div>
</section>
{% endblock %}
