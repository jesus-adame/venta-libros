<script setup lang="ts">
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

const form = ref({
    name: '',
    description: '',
    price: 0,
    processing: false,
    _method: 'put'
})

const errors = ref()

const createBook = () => {
    axios.post('/backoffice/books/' + book.id, form.value)
        .then(response => {
            router.visit('/backoffice/dashboard')
        })
        .catch(error => {
            errors.value = error.response.data
        })
}

onMounted(() => {
    form.value = { ...form.value, ...book }
})
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ form.name }}
            </h2>
            <p>Ingresas los nuevos datos del libro</p>
        </template>

        <MainContainer>
            <div class="py-6 grid gap-6">
                <form class="md:w-1/2" @submit.prevent="createBook">
                    <div>
                        <InputLabel for="name" value="Nombre" />

                        <TextInput id="name" class="mt-1 block w-full" v-model="form.name" required autofocus
                            autocomplete="name" />


                        <InputLabel for="description" value="Descripción" />

                        <TextInput id="description" class="mt-1 block w-full" v-model="form.description" required
                            autofocus autocomplete="description" />


                        <InputLabel for="price" value="Precio" />

                        <NumberInput id="price" class="mt-1 block w-full" v-model="form.price" required autofocus
                            autocomplete="price" />

                        <div v-if="errors" class="py-4 text-red-700">
                            {{ errors.message }}
                        </div>

                        <PrimaryButton class="mt-4" :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing">
                            Actualizar
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </MainContainer>
    </AuthenticatedLayout>
</template>
