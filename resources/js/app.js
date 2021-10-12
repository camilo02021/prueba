/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
window.Vue = require('vue');
window.bus = new Vue();

import Swal from 'sweetalert2'
window.Swal = Swal;
 
 const Toast = Swal.mixin({
     toast: true,
     position: 'top-end',
     showConfirmButton: false,
     timer: 1000,
     timerProgressBar: true,
     didOpen: (toast) => {
       toast.addEventListener('mouseenter', Swal.stopTimer)
       toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
 })
 
window.Toast = Toast;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('book', require('./components/Book.vue').default);
Vue.component('book-detail', require('./components/BookDetail.vue').default);
 Vue.component('cart-count', require('./components/CartCount.vue').default);
 Vue.component('cart-detail', require('./components/CartDetail.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const books = new Vue({
    el: '#books',
    data: {
        cart: []
    },
});

const cart = new Vue({
    el: '#cart',
    data: {
        cart: []
    },
    created(){
        this.getCart();

        bus.$on('added-to-cart', (book) => {
            this.addToCart(book);
        });

        bus.$on('remove-from-cart', (book) => {
            this.removeFromCart(book);
        });

    },
    computed: {
        cartTotal(){
            return this.cart.reduce((total, book) => {
                return total + book.qty * book.price;
            }, 0);
        },
        totalItems(){
            return this.cart.reduce((total, book) => {
                return total + book.qty;
            }, 0);
        }
    },
    methods: {
        getCart () {
            if (localStorage && localStorage.getItem('cart')) {

                this.cart = JSON.parse(localStorage.getItem('cart'));

                var items = JSON.stringify(this.cart);
              
                axios.post('/cart/recoverItems', items, { 
                  headers: {'Content-Type': 'application/json'}
                })
                .then(function (response) {
                  console.log('loaded');
                })
                .catch(function (error) {
                  console.log(error);
                });  

            } else {
                this.cart = [];
            }
        },
        addToCart(book){
            const matchingBookIndex = this.cart.findIndex((item) => {
                return item.id === book.id;
            });
            
            if (matchingBookIndex > -1) {
                var array_items = JSON.parse(localStorage.getItem('cart'));
                var array_num = matchingBookIndex;
                var item = array_items[array_num];
                var itemQty = item.qty;
                if (book.quantity <= itemQty) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Lo sentimos, no hay la cantidad disponible que pides en el momento', 
                        footer: 'Por favor intenta más tarde...'
                    })   
                }else if (book.quantity >= itemQty) {

                    this.cart[matchingBookIndex].qty++;
                    localStorage.setItem('cart', JSON.stringify(this.cart));

                    axios.patch('/cart/update', item, { 
                      headers: {'Content-Type': 'application/json'}
                    })
                    .then(function (response) {
                        console.log('updated');
                        Toast.fire({
                            icon: 'success',
                            title: 'actualizado'
                        })
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

                }
            } else {
                if (book.quantity <= 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Lo sentimos, no hay más unidades disponibles en el momento', 
                        footer: 'Por favor intenta más tarde...'
                    })   
                }else if (book.quantity >= 1) {

                    book.qty = 1;
                    this.cart.push(book);
                    localStorage.setItem('cart', JSON.stringify(this.cart));
      
                    var array_items = JSON.parse(localStorage.getItem('cart'));
                    var items = JSON.stringify(array_items);
    
                    axios.post('/cart/store', items, { 
                        headers: {'Content-Type': 'application/json'}
                        })
                        .then(function (response) {
                            console.log('added');
                            Toast.fire({
                            icon: 'success',
                            title: 'agregado'
                            })
                        })
                        .catch(function (error) {
                            console.log(error);
                    });
                }
               
            }
        },

        removeFromCart(book){
            const matchingBookIndex = this.cart.findIndex((item) => {
                return item.id == book.id;
            });

            if (this.cart[matchingBookIndex].qty <= 1) {
                var array_num = matchingBookIndex;
                var array_items = JSON.parse(localStorage.getItem('cart'));
                var id = array_items[array_num];

                axios.post('/cart/delete', id, { 
                  
                })
                .then(function (response) {
                  console.log('removed');
                  Toast.fire({
                    icon: 'success',
                    title: 'eliminado'
                })
                })
                .catch(function (error) {
                  console.log(error);
                });
                this.cart.splice(matchingBookIndex, 1);
                localStorage.setItem('cart', JSON.stringify(this.cart));
            } else {
                this.cart[matchingBookIndex].qty--;
                localStorage.setItem('cart', JSON.stringify(this.cart));
  
                  var array_num = matchingBookIndex;
                  var array_items = JSON.parse(localStorage.getItem('cart'));
                  var item = array_items[array_num];
  
                  axios.patch('cart/update', item, { 
                    headers: {'Content-Type': 'application/json'}
                  })
                  .then(function (response) {
                        console.log('decreased');
                        Toast.fire({
                            icon: 'success',
                            title: 'actualizado'
                        })
                  })
                  .catch(function (error) {
                      console.log(error);
                  });
            }
        }
    }
});
