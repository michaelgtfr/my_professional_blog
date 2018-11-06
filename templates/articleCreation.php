<?php $title = 'item creation' ?>
<?php $style ='<link rel="stylesheet" href="/css/articleCreation.css" />' ?>

<!--body: Form for creating an article -->
<?php ob_start(); ?>

<section class="formulaire">
    <h3>Formulaire de création d'article</h3>
    <form action="/index.php/postarticlecreation" method="post" enctype="multipart/form-data">
        <div>
            <input type="hidden" name="id" value="<?= $data['request']->getSession('id') ?>" />
            <label for="title">Titre:</label><input type="text" name="title" id="title" />
            <label for="chapo">Chapo:</label><input type="text" name="chapo" id="chapo" />
            <label for="content">Contenu:</label><textarea name="content" id="content">Ecrivez ici votre message</textarea>
            <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
            <label for="photo">Photo/Logo (max 2Mo, JPG, PNG) : </label><input type="file" name="photo" id="photo" />
            <label for="description">Description de la photo:</label><input type="text" name="description" id="description" />
            <button type="submit">Valider</button>
        </div>
    </form>
</section>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__.'/template.php'; ?>
