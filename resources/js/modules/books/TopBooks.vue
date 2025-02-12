<script setup lang="ts">
import PrimaryButton from '@/Components/PrimaryButton.vue';

</script>

<template>
    <div class="bg-gray-200 pt-16 pb-32 px-16">
        <h3 class="text-center text-3xl font-semibold uppercase mb-16">Libros recientes</h3>
        <div class="grid lg:grid-cols-3 gap-12">
            <div class="bg-white p-6 rounded-lg">
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
                    <div class="text-center">
                        <PrimaryButton class="text-center">Ver detalles</PrimaryButton>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg">
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
                    <div class="text-center">
                        <PrimaryButton class="text-center">Ver detalles</PrimaryButton>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg">
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
                    <div class="text-center">
                        <PrimaryButton class="text-center">Ver detalles</PrimaryButton>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>