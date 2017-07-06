<!DOCTYPE html>
<html>
<head>
    <title>
        <?= isset($title) ? $title : 'Arthylene' ?>
    </title>

    <meta charset="utf-8"/>

    <link rel="stylesheet" href="/css/Envision.css" type="text/css"/>
</head>

<body>
<div id="wrap">
    <header>
        <h1><a href="/">Arthylene</a></h1>
    </header>

    <nav>
        <ul>
            <?php if ($user->isAuthenticated()) { ?>
                <li><a href="/admin/">Accueil</a></li>
                <li><a href="/admin/produit-insert.html">Ajouter un produit</a></li>
                <li><a href="/admin/label-insert.html">Ajouter une etiquette</a></li>
                <li><a href="/admin/checklist-insert.html">Ajouter un item</a></li>
                <li><a href="/admin/signOut.html">Deconnexion</a></li>
            <?php } else { ?>
                <li><a href="/">Accueil</a></li>
                <li><a href="/admin/">Connexion</a></li>
            <?php } ?>
        </ul>
    </nav>

    <div id="content-wrap">
        <section id="main">
            <?php if ($user->hasFlash()) echo '<p style="text-align: center;">', $user->getFlash(), '</p>'; ?>

            <?= $content ?>
        </section>
    </div>

    <div id="sidebar">
        <h3>Accueil</h3>
        <?php if ($user->isAuthenticated()) { ?>
            <ul><a href="/admin/produit.html">Liste des produits</a></ul>
            <ul><a href="/admin/label.html">Liste des etiquettes</a></ul>
            <ul><a href="/admin/checklist.html">Liste des items</a></ul>
        <?php } else { ?>
            <ul><a href="/produit.html">Liste des produits</a></ul>
            <ul><a href="/label.html">Liste des etiquettes</a></ul>
            <ul><a href="/checklist.html">Liste des items</a></ul>
        <?php } ?>
    </div>

    <footer></footer>
</div>
</body>
</html>