<script lang="ts" setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const responsiveMenu = ref<boolean>(false)

const toggleResponsiveMenu = () => {
    responsiveMenu.value = !responsiveMenu.value
}

const routerLinks = [
    {
        label: 'Inicio',
        to: '/',
        routeName: 'home'
    },
    {
        label: 'Libros',
        to: '/libros',
        routeName: 'public.books.index.page'
    },
    {
        label: 'Categorías',
        to: '/categorias',
        routeName: 'public.categories.index.page'
    },
]

const linkClass = (routeName: string) => {
    if (route().current() === routeName) {
        return [
            'bg-gray-900 text-white'
        ]
    }

    return [
        'text-gray-300 hover:bg-gray-700 hover:text-white'
    ]
}
</script>
<template>
    <nav class="bg-gray-700">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" @click="toggleResponsiveMenu"
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!--
                            Icon when menu is closed.
                            Menu open: "hidden", Menu closed: "block"
                        -->
                        <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!--
                            Icon when menu is open.
                            Menu open: "block", Menu closed: "hidden"
                        -->
                        <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex gap-2 shrink-0 items-center text-white">
                        <img class="h-8 w-auto" src="/images/logo.svg" alt="Your Company">
                        <span>Libros Online</span>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <Link v-for="(item, index) in routerLinks" :key="index" :href="item.to"
                                class="rounded-md px-3 py-2 text-sm font-medium hover:text-white"
                                :class="linkClass(item.routeName)" aria-current="page">
                            {{ item.label }}
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div v-if="responsiveMenu" class="sm:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <Link v-for="(item, index) in routerLinks" :key="index" :href="item.to"
                    class="block rounded-md px-3 py-2 text-base font-medium text-white"
                    :class="linkClass(item.routeName)" aria-current="page">
                {{ item.label }}
                </Link>
            </div>
        </div>
    </nav>
</template>