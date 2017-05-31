/**
* Created by PhpStorm.
* User: Thibault
* Date: 28/05/2017
* Time: 01:40
*/
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
            <li><a href="/">Accueil</a></li>

        </ul>
    </nav>

    <div id="content-wrap">
        <section id="main">


            <?= $content ?>
        </section>
    </div>

    <footer></footer>
</div>
</body>
</html>