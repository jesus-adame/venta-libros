<script setup lang="ts">
import Footer from '@/Components/Footer.vue';
import Navbar from '@/Components/Navbar.vue';
import TopBar from '@/Components/TopBar.vue';
</script>

<template>
    <div class="bg-white">
        <TopBar />
        <Navbar />
        <slot />
        <Footer />
    </div>
</template>
