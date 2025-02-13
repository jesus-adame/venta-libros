<script setup lang="ts">
import PrimaryButton from './PrimaryButton.vue';

const { category } = defineProps(['category'])
</script>

<template>
    <div class="bg-white p-6 rounded-lg border">
        <div class="h-44 overflow-hidden">
            <img v-if="category.image" :src="'/' + category.image" :alt="category.name">
            <div v-else class="flex items-center justify-center border h-full bg-gray-100 text-gray-600">
                <p>No hay imagen</p>
            </div>
        </div>
        <div class="h-23 pt-4 flex flex-col justify-between gap-4">
            <div>
                <h4 class="text-xl text-center font-bold mb-2">{{ category.name }}</h4>
            </div>
            <div class="text-center">
                <PrimaryButton class="text-center">Ver detalles</PrimaryButton>
            </div>
        </div>
    </div>
</template>