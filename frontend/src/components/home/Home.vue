<template>
    <div class="home">
            <ArticlesByCategory />
    </div>
</template>

<script>
import PageTitle from '../template/PageTitle'
import ArticlesByCategory from '@/components/article/ArticlesByCategory'

export default {
    name: 'Home',
    components: { PageTitle, ArticlesByCategory },
    
  
}
</script>


