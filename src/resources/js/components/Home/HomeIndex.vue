<template>
    <div class="container">
        <div class="row justify-content-center">
            <h2>Trang chủ</h2>
            <Menu></Menu>
            <HotProductList></HotProductList>
            
        </div>
    </div>
</template>

<script>
    import HotProductList from './HotProductList.vue';
    import Menu from '../General/Menu.vue';
    export default {
        mounted() {
        },
        components: {
            HotProductList,
            Menu
        }
    }
</script>
