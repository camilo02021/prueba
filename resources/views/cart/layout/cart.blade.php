

<section class="shoping-cart spad">
    <div id="cart">
        <div class="row">
            <cart-detail 
                :cart="cart" 
                :carttotal="cartTotal" 
                :totalitems="totalItems"
                checkoutlink="{{route('checkout.store')}}">
            </cart-detail>
        </div>
    </div>
    
    <div id="products"></div>

    <div class="row">
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>¿Tienes un código de Descuento?</h5>
                            <form action="#">
                                <input type="text" placeholder="Ingresa el codigo aquí...">
                                <button type="submit" class="site-btn">Aplicar Cupón</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>    
    </div>
</section>