<script lang="ts" setup>
import { ref } from 'vue';

const responsiveMenu = ref<boolean>(false)
const dropdownUser = ref<boolean>(false)

const toggleDropdownUser = () => {
    dropdownUser.value = !dropdownUser.value
}

</script>
<template>
    <nav class="bg-gray-900">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-10 items-center justify-between">
                <div></div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <!-- Profile dropdown -->
                    <a href="/login" class="block px-4 py-2 text-sm text-gray-50" role="menuitem" tabindex="-1"
                        id="user-menu-item-0">Iniciar sesión</a>
                    <a href="/register" class="block px-4 py-2 text-sm text-gray-50" role="menuitem" tabindex="-1"
                        id="user-menu-item-1">Crear cuenta</a>
                </div>
            </div>
        </div>
    </nav>
</template>