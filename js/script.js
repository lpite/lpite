let cart = {}; //моя корзина
const cart_input = document.querySelectorAll(".cart-input");
const buy_btn = document.querySelectorAll(".buy-btn");
const cart_delete = document.querySelectorAll('.cart-delete');
const select = document.querySelectorAll('.select');
const full_price_out = document.querySelector('.full-price');
const payment_radio_div = document.querySelectorAll('.payment-radio-div');
const sort = document.querySelector('.Sort');
const products_on_page = document.querySelector('.products-on-page');
const header_popup = document.getElementById("header-popup");
const search_div = document.getElementById("search-div");
const sticky = search_div.offsetTop;
const orders = document.querySelectorAll('.order-table');
const container = document.querySelector('.container');
const mini_cart = document.querySelector('.mini-cart');
const mini_cart1 = document.querySelector('.mini-cart1');
checkCart();
showMiniCart();
fullprice();
    
window.onscroll = function () {
  myFunction()
};

cart_input && 
Array.from(cart_input).forEach(link => {
    link.addEventListener('change', function() {
    const articul = this.getAttribute('data-id');
    c = document.getElementById(articul).value / 1;
    cart[articul] = c;
    save_cart();
    showMiniCart();
    fullprice();
    });
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

    const articul = this.getAttribute('data-id');
    const check = document.getElementById(articul);
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

    mini_cart &&  mini_cart
    mini_cart.innerHTML = cart_count;

    mini_cart1 &&  mini_cart1
    mini_cart1.innerHTML = cart_count;
    console.log(cart_count);
   
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



buy_btn && 
Array.from(buy_btn).forEach(link => {
    link.addEventListener('click', function() { 
    let articul = this.getAttribute('data-id');
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

    });
});


cart_delete &&
Array.from(cart_delete).forEach(link => {
 link.addEventListener('click',function(){
 var articul = this.getAttribute('data-id');
    delete cart[articul];
    var cart_div = document.getElementById(articul + '.1');
    cart_div.classList.add("hidden");
    cart_div.classList.remove("tovar-div");
    save_cart();
    showMiniCart();
    fullprice();
 });
});


select && 

Array.from(select).forEach(link => {

    link.addEventListener('change', function(){

      let articul = this.getAttribute('id');
    let value = document.getElementById(articul).value;
    if (value == '...') {

        document.getElementById(articul).classList.add('hidden');
        document.getElementById(articul + '.1').classList.remove('hidden');

    }
    });
});



function fullprice() {
    let full_price = 0;
    let price;
    let available;
    for (var w in cart) {
        let x = document.getElementById(w + '.2');
        if (x) {
        price = x.getAttribute('data-price');
        available = x.getAttribute('data-available');
        if (available >= 1) {

            full_price += price * cart[w];
        }
      
      }




    }
   
   if (full_price_out && full_price != 0) {

        full_price_out.innerHTML = full_price;
   }
   
}


sort && 
sort.addEventListener('change',function(){
let sort_value = document.getElementById('select').value;
    document.getElementById('btn').click();
    document.cookie = "sort= " + sort_value + "; expires=01 Jan 2021 00:00:00 UTC;path=/";
});



products_on_page &&
products_on_page.addEventListener('change',function(){
    let pdonpg_value = document.getElementById('products-on-page').value;
    document.getElementById('products-on-page-button').click();
    document.cookie = "pdonpg= " + pdonpg_value + "; expires=01 Jan 2021 00:00:00 UTC;path=/";
});



payment_radio_div &&
Array.from(payment_radio_div).forEach(link => {
    link.addEventListener('click' ,function(){
  const id = link.getAttribute('id');
    document.getElementById(id + '.1').click();
    });
 

    });



function myFunction() {
    if (window.pageYOffset > sticky) {
        header_popup.classList.replace('hidden-opacity', 'show-opacity')

    } else {

        header_popup.classList.replace('show-opacity', 'hidden-opacity')
    }
  

}
 let width = container.offsetWidth.toString();
   header_popup.style.width = width+'px';
   
window.onresize = function(event) {
   let width = container.offsetWidth.toString();
   header_popup.style.width = width+'px';
};



orders &&
Array.from(orders).forEach(link => {
    link.addEventListener('click' ,function(){
  const id = link.getAttribute('id');
  document.getElementById(id+'.1').classList.toggle('hidden');
    });
 

    });

