<script setup lang="ts">
import MainContainer from '@/Components/MainContainer.vue';
import AuthorItem from './AuthorItem.vue';

const authors = [
    {
        name: 'Jesús Adame Sandoval',
        size: 'small',
        image: '/images/user.jpg',
        profession: 'Desarrollador de Software'
    },
    {
        name: 'Rubén Eduardo',
        size: 'large',
        image: '/images/user.jpg',
        profession: 'Director de Marketing'
    },
    {
        name: 'Francisco Martin',
        size: 'small',
        image: '/images/user.jpg',
        profession: 'Diseñador Web'
    }
]
</script>

<template>
    <div class="pt-16 pb-32 px-16">
        <MainContainer>
            <h3 class="text-center text-3xl font-semibold uppercase mb-16">Miembros destacados</h3>
            <div class="flex justify-around items-center">
                <AuthorItem v-for="(author, index) in authors" :key="index" :author="author" />
            </div>
        </MainContainer>
    </div>
</template>