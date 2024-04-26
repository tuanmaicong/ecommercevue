<template>
       <Layout>
        <template v-slot:content>
            <h2>This is category</h2>
        </template>
       </Layout>
</template>

<script>
import Layout from "@/frontTemplate/Layout.vue";
import axios from "axios";
import getUrlList from "@/provider.js";
export default {
    name:'Category',
    components:{
        Layout
    }
}
</script>
<script setup>
</script>
