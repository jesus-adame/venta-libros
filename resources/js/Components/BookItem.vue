<script setup lang="ts">
import { dateFormat } from '@/helpers/dateUtil';
import PrimaryButton from './PrimaryButton.vue';
import { router } from '@inertiajs/vue3';

const { book } = defineProps(['book'])

const slugify = (text: string) => {
    return text
        .toLowerCase() // Convertir a minúsculas
        .normalize("NFD").replace(/[\u0300-\u036f]/g, "") // Eliminar tildes
        .replace(/[^a-z0-9 ]/g, "") // Remover caracteres especiales excepto espacios
        .trim()
        .replace(/\s+/g, "-"); // Reemplazar espacios por guiones
};

const goToDetails = () => {
    router.visit('/libros/' + slugify(book.name))
}
</script>

<template>
    <div class="bg-white p-6 rounded-lg border">
        <div class="h-44 overflow-hidden">
            <img v-if="book.image" :src="'/' + book.image" :alt="book.name">
            <div v-else class="flex items-center justify-center border h-full bg-gray-100 text-gray-600">
                <p>No hay imagen</p>
            </div>
        </div>
        <div class="h-48 pt-4 flex flex-col justify-between gap-4">
            <div>
                <h4 class="text-xl font-bold mb-1">{{ book.name }}</h4>
                <p class="text-gray-600 mb-2 text-sm">{{ dateFormat(book.created_at) }}</p>
                <p class="text-wrap truncate max-h-24">
                    {{ book.description }}
                </p>
                <span>${{ book.price }}</span>
            </div>
            <div class="text-center">
                <PrimaryButton @click="goToDetails" class="text-center">Ver detalles</PrimaryButton>
            </div>
        </div>
    </div>
</template>