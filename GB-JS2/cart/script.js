
$('#resetUser').click(function () {
    localStorage.removeItem('userId')
});
console.log(localStorage.getItem('userId'));


const BASE_URL = 'http://89.108.65.123:8080';
let userId = null;

function createCart() {
    $.ajax({
        url: BASE_URL + '/shop',
        success: function (shop) {
            let user = shop['user_id'];
            userId = localStorage.getItem('userId');
            if (!(userId && confirm(`Использовать корзину пользователя ${userId}?`))) {
                localStorage.setItem('userId', `${user}`);
            }
            userId = localStorage.getItem('userId');
        },
        error: function (err) {
            console.error(err);
        }
    })
}

function createProduct(productData) {
    $.ajax({
        url: BASE_URL + '/shop?user_id=' + productData.user_id + '&product=' +
            productData.product + '&price=' + productData.price,
        method: 'POST',
        success: function (product) {
            console.log(product)
            showCart();
        },
        error: function (err) {
            console.error(err)
        }
    })

}

function showCart() {
    $('.cart').html(''); //Очищаем html корзины
    $('.cart').html(
        `<div class="row">
                <div class="productId col-3">ID товара</div>
                <div class="product col-6">Название товара</div>
                <div class="price col-3">Цена</div>
            </div>`
    );
    $.ajax({
        url: BASE_URL + `/shop?user_id=${userId}`,
        success: function (shop) {
            $(shop.cart).each(function (i, val) {
                let cartRow = $(
                    `<div class="row productRow">
                            <div class="productId col-3">${val.product_id}</div>
                            <div class="product col-6">${val.product}</div>
                            <div class="price col-2">${val.price}</div>
                            <a href="#" data-product="${val.product_id}" class="col-1 removeProduct" title="Удалить товар из корзины">x</a>
                        </div>`
                );
                $('.cart').append(cartRow);
            })
            $('.removeProduct').click(removeProduct);
        },
        error: function (err) {
            console.error(err);
        }
    })
}

function removeProduct() {
    let productId = $(this).attr('data-product');
    $.ajax({
        url: BASE_URL + `/shop?user_id=${userId}&product_id=${productId}`,
        method: 'DELETE',
        success: function (shop) {
            console.log(shop);
            showCart(userId);
        },
        error: function (err) {
            console.error(err);
        }
    })
}

createCart();

$('.product-form').on('submit', function (event) {
    event.preventDefault();
    let $this = $(this);
    let productData = {
        user_id: userId,
        product: $this.find('#product').val(),
        price: $this.find('#price').val(),
    };
    createProduct(productData);
});

// Модуль комментариев
function addComment(text) {
    $.ajax({
        url: BASE_URL + '/comments?text=' + text,
        method: 'POST',
        success: function (comment) {
            console.log(comment);
            getComments();
        },
        error: function (err) {
            console.error(err)
        }
    })
}

// Получение всех комментариев
function getComments() {
    $('.comments').html(''); //Очистка html списка комментариев
    $.ajax({
        url: BASE_URL + '/comments',
        success: function (comment) {
            $(comment).each(function (i, val) {
                let commentRow = $(
                    `<div class="row">
                            <div class="commentId col-2">${val.comment_id}</div>
                            <div class="text col-8">${val.text}</div>
                            <div data-comment="${val.comment_id}" class="likes col-1 row">
                                <div class="like_button_icon"></div>
                                <div class="like_value">${val.likes}</div>
                            </div>
                            <div class="col-1">
                                <a href="#" data-comment="${val.comment_id}" class="removeComment" title="Удалить комментарий">x</a>
                            </div>
                        </div>`
                );
                $('.comments').append(commentRow);
            })
            $('.likes').click(addLike);
            $('.removeComment').click(removeComment);
        },
        error: function (err) {
            console.error(err)
        }
    })
}

// Добавление лайка
function addLike() {
    let commentId = $(this).attr('data-comment');
    console.log(commentId);
    $.ajax({
        url: BASE_URL + '/comments?comment_id=' + commentId,
        method: 'PATCH',
        success: function (comment) {
            console.log(comment);
            getComments();
        },
        error: function (err) {
            console.error(err)
        }
    })
}

// Удаление комментария
function removeComment() {
    let commentId = $(this).attr('data-comment');
    $.ajax({
        url: BASE_URL + '/comments?comment_id=' + commentId,
        method: 'DELETE',
        success: function (comment) {
            console.log(comment);
            getComments();
        },
        error: function (err) {
            console.error(err)
        }
    })
}

$('.comment-form').on('submit', function (event) {
    event.preventDefault();
    let $this = $(this);
    let commentData = $(this).find('#comment').val();
    addComment(commentData);
});