<script setup lang="ts">
import BookItem from '@/Components/BookItem.vue';
import MainContainer from '@/Components/MainContainer.vue';
import { Book } from '@/types';
import axios from 'axios';
import { onMounted } from 'vue';
import { ref } from 'vue';

const books = ref<Book[]>([])

const fetchBooks = () => {
    axios.get('/books', { params: { items: 3 } })
        .then(response => {
            books.value = response.data.data
        })
}

onMounted(() => {
    fetchBooks()
})
</script>

<template>
    <div class="bg-gray-200 pt-16 pb-32 px-16">
        <MainContainer>
            <h3 class="text-center text-3xl font-semibold uppercase mb-16">Libros recientes</h3>
            <div v-if="books.length > 0" class="grid lg:grid-cols-3 gap-12">
                <BookItem v-for="(book, index) in books" :key="index" :book="book" />
            </div>
            <div v-else class="text-center text-lg">
                No hay libros para mostrar
            </div>
        </MainContainer>
    </div>
</template>