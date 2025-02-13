<script setup lang="ts">
import PrimaryButton from './PrimaryButton.vue';

const { book } = defineProps(['book'])
</script>

<template>
    <div class="bg-white p-6 rounded-lg border">
        <div class="h-44 bg-black">
            <img src="#" alt="">
        </div>
        <div class="h-48 pt-4 flex flex-col justify-between gap-4">
            <div>
                <h4 class="text-xl font-bold mb-2">{{ book.name }}</h4>
                <p class="text-wrap truncate max-h-24">
                    {{ book.description }}
                </p>
                <span>${{ book.price }}</span>
            </div>
            <div class="text-center">
                <PrimaryButton class="text-center">Ver detalles</PrimaryButton>
            </div>
        </div>
    </div>
</template>