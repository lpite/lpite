var cart = {}; //моя корзина


$('document').ready(function () {

    checkCart();
    showMiniCart();
    fullprice();
    

    window.onscroll = function () {
        myFunction()
    };
});

function checkCart() {
    try {
        const cart1 = document.cookie
            .split('; ')
            .find(row => row.startsWith('cart'))
            .split('=')[1];
    } catch {
        document.cookie = "cart=" + JSON.stringify(cart) + "; expires=01 Jan 2021 00:00:00 UTC;path=/";
    } finally {
        const cart1 = document.cookie
            .split('; ')
            .find(row => row.startsWith('cart'))
            .split('=')[1];
        cart = JSON.parse(cart1);
    }



}

function addToCart() {

    //добавляем товар в корзину

    var articul = $(this).attr('data-id');
    let check = document.getElementById(articul);

    if (check.classList.contains('hidden')) {
        var text = document.getElementById(articul + '.1').value / 1;
    } else {
        var text = document.getElementById(articul).value / 1;
    }

    if (cart[articul] != undefined) {
        cart[articul] += text;
    } else {
        cart[articul] = text;
    }

    save_cart();
    showMiniCart();
}

function save_cart() {
    
    document.cookie = "cart=" + JSON.stringify(cart) + "; expires=01 Jan 2021 00:00:00 UTC;path=/";
}

function showMiniCart() {
    //показываю содержимое корзины
    let cart_count = 0;
    for (var w in cart) {
        cart_count += cart[w];
    }
    $('.mini-cart').html(cart_count);
}

function set_sort() {
    //читаем из куки значенния select сортировки
    try {
        const sort = document.cookie
            .split('; ')
            .find(row => row.startsWith('sort'))
            .split('=')[1];
    } catch {
        document.cookie = "sort= a_z; expires=01 Jan 2021 00:00:00 UTC;path=/";
    } finally {
        const sort = document.cookie
            .split('; ')
            .find(row => row.startsWith('sort'))
            .split('=')[1];
        document.getElementById('select').value = sort;
    }
}

function set_pdonpg() {
    //читаем из куки значенния select количества товара
    try {
        const pdonpg = document.cookie
            .split('; ')
            .find(row => row.startsWith('pdonpg'))
            .split('=')[1];
    } catch {
        document.cookie = "pdonpg= 15; expires=01 Jan 2021 00:00:00 UTC;path=/";
    } finally {
        const pdonpg = document.cookie
            .split('; ')
            .find(row => row.startsWith('pdonpg'))
            .split('=')[1];
        document.getElementById('products-on-page').value = pdonpg;
    }
}


$('.buy-btn').on('click', addToCart);
$('.cart-input').on('change', function () {
    var articul = $(this).attr('data-id');
    c = document.getElementById(articul).value / 1;
    cart[articul] = c;
    save_cart();
    showMiniCart();
    fullprice();
});

$('.cart-delete').on('click', function () {
    var articul = $(this).attr('data-id');
    delete cart[articul];
    var cart_div = document.getElementById(articul + '.1');
    cart_div.classList.add("hidden");
    cart_div.classList.remove("tovar-div");
    save_cart();
    showMiniCart();
    fullprice();
});
$('.tovar-select').on('change', function () {
    var articul = $(this).attr('id');
    var value = document.getElementById(articul).value;
    if (value == '...') {
        document.getElementById(articul).classList.add('hidden');
        document.getElementById(articul + '.1').classList.remove('hidden');
    }
});
$('.page-tovar-select').on('change', function () {
    var articul = $(this).attr('id');
    var value = document.getElementById(articul).value;
    console.log(value);
    if (value == '...') {
        document.getElementById(articul).classList.add('hidden');
        document.getElementById(articul + '.1').classList.remove('hidden');
    }

});

function fullprice() {
    let full_price = 0;
    for (var w in cart) {
        let x = document.getElementById(w + '.2');
        let price = $(x).attr('data-price');
        let available = $(x).attr('data-available');
        if (available >= 1) {

            full_price += price * cart[w];
        }




    }
      
        $('.full-price').html(full_price);
}

$('.Sort').on('change', function () {
    let sort_value = document.getElementById('select').value;
    document.getElementById('btn').click();
    document.cookie = "sort= " + sort_value + "; expires=01 Jan 2021 00:00:00 UTC;path=/";
});

$('.products-on-page').on('change', function () {
    let pdonpg_value = document.getElementById('products-on-page').value;
    document.getElementById('products-on-page-button').click();
    document.cookie = "pdonpg= " + pdonpg_value + "; expires=01 Jan 2021 00:00:00 UTC;path=/";
});

$('.payment-radio-div').on('click', function () {
    var id = $(this).attr('id');
    document.getElementById(id + '.1').click();
});

const header_popup = document.getElementById("header-popup");
const search_div = document.getElementById("search-div");




const sticky = search_div.offsetTop;

function myFunction() {
    if (window.pageYOffset > sticky) {
        header_popup.classList.replace('hidden-opacity', 'show-opacity')

    } else {

        header_popup.classList.replace('show-opacity', 'hidden-opacity')
    }

}
