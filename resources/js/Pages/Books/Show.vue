<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import MainContainer from '@/Components/MainContainer.vue';
import { onMounted } from 'vue';
import { ref } from 'vue';
import { Book } from '@/types';
import axios from 'axios';

const props = defineProps(['book'])
const book = ref<Book | null>()

onMounted(() => {
    axios.get('/books/' + props.book.id)
        .then(response => {
            book.value = response.data.book
        })
})
</script>

<template>
    <GuestLayout>

        <Head title="Libros" />

        <MainContainer>
            <div class="grid md:grid-cols-2 my-2 py-4">
                <div class="flex justify-center">
                    <img class="md:w-1/2" :src="'/' + book?.image" :alt="book?.name">
                </div>
                <div class="py-4 px-5 ">
                    <h1 class="text-2xl font-bold uppercase py-6">{{ book?.name }}</h1>
                    <h4 class="font-bold">Description</h4>
                    <p class="mb-4">{{ book?.description }}</p>
                    <p class="font-bold">Precio</p>
                    <p class="text-4xl">$ {{ book?.price }}</p>
                </div>
            </div>
        </MainContainer>
    </GuestLayout>
</template>