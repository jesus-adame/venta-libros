<script setup lang="ts">
import FileInput from '@/Components/FileInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import MainContainer from '@/Components/MainContainer.vue';
import NumberInput from '@/Components/NumberInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import axios from 'axios';
import { onMounted } from 'vue';
import { ref } from 'vue';

const { book } = defineProps(['book'])

const form = ref<{
    name: string,
    author: string,
    description: string,
    price: number | null,
    image: File | null,
    processing: boolean,
    _method: string
}>({
    name: '',
    author: '',
    description: '',
    price: 0,
    image: null,
    processing: false,
    _method: 'put'
})

const requestOptions = {
    headers: {
        'Content-Type': 'multipart/form-data'
    }
}

const errors = ref()

const createBook = () => {
    axios.post('/backoffice/books/' + book.id, form.value, requestOptions)
        .then(response => {
            router.visit('/backoffice/dashboard')
        })
        .catch(error => {
            errors.value = error.response.data
        })
}

const onFileChanged = (file: File) => {
    form.value.image = file;
}

onMounted(() => {
    form.value = { ...book, image: null, _method: 'put', processing: false }
})
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ book.name }}
            </h2>
            <p>Ingresas los nuevos datos del libro</p>
        </template>

        <MainContainer>
            <div class="py-6 grid gap-6">
                <form class="md:w-1/2" @submit.prevent="createBook">
                    <div class="h-44 overflow-hidden mb-4">
                        <img v-if="book.image" :src="'/' + book.image" :alt="book.name">
                        <div v-else class="flex items-center justify-center border h-full bg-gray-100 text-gray-600">
                            <p>No hay imagen</p>
                        </div>
                    </div>
                    <div class="grid gap-1">
                        <InputLabel for="name" value="Nombre" />

                        <TextInput id="name" class="mt-1 block w-full" v-model="form.name" required autofocus
                            autocomplete="name" />

                        <InputLabel for="author" value="Autor" />

                        <TextInput id="author" class="mt-1 block w-full" v-model="form.author" required autofocus
                            autocomplete="author" />

                        <InputLabel for="description" value="Descripción" />

                        <TextInput id="description" class="mt-1 block w-full" v-model="form.description" required
                            autofocus autocomplete="description" />

                        <InputLabel for="price" value="Precio" />

                        <NumberInput id="price" class="mt-1 block w-full" v-model="form.price" required autofocus
                            autocomplete="price" />

                        <div class="mt-1">
                            <InputLabel for="image" value="Portada" />
                            <FileInput @change="onFileChanged"></FileInput>
                        </div>

                        <div v-if="errors" class="py-4 text-red-700">
                            {{ errors.message }}
                        </div>
                    </div>

                    <PrimaryButton class="mt-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Actualizar
                    </PrimaryButton>
                </form>
            </div>
        </MainContainer>
    </AuthenticatedLayout>
</template>
