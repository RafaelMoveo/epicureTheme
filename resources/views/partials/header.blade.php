<header class="banner">
    @include ('partials.nav-desktop')
    @include ('partials.nav-mobile')
    <div class="row cart p-0">
        <div class="col-7 col-lg-3 cart-wrapper p-0">
            <div class="row p-0 m-0">
                <div class="col-12 cart-items p-0 m-0">

                </div>
            </div>
            <div class="row" id="cart-btns-div" class="d-none">
                <div class="col-6 text-center">
                    <button id="checkout" class="btn checkout-btn" data-toggle="modal" data-target=".purchaseConfirmation">Checkout</button>
                </div>
                <div class="col-6 text-center">
                    <button id="empty-cart" class="btn btn-danger">Empty cart</button>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="modal fade purchaseConfirmation" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            The order is on its way to you!<br>
            (The cart is empty)
        </div>
    </div>
</div>
