<?php
$title = 'minimalistica';
$h1 = 'minimalistica';
$year = date('Y');
$menu = [
    ['name' => 'home', 'link' => '/', 'submenu' => ''],
    ['name' => 'archive', 'link' => '/archive/', 'submenu' => [
        ['name' => 'archive1', 'link' => '/archive1/'],
        ['name' => 'archive2', 'link' => '/archive2/'],
    ]],
    ['name' => 'contact', 'link' => '/contact/', 'submenu' => ''],
];
$masFiles = scandir('img');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="author" content="Luka Cvrk (www.solucija.com)"/>
    <link rel="stylesheet" href="css/main.css" type="text/css"/>
    <link rel="stylesheet" href="css/modal.css" type="text/css"/>
    <title><?= $title; ?></title>
</head>
<body>
<div id="content">
    <h1><?= $h1; ?></h1>

    <ul id="menu">
        <? foreach ($menu as $menuItem) {
            ?>
            <li>
                <a href="<?= $menuItem['link']; ?>"><?= $menuItem['name']; ?></a>
                <?
                if ($menuItem['submenu']) { ?>
                    <ul>
                        <? foreach ($menuItem['submenu'] as $subMenuItem) { ?>
                            <li>
                                <a href="<?= $subMenuItem['link']; ?>"><?= $subMenuItem['name']; ?></a>
                            </li>
                            <?
                        } ?>
                    </ul>
                    <?
                } ?>
            </li>
            <?
        }
        ?>
    </ul>

    <div class="gallery">
        <? foreach ($masFiles as $key => $filePath) {
            if ($key > 1) { ?>
                <div class="image"><a href="img/<?= $filePath ?>" class="galleryItem"><img src="img/small/<?= $filePath ?>" alt=""
                                                                       width="100"></a></div>
            <? }
        } ?>
    </div>
    <div class="post">
        <div class="details">
            <h2><a href="#">Nunc commodo euismod massa quis vestibulum</a></h2>
            <p class="info">posted 3 hours ago in <a href="#">general</a></p>

        </div>
        <div class="body">
            <p>Nunc eget nunc libero. Nunc commodo euismod massa quis vestibulum. Proin mi nibh, dignissim a
                pellentesque at, ultricies sit amet sapien. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Quisque vel lorem eu libero laoreet facilisis. Aenean placerat, ligula quis placerat iaculis, mi magna
                luctus nibh, adipiscing pretium erat neque vitae augue. Quisque consectetur odio ut sem semper commodo.
                Maecenas iaculis leo a ligula euismod condimentum. Cum sociis natoque penatibus et magnis dis parturient
                montes, nascetur ridiculus mus. Ut enim risus, rhoncus sit amet ultricies vel, aliquet ut dolor. Duis
                iaculis urna vel massa ultricies suscipit. Phasellus diam sapien, fermentum a eleifend non, luctus non
                augue. Quisque scelerisque purus quis eros sollicitudin gravida. Aliquam erat volutpat. Donec a sem
                consequat tortor posuere dignissim sit amet at ipsum.</p>
        </div>
        <div class="x"></div>
    </div>

    <div class="col">
        <h3><a href="#">Ut enim risus rhoncus</a></h3>
        <p>Quisque consectetur odio ut sem semper commodo. Maecenas iaculis leo a ligula euismod condimentum. Cum sociis
            natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut enim risus, rhoncus sit amet
            ultricies vel, aliquet ut dolor. Duis iaculis urna vel massa ultricies suscipit. Phasellus diam sapien,
            fermentum a eleifend non, luctus non augue. Quisque scelerisque purus quis eros sollicitudin gravida.
            Aliquam erat volutpat. Donec a sem consequat tortor posuere dignissim sit amet at.</p>
        <p>&not; <a href="#">read more</a></p>
    </div>
    <div class="col">
        <h3><a href="#">Maecenas iaculis leo</a></h3>
        <p>Quisque consectetur odio ut sem semper commodo. Maecenas iaculis leo a ligula euismod condimentum. Cum sociis
            natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut enim risus, rhoncus sit amet
            ultricies vel, aliquet ut dolor. Duis iaculis urna vel massa ultricies suscipit. Phasellus diam sapien,
            fermentum a eleifend non, luctus non augue. Quisque scelerisque purus quis eros sollicitudin gravida.
            Aliquam erat volutpat. Donec a sem consequat tortor posuere dignissim sit amet at.</p>
        <p>&not; <a href="#">read more</a></p>
    </div>
    <div class="col last">
        <h3><a href="#">Quisque consectetur odio</a></h3>
        <p>Quisque consectetur odio ut sem semper commodo. Maecenas iaculis leo a ligula euismod condimentum. Cum sociis
            natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut enim risus, rhoncus sit amet
            ultricies vel, aliquet ut dolor. Duis iaculis urna vel massa ultricies suscipit. Phasellus diam sapien,
            fermentum a eleifend non, luctus non augue. Quisque scelerisque purus quis eros sollicitudin gravida.
            Aliquam erat volutpat. Donec a sem consequat tortor posuere dignissim sit amet at.</p>
        <p>&not; <a href="#">read more</a></p>
    </div>

    <div id="footer">
        <p><?= $year; ?> Copyright &copy; <em>minimalistica</em> &middot; Design: Luka Cvrk, <a
                    href="http://www.solucija.com/" title="Free CSS Templates">Solucija</a></p>
    </div>
</div>
<div id="modal_form"><!-- Сaмo oкнo -->
    <span id="modal_close">X</span> <!-- Кнoпкa зaкрыть -->
</div>
<div id="overlay"></div><!-- Пoдлoжкa -->
<script
        src="http://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script src="js/script.js"></script>
</body>
</html>
