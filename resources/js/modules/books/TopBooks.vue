<script setup lang="ts">
import BookItem from '@/Components/BookItem.vue';

</script>

<template>
    <div class="bg-gray-200 pt-16 pb-32 px-16">
        <h3 class="text-center text-3xl font-semibold uppercase mb-16">Libros recientes</h3>
        <div class="grid lg:grid-cols-3 gap-12">
            <BookItem />
            <BookItem />
            <BookItem />
        </div>
    </div>
</template>