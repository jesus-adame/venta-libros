<script setup lang="ts">
import { dateFormat } from '@/helpers/dateUtil';
import PrimaryButton from './PrimaryButton.vue';
import { router } from '@inertiajs/vue3';

const { book } = defineProps(['book'])

const goToDetails = () => {
    router.visit('/libros/' + book.slug)
}
</script>

<template>
    <div class="bg-white p-6 rounded-lg border">
        <div class="h-44 overflow-hidden">
            <img v-if="book.image" :src="'/' + book.image" :alt="book.name" class="mx-auto">
            <div v-else class="flex items-center justify-center border h-full bg-gray-100 text-gray-600">
                <p>No hay imagen</p>
            </div>
        </div>
        <div class="h-54 pt-4 flex flex-col justify-between gap-4">
            <div>
                <h4 @click="goToDetails" class="text-xl font-bold mb-1 cursor-pointer">{{ book.name }}</h4>
                <p class="text-gray-600 mb-2 text-sm">{{ dateFormat(book.created_at) }}</p>
                <p class="mb-2">Autor: {{ book.author }}</p>
                <p class="text-wrap truncate max-h-24 mb-2">
                    {{ book.description }}
                </p>
                <span class="text-xl">${{ book.price }}</span>
            </div>
            <div class="text-center">
                <PrimaryButton @click="goToDetails" class="text-center">Ver detalles</PrimaryButton>
            </div>
        </div>
    </div>
</template>