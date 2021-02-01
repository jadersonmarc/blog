<template>
    <header class="header">
        <a>
            <Menu id="menu"/>
        </a>
   
    </header>
</template>

<script>

import Menu from "@/components/template/Menu"

export default {
    name: 'Header',
    components: { Menu },
    props: {
        titles: 'profissionais da medicina ',
        categories: []
    }
}
</script>

<style>

    #menu {
         width: 180px;
        height: 100%;
        justify-self: flex-start;
        background: linear-gradient(to right, #1e469a, #49a7c1);
    }
    .header {
        grid-area: header;
        background: linear-gradient(to right, #1e469a, #49a7c1);

        
        justify-content: center;
        align-items: center;
    }

    .title {
        font-size: 1.2rem;
        color: #fff;
        font-weight: 100;
        flex-grow: 1;
        text-align: center;
    }

    .title a {
        color: #FFF;
        text-decoration: none;
    }

    .title a:hover {
        color: #FFF;
        text-decoration: none;
    }

    header.header > a.toggle {
        width: 60px;
        height: 100%;
        color: #fff;
        justify-self: flex-start;
        text-decoration: none;

        display: flex;
        justify-content: center;
        align-items: center;
    }

    header.header > a.toggle:hover {
        color: #fff;
        background-color: rgba(0, 0, 0, 0.2);
    }
</style>
