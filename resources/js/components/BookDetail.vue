<template>

    <div class="container">
        <div class="row">
            <div class="item-wrapper">
                <div class="img-wrapper">
                    <div class="book-img">
                       
                        <img :src='bookimagepath' >
                        
                    </div>
                </div>
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
            addToCompare(){
                bus.$emit('added-to-compare',this.book);
            },
            htmlToText(html) {
                var tag = document.createElement('div');
                tag.innerHTML = html;

                return tag.innerText;
            }
        }

       

    }
</script>
