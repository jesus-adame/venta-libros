<script setup lang="ts">
import BackCategoryItem from '@/Components/BackCategoryItem.vue';
import MainContainer from '@/Components/MainContainer.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Category } from '@/types';
import { Head, router } from '@inertiajs/vue3';
import axios from 'axios';
import { ref } from 'vue';
import { onMounted } from 'vue';

const categories = ref<Category[]>([])

const goToCreate = () => {
    router.visit('/backoffice/categories/create')
}

const fetchCategories = () => {
    axios.get('/backoffice/categories')
        .then(response => {
            categories.value = response.data.data
        })
}

onMounted(() => {
    fetchCategories()
})
</script>

<template>

    <Head title="Categorías" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Categorías
            </h2>
        </template>

        <MainContainer>
            <div class="py-6 grid gap-6">
                <div>
                    <PrimaryButton @click="goToCreate">Registrar nueva categoría</PrimaryButton>
                </div>
                <div v-if="categories.length <= 0">
                    <p>No hay categorías registradas</p>
                </div>
                <div class="grid md:grid-cols-4 gap-4">
                    <BackCategoryItem v-for="(category, index) in categories" :key="index" :category="category"
                        @deleted="fetchCategories" />
                </div>
            </div>
        </MainContainer>
    </AuthenticatedLayout>
</template>
