// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*';

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';


/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());

// Navbar functions 
$(document).ready(function () {

  $('.first-button').on('click', function () {

    $('.animated-icon1').toggleClass('open');
  });
  $('.second-button').on('click', function () {

    $('.animated-icon2').toggleClass('open');
  });
  $('.third-button').on('click', function () {

    $('.animated-icon3').toggleClass('open');
  });
});
//Refresh cart icon
function refreshCart(){
    let cartDiv = $('.cart-items-div');

    if(localStorage.getItem('reservedDishes')){
        let reservedDishes = JSON.parse(localStorage.getItem('reservedDishes'));
        cartDiv.html(reservedDishes.length);
        $('.cart-items').html('');
        checkCartBtns();
        $(reservedDishes).each(function(){
            let changes = '';
            if(this.changes){
                $(this.changes).each(function(){
                   changes += this+' ';
                });
            }
            $('.cart-items').prepend(`
                <div class="row">
                    <div class="col-9 pr-0">
                        <p class="cart-header">
                            ${this.name}
                        </p>
                        <p class="cart-content">
                            Price: &#8362;${this.price} , X ${this.qty}
                        </p>    
                        <p class="dish-asides">
                            Aside: ${this.asides}, ${changes}
                        </p>
                    </div>
                    <div class="col-3 pl-0 text-center">
                        <p class="cart-price mt-4">
                            ₪${this.qty*this.price}
                         </p>
                    </div>
                </div>`);
        });

        cartDiv.removeClass('d-none').addClass('d-inline');
    }else{
        checkCartBtns();
        cartDiv.removeClass('d-inline').addClass('d-none');
        $('.cart-wrapper').slideUp('fast');
        $('.cart-items').html('');
    }
}

//Empty cart
function emptyCart(){
    if(localStorage.getItem('reservedDishes')){
        localStorage.removeItem("reservedDishes");
        checkCartBtns();
    }
}

//Cart btns check
function checkCartBtns(){
    if(localStorage.getItem('reservedDishes')){
        if(!$('#cart-btns-div').hasClass('d-flex')){
            $('#cart-btns-div').removeClass('d-none').addClass('d-flex');
        }
    }else{
        if(!$('#cart-btns-div').hasClass('d-none')){
            $('#cart-btns-div').removeClass('d-flex').addClass('d-none');
        }
    }
}

