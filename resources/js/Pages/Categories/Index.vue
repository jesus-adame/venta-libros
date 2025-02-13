<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import MainContainer from '@/Components/MainContainer.vue';
import CategoryItem from '@/Components/CategoryItem.vue';
import { ref } from 'vue';
import { Category } from '@/types';
import axios from 'axios';
import { onMounted } from 'vue';

const categories = ref<Category[]>([])

const fetchBooks = () => {
    axios.get('/categories')
        .then(response => {
            categories.value = response.data.data
        })
}

onMounted(() => {
    fetchBooks()
})
</script>

<template>
    <GuestLayout>

        <Head title="Categorías" />

        <MainContainer>
            <h1 class="text-2xl font-bold uppercase py-6">Categorías</h1>

            <div v-if="categories.length <= 0" class="text-lg pb-12">
                <p>No hay categorías para mostrar</p>
            </div>

            <div class="grid lg:grid-cols-3 gap-12 mb-12">
                <CategoryItem v-for="(category, index) in categories" :key="index" :category="category" />
            </div>
        </MainContainer>
    </GuestLayout>
</template>