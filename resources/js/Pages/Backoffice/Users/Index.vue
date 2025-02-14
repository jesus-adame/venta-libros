<script setup lang="ts">
import BackUserItem from '@/Components/BackUserItem.vue';
import MainContainer from '@/Components/MainContainer.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { User } from '@/types';
import { Head, router } from '@inertiajs/vue3';
import axios from 'axios';
import { ref } from 'vue';
import { onMounted } from 'vue';

const users = ref<User[]>([])

const goToCreate = () => {
    router.visit('/backoffice/users/create')
}

const fetchCategories = () => {
    axios.get('/backoffice/users')
        .then(response => {
            users.value = response.data.data
        })
}

onMounted(() => {
    fetchCategories()
})
</script>

<template>

    <Head title="Usuarios" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Usuarios
            </h2>
        </template>

        <MainContainer>
            <div class="py-6 grid gap-6">
                <div>
                    <PrimaryButton @click="goToCreate">Registrar nuevo usuario</PrimaryButton>
                </div>
                <div v-if="users.length <= 0">
                    <p>No hay usuarios registrados</p>
                </div>
                <div class="grid md:grid-cols-2 gap-4">
                    <BackUserItem v-for="(user, index) in users" :key="index" :user="user" @deleted="fetchCategories" />
                </div>
            </div>
        </MainContainer>
    </AuthenticatedLayout>
</template>
