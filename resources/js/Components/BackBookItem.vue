<script setup lang="ts">
import DangerButton from './DangerButton.vue';
import SecondaryButton from './SecondaryButton.vue';

</script>

<template>
    <div class="bg-white p-6 rounded-lg border">
        <div class="h-44 bg-black">
            <img src="#" alt="">
        </div>
        <div class="h-48 pt-4 flex flex-col justify-between gap-4">
            <div>
                <h4 class="text-xl font-bold mb-2">Harry Potter</h4>
                <p class="text-wrap truncate max-h-24">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur reiciendis voluptatibus
                    corporis doloribus labore dignissimos laborum veniam, cumque deserunt reprehenderit
                    temporibus,
                    veritatis facilis laboriosam dolore illo quos! Earum, doloribus quia.
                </p>
            </div>
            <div class="flex flex-wrap gap-2">
                <SecondaryButton class="text-center">Editar</SecondaryButton>
                <DangerButton class="text-center">Eliminar</DangerButton>
            </div>
        </div>
    </div>
</template>