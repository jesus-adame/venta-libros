<script setup lang="ts">
import { Book } from '@/types';
import DangerButton from './DangerButton.vue';
import SecondaryButton from './SecondaryButton.vue';
import Modal from './Modal.vue';
import { ref } from 'vue';
import axios from 'axios';
import { router } from '@inertiajs/vue3';

const { book } = defineProps<{
    book: Book
}>()

const emit = defineEmits(['deleted'])
const confirmingBookDeletion = ref(false);

const confirmBookDeletion = () => {
    confirmingBookDeletion.value = true;
}

const closeModal = () => {
    confirmingBookDeletion.value = false;
};

const deleteBook = () => {
    axios.post('/backoffice/books/' + book.id, { _method: 'delete' })
        .then(response => {
            closeModal()
            emit('deleted')
        })
};

const gotToEdit = () => {
    router.visit('/backoffice/books/' + book.id + '/edit')
}
</script>

<template>
    <div class="bg-white p-6 rounded-lg border">
        <div class="h-44 overflow-hidden">
            <img v-if="book.image" :src="'/' + book.image" :alt="book.name">
            <div v-else class="flex items-center justify-center border h-full bg-gray-100 text-gray-600">
                <p>No hay imagen</p>
            </div>
        </div>
        <div class="h-48 pt-4 flex flex-col justify-between gap-4">
            <div>
                <h4 @click="gotToEdit" class="text-xl font-bold mb-2 cursor-pointer">{{ book.name }}</h4>
                <p class="text-wrap truncate max-h-24">
                    {{ book.description }}
                </p>
                <span>${{ book.price }}</span>
            </div>
            <div class="flex flex-wrap gap-2">
                <SecondaryButton @click="gotToEdit" class="text-center">Editar</SecondaryButton>
                <DangerButton @click="confirmBookDeletion" class="text-center">Eliminar</DangerButton>
            </div>
        </div>
    </div>
    <Modal :show="confirmingBookDeletion" @close="closeModal" maxWidth="sm">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900 text-center">
                ¿Está seguro de eliminar el libro?
            </h2>

            <div class="mt-6 flex justify-end">
                <SecondaryButton @click="closeModal">
                    Cancelar
                </SecondaryButton>

                <DangerButton class="ms-3" @click="deleteBook">
                    Eliminar
                </DangerButton>
            </div>
        </div>
    </Modal>
</template>