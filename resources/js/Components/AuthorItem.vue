<script setup lang="ts">
const { author } = defineProps(['author'])

const style = [
    author?.size == 'large' ? 'h-64 w-64' : 'h-52 w-52',
]
</script>

<template>
    <div class="bg-white p-2 flex flex-col items-center justify-center">
        <div class="overflow-hidden bg-gray-200 rounded-full flex items-center justify-center" :class="style">
            <img :src="author.image" alt="category.name">
        </div>
        <div class="pt-4 flex flex-col justify-between gap-4 text-center">
            <div>
                <h4 class="text-xl font-bold mb-2">{{ author.name }}</h4>
                <p>{{ author.profession }}</p>
            </div>
        </div>
    </div>
</template>