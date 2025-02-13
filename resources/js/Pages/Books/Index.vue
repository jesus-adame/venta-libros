<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import MainContainer from '@/Components/MainContainer.vue';
import BookItem from '@/Components/BookItem.vue';
import { ref } from 'vue';
import { Book } from '@/types';
import axios from 'axios';
import { onMounted } from 'vue';

const books = ref<Book[]>([])

const fetchBooks = () => {
    axios.get('/books')
        .then(response => {
            books.value = response.data.data
        })
}

onMounted(() => {
    fetchBooks()
})
</script>

<template>
    <GuestLayout>

        <Head title="Libros" />

        <MainContainer>
            <h1 class="text-2xl font-bold uppercase py-6">Libros</h1>

            <div v-if="books.length <= 0" class="text-lg">
                <p>No hay libros para mostrar</p>
            </div>

            <div class="grid lg:grid-cols-3 gap-12 mb-12">
                <BookItem v-for="(book, index) in books" :key="index" :book="book" />
            </div>
        </MainContainer>
    </GuestLayout>
</template>