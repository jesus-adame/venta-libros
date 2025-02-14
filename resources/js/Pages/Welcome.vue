<script setup lang="ts">
import MainBanner from '@/Components/MainBanner.vue';
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import TopBooks from '@/modules/books/TopBooks.vue';
import TopAuthors from '@/Components/TopAuthors.vue';
</script>

<template>
    <GuestLayout>

        <Head title="Bienvenido" />
        <MainBanner />
        <TopBooks />
        <TopAuthors />
    </GuestLayout>
</template>
