<script setup lang="ts">
import { onMounted, ref } from 'vue';
import SecondaryButton from './SecondaryButton.vue';

const file = ref<File | null>();
const fileUrl = ref<string>('');
const showInput = ref(true);

const input = ref<HTMLInputElement | null>(null);

const emit = defineEmits(['change'])

onMounted(() => {
    if (input.value?.hasAttribute('autofocus')) {
        input.value?.focus();
    }
});

const onFileChanged = ($event: Event) => {
    const target = $event.target as HTMLInputElement;
    if (target && target.files) {
        file.value = target.files[0]
        fileUrl.value = URL.createObjectURL(file.value);
        emit('change', file.value)
    }
}

const clearInput = () => {
    file.value = null
    fileUrl.value = ''
    resetInput()
}

const resetInput = () => {
    showInput.value = false;
    setTimeout(() => {
        showInput.value = true;
    }, 0); // Re-renderizar el input
}

defineExpose({ focus: () => input.value?.focus() });
</script>

<template>
    <div class="rounded-md border py-2 px-3 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        <div v-if="fileUrl" class="w-20 text-center mb-2 rounded overflow-hidden mx-auto">
            <img :src="fileUrl" alt="Vista previa" class="w-full" />
        </div>
        <div class="flex items-center gap-2">
            <input v-if="showInput" class="w-full" type="file" @change="onFileChanged" accept="image/*" capture
                ref="input" />
            <SecondaryButton v-if="file" @click="clearInput">Limpiar</SecondaryButton>
        </div>
    </div>
</template>
