<template>
    <Layout>
        <template v-slot:content="slotProps">
            <h2>Check out</h2>
        </template>
    </Layout>
</template>
<script>
import Layout from "@/frontTemplate/Layout.vue";
import axios from "axios";
import initializeSlick from "@/slick-carosel.js";
import getUrlList from "@/provider.js";
import {useRoute} from "vue-router";
import { mapState, mapActions } from 'vuex';
export default {
    name:'checkout',
    components:{
        Layout
    }
}
</script>
