<template>
    <Head title="App" />
    <header class="flex items-center justify-around bg-gray-200">
        <h1 class="font-bold text-lg">My App</h1>
        <p class="text-sm">
            Welcome back, {{ $page.props.auth.user.username }}
        </p>
        <Nav />
    </header>
    <section class="p-6">
        <slot />
    </section>
</template>

<script setup>
import Nav from "./Nav.vue";
import { Head } from "@inertiajs/vue3";
</script>
