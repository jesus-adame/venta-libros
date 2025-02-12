<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import MainContainer from '@/Components/MainContainer.vue';
import BookItem from '@/Components/BookItem.vue';
</script>

<template>
    <GuestLayout>

        <Head title="Libros" />

        <MainContainer>
            <h1 class="text-2xl font-bold uppercase py-6">Libros</h1>

            <div class="grid lg:grid-cols-3 gap-12 mb-12">
                <BookItem />
                <BookItem />
                <BookItem />
                <BookItem />
                <BookItem />
                <BookItem />
            </div>
        </MainContainer>
    </GuestLayout>
</template>