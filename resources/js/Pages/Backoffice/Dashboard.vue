<script setup lang="ts">
import BackBookItem from '@/Components/BackBookItem.vue';
import MainContainer from '@/Components/MainContainer.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';

const { auth } = defineProps(['auth'])

const goToCreate = () => {
    router.visit('/books/create')
}
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Mis libros
            </h2>
        </template>

        <MainContainer>
            <div class="py-6 grid gap-6">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-bold">Bienvenido {{ auth.user.name }}</h3>
                        <p>
                            Estos son los libros que tienes registrados
                        </p>
                    </div>
                </div>
                <div>
                    <PrimaryButton @click="goToCreate">Registrar nuevo libro</PrimaryButton>
                </div>
                <div class="grid grid-cols-4">
                    <BackBookItem />
                </div>
            </div>
        </MainContainer>
    </AuthenticatedLayout>
</template>
