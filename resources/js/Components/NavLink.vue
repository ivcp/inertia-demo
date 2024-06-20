<template>
    <Link class="text-blue-500 hover:underline" :class="{ 'font-bold': active }"
        ><slot
    /></Link>
</template>

<script setup>
defineProps({
    active: Boolean,
});
</script>
