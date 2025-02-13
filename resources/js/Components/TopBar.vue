<script lang="ts" setup>
import { Link } from '@inertiajs/vue3';

</script>
<template>
    <div class="bg-gray-900">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-10 items-center justify-between">
                <div></div>
                <div v-if="!$page.props.auth.user"
                    class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <!-- Profile dropdown -->
                    <Link href="/login" class="block px-4 py-2 text-sm text-gray-50" role="menuitem" tabindex="-1"
                        id="user-menu-item-0">Iniciar sesión</Link>
                    <Link href="/register" class="block px-4 py-2 text-sm text-gray-50" role="menuitem" tabindex="-1"
                        id="user-menu-item-1">Crear cuenta</Link>
                </div>
                <div v-else
                    class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <Link href="/backoffice/dashboard" class="block px-4 py-2 text-sm text-gray-50" role="menuitem"
                        tabindex="-1" id="user-menu-item-1">Mis libros</Link>
                </div>
            </div>
        </div>
    </div>
</template>