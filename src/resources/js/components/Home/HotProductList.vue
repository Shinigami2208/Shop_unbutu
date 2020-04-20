<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1>Hot Product List</h1>
                    <div class="card-body" v-for="(product) in products" :key="product.id">
                        <div>{{product.name}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                products: []
            }
        },
        mounted() {
            axios.get('/api/hot-product').then (response=>{
                this.products = response.data;
            })
        }
    }
</script>
