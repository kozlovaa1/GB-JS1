<?php
include_once "../models/db_goods.php";
CONST TITLE = 'Магазинчик волшебства';
include "../templates/header.php"; ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Главная</a></li>
        <li class="breadcrumb-item active" aria-current="page">Каталог</li>
    </ol>
</nav>
<h1>Каталог товаров</h1>
<hr>

<?php
$goods = goods_all($link);
if ($goods) {
    foreach ($goods as $good) {
        ?>
        <div class="item">
            <a href="item.php?id=<?= $good['id'] ?>"><img src="<?= $good['small_src'] ?>" alt="<?= $good['name'] ?>"
                                                          title="<?= $good['name'] ?>"></a>
            <h3 class="item-name"><a href="item.php?id=<?= $good['id'] ?>"><?= $good['name'] ?></a></h3>
            <p class="price"><?= $good['price'] ?>р.</p>
            <p class="add-to-basket"><a href="#" title="Добавить в корзину">Купить</a></p>
        </div>
    <?
    }
}

if (empty($newsData)) {
// если новостей нет
    echo json_encode(array(
        'result' => 'finish'
    ));
} else {
// если новости получили из базы, то сформируем html элементы
// и отдадим их клиенту
    $html = "";
    foreach ($newsData as $oneNews) {
        $html .= "
<div>
    <b>{$oneNews['title']}</b>
    <p>{$oneNews['small_text']}</p>
</div>
";
    }
    echo json_encode(array(
        'result' => 'success',
        'html' => $html
    ));
} ?>
</div>
<footer>
    <? include "../templates/footer.php"; ?>
</footer>
</div>
</body>
</html>