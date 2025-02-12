<script setup lang="ts">
import PrimaryButton from './PrimaryButton.vue';

</script>

<template>
    <div class="bg-white p-6 rounded-lg border">
        <div class="h-44 bg-black">
            <img src="#" alt="">
        </div>
        <div class="h-23 pt-4 flex flex-col justify-between gap-4">
            <div>
                <h4 class="text-xl text-center font-bold mb-2">Aventura</h4>
            </div>
            <div class="text-center">
                <PrimaryButton class="text-center">Ver detalles</PrimaryButton>
            </div>
        </div>
    </div>
</template>