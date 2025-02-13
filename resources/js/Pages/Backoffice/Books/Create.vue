<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import MainContainer from '@/Components/MainContainer.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    description: '',
    price: 0
})

</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Registar nuevo libro
            </h2>
            <p>Ingresas los datos del nuevo libro</p>
        </template>

        <MainContainer>
            <div class="py-6 grid gap-6">
                <form class="md:w-1/2" action="">
                    <div>
                        <InputLabel for="name" value="Nombre" />

                        <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required
                            autofocus autocomplete="name" />

                        <InputLabel for="description" value="Descripción" />

                        <TextInput id="description" type="text" class="mt-1 block w-full" v-model="form.description"
                            required autofocus autocomplete="description" />

                        <InputLabel for="price" value="Precio" />
                        <!-- <TextInput id="price" type="number" class="mt-1 block w-full" v-model="form.price" required
                            autofocus autocomplete="price" /> -->

                        <InputError class="mt-2" :message="form.errors.name" />

                        <PrimaryButton class="mt-4" :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing">
                            Registrar
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </MainContainer>
    </AuthenticatedLayout>
</template>
