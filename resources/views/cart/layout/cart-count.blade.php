<div id="cart">

    <div>
        <div class="reveal" id="checkoutDetailModal" data-reveal>
            <cart-detail :cart="cart" :carttotal="cartTotal" :totalitems="totalItems"></cart-detail>

                <button class="close-button" data-close aria-label="Close modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="header__cart">
            <ul>
                <li><i class="fa fa-shopping-cart" style="font-size: 17px;"></i> &nbsp;<a><span style="font-size: 20px;"><cart-count  :cartcount="totalItems" > </cart-count></span></a></li>
            </ul>
        </div>
    </div>
                
</div>