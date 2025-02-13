<script setup lang="ts">
import { ref } from 'vue';
import DangerButton from './DangerButton.vue';
import Modal from './Modal.vue';
import SecondaryButton from './SecondaryButton.vue';
import axios from 'axios';

const { category } = defineProps(['category'])
const emit = defineEmits(['deleted'])

const confirmingCategoryDeletion = ref(false);

const confirmCategoryDeletion = () => {
    confirmingCategoryDeletion.value = true;
}

const closeModal = () => {
    confirmingCategoryDeletion.value = false;
};

const deleteCategory = () => {
    axios.post('/backoffice/categories/' + category.id, { _method: 'delete' })
        .then(response => {
            closeModal()
            emit('deleted')
        })
};
</script>

<template>
    <div class="bg-white p-6 rounded-lg border">
        <div class="h-44 overflow-hidden">
            <img v-if="category.image" :src="'/' + category.image" :alt="category.name">
            <div v-else class="flex items-center justify-center border h-full bg-gray-100 text-gray-600">
                <p>No hay imagen</p>
            </div>
        </div>
        <div class="h-23 pt-4 flex flex-col justify-between gap-4">
            <div>
                <h4 class="text-xl text-center font-bold mb-2">{{ category.name }}</h4>
            </div>
            <div class="text-center">
                <DangerButton @click="confirmCategoryDeletion" class="text-center">Eliminar</DangerButton>
            </div>
        </div>
    </div>
    <Modal :show="confirmingCategoryDeletion" @close="closeModal" maxWidth="sm">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900 text-center">
                ¿Está seguro de eliminar la categoría?
            </h2>

            <div class="mt-6 flex justify-end">
                <SecondaryButton @click="closeModal">
                    Cancelar
                </SecondaryButton>

                <DangerButton class="ms-3" @click="deleteCategory">
                    Eliminar
                </DangerButton>
            </div>
        </div>
    </Modal>
</template>