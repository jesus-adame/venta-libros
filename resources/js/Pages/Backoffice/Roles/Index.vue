<script setup lang="ts">
import BackCategoryItem from '@/Components/BackCategoryItem.vue';
import MainContainer from '@/Components/MainContainer.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Category } from '@/types';
import { Head, router } from '@inertiajs/vue3';
import axios from 'axios';
import { ref } from 'vue';
import { onMounted } from 'vue';

const roles = ref<Category[]>([])

const goToCreate = () => {
    router.visit('/backoffice/roles/create')
}

const fetchRoles = () => {
    axios.get('/backoffice/roles')
        .then(response => {
            roles.value = response.data.data
        })
}

onMounted(() => {
    fetchRoles()
})
</script>

<template>

    <Head title="Roles" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Roles
            </h2>
        </template>

        <MainContainer>
            <div class="py-6 grid gap-6">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p>
                            Estos son los roles que tienes registrados
                        </p>
                    </div>
                </div>
                <div>
                    <PrimaryButton @click="goToCreate">Registrar nuevo rol</PrimaryButton>
                </div>
                <div v-if="roles.length <= 0">
                    <p>No hay roles registrados</p>
                </div>
                <div class="grid md:grid-cols-4 gap-4">
                    <BackCategoryItem v-for="(category, index) in roles" :key="index" :category="category"
                        @deleted="fetchRoles" />
                </div>
            </div>
        </MainContainer>
    </AuthenticatedLayout>
</template>
