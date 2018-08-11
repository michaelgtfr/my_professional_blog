<!-- head -->

<?php $title= "home page" ?>

<?php $style='<link rel="stylesheet" href="http://projetcinq/css/home_page_style.css" />' ?>

<!--body-->

<?php ob_start(); ?>

<div class="container">
<section class= "presentation row">
	<div class="col-sm-12"> 
		<div class="col-sm-3">
			<p><img src="img/photo_profil.jpg" alt="photo de profil" width="100%" height="100%" /></p>
		</div>
		<div class="col-sm-9">
			<div class="titlePresentation  col-sm-12" >  
				<p>Je me Présente :</p>
			</div>
			<div class="col-sm-6">
				<p> Bonjour, je m'appelle michael et ici vous étes sur mon blog professionnel. Je suis actuellement en formation diplomante au titre de developpeur PHP/Symfony. Si vous voulais plus de renseignement à mon sujet cliqué sur la case PDF ou envoyer moi un message en utilisant le formulaire de contact ci-dessous. Sinon ceci est un blog créer par moi que vous pouvez visiter voir vous inscrire pour contribuer ou avoir un visuel sur mes qualifications. Il ne me reste plus qu'a vous dire bonne visite. Domaine lier à mes connaissance:</p>
			</div>
			<div class="col-sm-3">
				<ul>
					<li>HTML (niveau 1 sur 3)</li>
					<li>CSS (niveau 1 sur 3)</li>
					<li>PHP (niveau 1 sur 3)</li>
					<li>SQL (niveau 1 sur 3)</li>
					<li>Javascript (notion)</li>
					<li>Boostrap (niveau 1 sur 3)</li>
				</ul>
			</div>
			<div class="blockCV col-sm-3">  
				<a href="img/cv_michael.pdf"><i class="fa fa-file-pdf-o fa-3x"></i></a>
			</div>
		</div>
	</div>
</section>
<section class= "lastAddition row"> 
	<div class="titleLastAddition col-sm-12">
		<h4>Les trois derniers ajouts:</h4>
	</div>
	<div class="post">
		<?php
		if(isset($returnMessages))
		{
			while ($data = $returnMessages->fetch()) 
			{
			?>
				<div class="blogpost">
					<div class="picture">
						<p><img src=" <?='http://projetcinq/img/imgPost/'.htmlspecialchars($data['name']).'.'. htmlspecialchars($data['extention']) ?>" alt=" <?= htmlspecialchars($data['description']) ?>" /></p>
					</div>
					<div class="titlePost">
						<h6><?= htmlspecialchars($data['title']) ?></h6>
					</div>
					<div class="chapo">
						<p><?= htmlspecialchars($data['chapo']) ?></p>
					</div>
					<div class="authorPost">
						<p><?= htmlspecialchars($data['author']) ?></p>
					</div>
					<div class="lien">
						<p><a href="http://projetCinq/index.php/articledetail/<?= $data['id'] ?>">Voir l'article</a></p>
					</div>
				</div>
			<?php
			}
			$returnMessages->closeCursor ();
		}
		else
		{
		?>
		<p class="noArticle">Désolé mais il y a pas d'article disponible sur le blog</p>
		<?php
		}
		?>
	</div>
</section>
<section class="formContact row">
	<h4>Formulaire de contact</h4>
	<form action="contactForm.php" method="post" class="col-sm-12"> 
		<p>
			<div class="col-sm-offset-2 col-sm-3 form-group">
				<label for="name">Nom : </label><input type="text" class="form-control" id="name" placeholder="ex: stella" />
			</div>
			<div class="email col-sm-offset-2 col-sm-3 form-group">
				<label for="email">Email : </label><input type="email" class="form-control" id="name" value="ex: quelquechose@hotmail.fr" />
			</div>
			<div class="message col-sm-12 form-group">
				<label for="message">Message : </label><textarea class="form-control" id="message" rows="10" cols="50">Ecrivez ici votre message</textarea>
			</div>
			<div class="validation col-sm-12 form-group"> 
				<input type="submit" class="btn btn-danger" name="Validate" value="valider" />
            </div>   
		</p>
	</form>
</section>
</div>

	<?php $content = ob_get_clean(); ?>


<?php require __DIR__.'/template.php'; ?>