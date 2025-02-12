<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import MainContainer from '@/Components/MainContainer.vue';
import CategoryItem from '@/Components/CategoryItem.vue';
</script>

<template>
    <GuestLayout>

        <Head title="Categorías" />

        <MainContainer>
            <h1 class="text-2xl font-bold uppercase py-6">Categorías</h1>

            <div class="mb-12 grid grid-cols-3 gap-6">
                <CategoryItem />
                <CategoryItem />
                <CategoryItem />
                <CategoryItem />
            </div>
        </MainContainer>
    </GuestLayout>
</template>