<script setup lang="ts">
import BackBookItem from '@/Components/BackBookItem.vue';
import MainContainer from '@/Components/MainContainer.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Book } from '@/types';
import { Head, router } from '@inertiajs/vue3';
import axios from 'axios';
import { ref } from 'vue';
import { onMounted } from 'vue';

const { auth } = defineProps(['auth'])

const books = ref<Book[]>([])

const goToCreate = () => {
    router.visit('/backoffice/books/create')
}

const fetchBooks = () => {
    axios.get('/backoffice/books')
        .then(response => {
            books.value = response.data.data
        })
}

onMounted(() => {
    fetchBooks()
})
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Mis libros
            </h2>
        </template>

        <MainContainer>
            <div class="py-6 grid gap-6">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-bold">Bienvenido {{ auth.user.name }}</h3>
                        <p>
                            Estos son los libros que tienes registrados
                        </p>
                    </div>
                </div>
                <div>
                    <PrimaryButton @click="goToCreate">Registrar nuevo libro</PrimaryButton>
                </div>
                <div v-if="books.length <= 0">
                    <p>No hay libros registrados</p>
                </div>
                <div class="grid md:grid-cols-4 gap-4">
                    <BackBookItem v-for="(book, index) in books" :key="index" :book="book" @deleted="fetchBooks" />
                </div>
            </div>
        </MainContainer>
    </AuthenticatedLayout>
</template>