// Home page search input Ajax calls
$('#home-search').on('keyup', function () {
    let searchVal = $('#home-search').val();
    if(searchVal){
        let str = '&search=' + searchVal + '&action=auto_complete';
        $.ajax({
            type: "GET",
            dataType: "html",
            url: the_ajax_script.ajaxurl,
            data: str,
            success: function (res) {
                const data = JSON.parse(res);
                console.log(data);
                let container = $('#autocomplete-items');
                container.removeClass('d-none').addClass('d-block');

                if(data.restaurants.length > 0 || data.cuisines.length > 0 || data.chefs.length > 0){
                    container.html('');
                    if(data.chefs.length > 0){
                        container.append('<div class="items-header">Chefs:</div>');

                        $.each(data.chefs, function( index,chef ){
                            container.append('<div class="autocomplete-item"><a href="'+chef.permalink+'">'+chef.name+'</a></div>')
                        });
                    }
                    if(data.cuisines.length > 0){
                        container.append('<div class="items-header">Cuisines:</div>');

                        $.each(data.cuisines, function( index,cuisine ){
                            container.append('<div class="autocomplete-item"><a href="'+cuisine.permalink+'">'+cuisine.title+'</a></div>')
                        });
                    }
                    if(data.restaurants.length > 0){
                    container.append('<div class="items-header">Restaurants:</div>');

                        $.each(data.restaurants, function( index,restaurant ){
                            container.append('<div class="autocomplete-item"><a href="'+restaurant.permalink+'">'+restaurant.title+'</a></div>')
                        });
                    }
                }else{
                    container.html('');
                    container.append('<div class="items-header"><i>No Items Found....</i></div>');
                }
            },
            error: function (qXHR, textStatus, errorThrown) {
                console.log(qXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }else{
        if($('#autocomplete-items').hasClass("d-block")){
            $('#autocomplete-items').removeClass("d-block").addClass("d-none");
        }
    }
    return false;
});

// Navbar search input Ajax calls
$('#nav-search').on('keyup', function ($) {
    let searchVal = $('#nav-search').val();
    if(searchVal){
        let str = '&search=' + searchVal + '&action=auto_complete';
        $.ajax({
            type: "GET",
            dataType: "html",
            url: the_ajax_script.ajaxurl,
            data: str,
            success: function (res) {
                const data = JSON.parse(res);
                console.log(data);
                let container = $('#autocomplete-nav-items');
                container.removeClass('d-none').addClass('d-block');

                if(data.restaurants.length > 0 || data.cuisines.length > 0 || data.chefs.length > 0){
                    container.html('');
                    if(data.chefs.length > 0){
                        container.append('<div class="items-header">Chefs:</div>');

                        $.each(data.chefs, function( index,chef ){
                            container.append('<div class="autocomplete-item"><a href="'+chef.permalink+'">'+chef.name+'</a></div>')
                        });
                    }
                    if(data.cuisines.length > 0){
                        container.append('<div class="items-header">Cuisines:</div>');

                        $.each(data.cuisines, function( index,cuisine ){
                            container.append('<div class="autocomplete-item"><a href="'+cuisine.permalink+'">'+cuisine.title+'</a></div>')
                        });
                    }
                    if(data.restaurants.length > 0){
                    container.append('<div class="items-header">Restaurants:</div>');

                        $.each(data.restaurants, function( index,restaurant ){
                            container.append('<div class="autocomplete-item"><a href="'+restaurant.permalink+'">'+restaurant.title+'</a></div>')
                        });
                    }
                }else{
                    container.html('');
                    container.append('<div class="items-header"><i>No Items Found....</i></div>');
                }
            },
            error: function (qXHR, textStatus, errorThrown) {
                console.log(qXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }else{
        if($('#autocomplete-nav-items').hasClass("d-block")){
            $('#autocomplete-nav-items').removeClass("d-block").addClass("d-none");
        }
    }
    return false;
});

// Open\Close cart
$('.cart-btn').on('click', function(){
    $('.cart-wrapper').slideToggle('fast');
});

// Empty cart
$('#empty-cart').on('click', function(){
    emptyCart();
    refreshCart();
});

// Add items to bag
$('.add-to-bag').on('click', function(){
    const id     = $(this).data('id');
    const parent = $(this).parents("#dish"+id);
    const name   = $(this).data('name');
    const price  = $(this).data('price');
    const qty    = $('#dish-'+id).val();
    let asides = parent.find("input[type=checkbox]:checked").val();
    let changes = [];

    parent.find("input[type=checkbox]:checked").each(function() {
        changes.push($(this).val());
    });

    const dishReservation = {
        id: id,
        name: name,
        price: price,
        qty: qty,
        asides: asides,
        changes: changes,
    };

    if(localStorage.getItem('reservedDishes')){
        let localReservedDishes = JSON.parse(localStorage.getItem('reservedDishes'));
        localReservedDishes.push(dishReservation);
        localStorage.setItem('reservedDishes', JSON.stringify(localReservedDishes));
    }else{
        localStorage.setItem('reservedDishes', JSON.stringify([dishReservation,]));
    }
    refreshCart();
    $(`#dish${id}`).modal('hide');
});

// Check out
$('#checkout').on('click', function(){
    emptyCart();
    refreshCart();
});

$(document).ready(function(){
    //Costumed number input
    $('.count').prop('disabled', true);
    $(document).on('click','.plus',function(){
        $('.count').val(parseInt($('.count').val()) + 1 );
    });
    $(document).on('click','.minus',function(){
        $('.count').val(parseInt($('.count').val()) - 1 );
        if ($('.count').val() == 0) {
            $('.count').val(1);
        }
    });

    refreshCart();
});



