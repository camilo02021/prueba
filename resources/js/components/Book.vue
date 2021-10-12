<template>
    <div class="container">
        <div class="row">
            <div class="item-wrapper">
                <div class="img-wrapper">
                    <div class="book-img">
                        <a :href="booklink">
                            <img :src='bookimagepath' >
                        </a>
                    </div>
                </div>
                <a :href="booklink">
                    <h3>
                        {{book.name}}
                    </h3>
                </a>
                <h5>
                    $ {{ new Intl.NumberFormat("es-CO").format(book.price) }}
                    </h5>
                <p>
                    {{htmlToText(book.description)  }}

                </p>
                <button @click="addToCart"  class="button add-to-cart" style="border-radius: 50px;  font-size: 16px;">
                    <i class="fa fa-plus"></i> 
                </button>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props:['book','booklink','bookimagepath'],
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            addToCart(){
                bus.$emit('added-to-cart',this.book);
            },
            htmlToText(html) {
                var tag = document.createElement('div');
                tag.innerHTML = html;

                return tag.innerText;
            }
        }

       

    }
</script>
