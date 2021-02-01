<template>
   <b-form-select class="menu"  :options="categories" v-model="category.name"></b-form-select>
</template>

<script>
import Tree from 'liquor-tree'
import { baseApiUrl } from '@/global'
import axios from 'axios'

export default {
    name: 'Menu',
    components: { Tree },

    data: function() {
        return {
            category: {},
            categories: [],

        }
    },
    methods: {
        getData() {
            const url = `${baseApiUrl}/categories`
                axios.get(url).then(res => {
                this.categories = res.data.categories.map(category => {
                    return { ...category, value: category.id, text: category.name }
                })
            })
        },
        onNodeSelect(category) {
            if (category.id > 1 ) {
                this.$router.push({
                    name: 'articlesByCategory',
                    params: { id: category.id }
                })
            }
        }
    }, watch: {
        $route() {
             this.onNodeSelect(this.category)
        }
    },
    mounted() {
        this.getData()
    }
}
</script>

<style>
    .menu {
        grid-area: menu;
        background: linear-gradient(to right, #1e469a, #49a7c1);

        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
    }

    .menu a,
    .menu a:hover {
        color: #fff;
        text-decoration: none;
    }


    .menu .menu-filter {
        display: flex;
        justify-content: center;
        align-items: center;

        margin: 20px;
        padding-bottom: 8px;
        border-bottom: 1px solid #AAA;
    }

    .menu .menu-filter i {
        color: #AAA;
        margin-right: 10px;
    }

    .menu input {
        color: #CCC;
        font-size: 1.3rem;
        border: 0;
        outline: 0;
        width: 100%;
        background: transparent;
    }

    .tree-filter-empty {
        color: #CCC;
        font-size: 1.3rem;
        margin-left: 20px;
    }
</style>
