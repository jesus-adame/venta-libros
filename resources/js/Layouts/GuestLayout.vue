<script setup lang="ts">
import Navbar from '@/Components/Navbar.vue';
import TopBar from '@/Components/TopBar.vue';
</script>

<template>
    <TopBar />
    <Navbar />
    <slot />
</template>
