<script setup lang="ts">
import InputLabel from '@/Components/InputLabel.vue';
import MainContainer from '@/Components/MainContainer.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import axios from 'axios';
import { ref } from 'vue';

const form = ref<{
    name: string,
    processing: boolean
}>({
    name: '',
    processing: false
})

const requestOptions = {
    headers: {
        'Content-Type': 'multipart/form-data'
    }
}

const errors = ref()

const createBook = () => {
    axios.post('/backoffice/categories', form.value, requestOptions)
        .then(response => {
            router.visit('/backoffice/categories-list')
        })
        .catch(error => {
            errors.value = error.response.data
        })
}

</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Registar nueva categoría
            </h2>
            <p>Ingresas el nombre de la nueva categoría</p>
        </template>

        <MainContainer>
            <div class="py-6 grid gap-6">
                <form class="md:w-1/2" @submit.prevent="createBook">
                    <div>
                        <InputLabel for="name" value="Nombre" />

                        <TextInput id="name" class="mt-1 block w-full" v-model="form.name" required autofocus
                            autocomplete="name" />

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
