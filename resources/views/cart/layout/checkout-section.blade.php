<section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span>¿Tienes un cupón? <a href="#"> Click aquí</a> para ingresar tu código.
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Detalles de entrega</h4>
                <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p><label for="name">Nombres<span>*</span></label></p>
                                        <input type="text"  class="checkout__input__add" id="name" name="name" value="{{ old('name') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>  <label for="address">Dirección de entrega <span>*</span></label></p>
                                <input type="text" placeholder="Dirección" class="checkout__input__add" id="address" name="address" value="{{ old('address') }}" required>
                                <input type="text" placeholder="Apartamento, casa, edificio, ect (opcional)" class="checkout__input__add" id="address_optional" name="address_optional" value="{{ old('address_optional') }}" >
                            </div>
                            <div class="checkout__input">
                                <p> <label for="province">Barrio<span>*</span></label></p>
                                <input type="text" class="checkout__input__add" id="province" name="province" value="{{ old('province') }}" required>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p><label for="phone">Teléfono<span>*</span></label></p>
                                        <input type="text" class="checkout__input__add" id="phone" name="phone" value="{{ old('phone') }}" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="checkout__input">
                                <p>Sugerencias para la orden.<span>*</span></p>
                                <input type="text"
                                    placeholder=" Sugerencias sobre la entrega...">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Efectivo
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Datafono
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" id="complete-order" class="site-btn">Realizar Pedido</button>
                            </div>
                        </div>
                    </div>
                </form>
                
                <div class="col-lg-4 col-md-6">
                    <div class="checkout__order">
                        <h4> <br> Tu orden</h4>
                        <div class="checkout__order__products">Productos <span>Total</span></div>
                            <ul>
                                @foreach($cartItems as $cartItem)
                                    <li>{{ $cartItem->name }} * {{ $cartItem->qty}} <span>{{ $cartItem->qty * $cartItem->price }}</span></li>
                                @endforeach
                            </ul>
                            <div class="checkout__order__subtotal">Items <span>{{$cartCount}}</span></div>
                            <div class="checkout__order__total">Total <span>{{$cartTotal}}</span></div>
                            <a href="{{ route('cart.index') }}"> <button type="submit" class="button">Modificar orden</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- Checkout Section End -->