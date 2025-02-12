<script setup lang="ts">
import MainBanner from '@/Components/MainBanner.vue';
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
</script>

<template>
    <GuestLayout>

        <Head title="Bienvenido" />

        <div>
            <MainBanner />
        </div>
    </GuestLayout>
</template>
