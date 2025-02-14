<script setup lang="ts">
import { ref } from 'vue';
import DangerButton from './DangerButton.vue';
import Modal from './Modal.vue';
import SecondaryButton from './SecondaryButton.vue';
import axios from 'axios';
import { router } from '@inertiajs/vue3';

const { user } = defineProps(['user'])
const emit = defineEmits(['deleted'])

const confirmingUserDeletion = ref(false);

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;
}

const closeModal = () => {
    confirmingUserDeletion.value = false;
};

const gotToEdit = () => {
    router.visit('/backoffice/users/' + user.id + '/edit')
}

const deleteUser = () => {
    axios.post('/backoffice/users/' + user.id, { _method: 'delete' })
        .then(response => {
            closeModal()
            emit('deleted')
        })
};
</script>

<template>
    <div class="bg-white p-6 rounded-lg border">
        <div class="flex justify-between gap-4">
            <div>
                <h4 class="text-xl font-bold mb-2">{{ user.name }}</h4>

                <div class="mb-2">
                    <span class="px-2 py-1 bg-blue-200 text-blue-600 rounded text-sm">{{ user.role.name }}</span>
                </div>
                <p>{{ user.email }}</p>
            </div>
            <div class="flex items-center gap-2 justify-center">
                <SecondaryButton @click="gotToEdit" class="text-center">Editar</SecondaryButton>
                <DangerButton @click="confirmUserDeletion" class="text-center">Eliminar</DangerButton>
            </div>
        </div>
    </div>
    <Modal :show="confirmingUserDeletion" @close="closeModal" maxWidth="sm">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900 text-center">
                ¿Está seguro de eliminar al usuario?
            </h2>

            <div class="mt-6 flex justify-end">
                <SecondaryButton @click="closeModal">
                    Cancelar
                </SecondaryButton>

                <DangerButton class="ms-3" @click="deleteUser">
                    Eliminar
                </DangerButton>
            </div>
        </div>
    </Modal>
</template>