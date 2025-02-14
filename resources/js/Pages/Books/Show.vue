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
            <div class="grid md:grid-cols-2 my-2 py-4 gap-5">
                <div class="flex justify-center">
                    <img v-if="book?.image" class="md:w-1/2" :src="'/' + book?.image" :alt="book?.name">
                    <div v-else
                        class="bg-gray-200 rounded text-gray-600 border flex justify-center items-center h-full w-full">
                        <p class="text-center">No hay imagen</p>
                    </div>
                </div>
                <div class="py-4 px-6 border rounded shadow">
                    <h1 class="text-2xl font-bold uppercase pb-6">{{ book?.name }}</h1>
                    <h4 class="font-bold">Autor</h4>
                    <p>{{ book?.author }}</p>
                    <h4 class="font-bold">Description</h4>
                    <p class="mb-4">{{ book?.description }}</p>
                    <h4 class="font-bold">Fecha</h4>
                    <p class="mb-4">{{ book?.created_at }}</p>
                    <p class="font-bold">Precio</p>
                    <p class="text-4xl">$ {{ book?.price }}</p>
                </div>
            </div>
        </MainContainer>
    </GuestLayout>
</template>