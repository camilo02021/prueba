<template>
    <div>
        <button data-open="checkoutDetailModal">
           
            {{ cartcount }}
                         
        </button>

    </div>
</template>

<script>
    export default {
        props:['cartcount'],

        data(){
            return {
            }
        },

        created() {
            console.log('Component mounted.')
        },

    }
</script>
