<script setup lang="ts">
import PrimaryButton from './PrimaryButton.vue';
import { router } from '@inertiajs/vue3';

const gotToLogin = () => {
    router.visit('/login')
}
</script>

<template>
    <div class="bg-white">
        <div class="relative isolate px-6 lg:px-8">
            <div class="mx-auto max-w-2xl py-20 sm:py-48 lg:py-40">
                <div class="text-center">
                    <h1 class="text-5xl md:text-7xl font-semibold text-gray-900">
                        Bienvenido a libros online
                    </h1>
                    <p class="mt-8 text-lg font-medium sm:text-xl/8">
                        El sitio web donde econtrará todo tipo de libros en PDF
                    </p>

                    <PrimaryButton @click="gotToLogin" class="mt-6">Accede ahora</PrimaryButton>
                </div>
            </div>
        </div>
    </div>

</template>