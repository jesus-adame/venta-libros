<script setup lang="ts">
import FileInput from '@/Components/FileInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import MainContainer from '@/Components/MainContainer.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import axios from 'axios';
import { ref } from 'vue';
import { Role } from '@/types';
import { onMounted } from 'vue';

const form = ref<{
    name: string,
    email: string,
    password: string,
    role_id: string,
    image: File | null,
    processing: boolean
}>({
    name: '',
    email: '',
    password: '',
    role_id: '',
    image: null,
    processing: false
})

const roles = ref<Role[]>([])

const requestOptions = {
    headers: {
        'Content-Type': 'multipart/form-data'
    }
}

const errors = ref()

const createUser = () => {
    axios.post('/backoffice/users', form.value, requestOptions)
        .then(response => {
            router.visit('/backoffice/users-list')
        })
        .catch(error => {
            errors.value = error.response.data
        })
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

    <Head title="Nuevo usuario" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Registar nuevo usuario
            </h2>
            <p>Ingresas los datos del nuevo usuario</p>
        </template>

        <MainContainer>
            <div class="py-6 grid gap-6">
                <form class="md:w-1/2" @submit.prevent="createUser">
                    <div>
                        <InputLabel for="name" value="Nombre" />

                        <TextInput id="name" class="mt-1 block w-full" v-model="form.name" required autofocus
                            autocomplete="name" />

                        <InputLabel for="email" value="Email" />

                        <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required
                            autofocus autocomplete="email" />

                        <InputLabel for="password" value="Contraseña" />

                        <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password"
                            required autocomplete="new-password" />

                        <InputLabel for="role" value="Rol" />
                        <select v-model="form.role_id"
                            class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 w-full">
                            <option value="">Elige un rol</option>
                            <option v-for="(role, index) in roles" :key="index" :value="role.id.toString()">
                                {{ role.name }}
                            </option>
                        </select>

                        <div v-if="errors" class="py-4 text-red-700">
                            {{ errors.message }}
                        </div>

                        <PrimaryButton class="mt-2" :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing">
                            Registrar
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </MainContainer>
    </AuthenticatedLayout>
</template>
