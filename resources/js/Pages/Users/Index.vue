<template>
    <Head title="App - Users" />

    <h1 class="mb-2 text-lg font-bold">Users</h1>

    <input type="text" v-model="search" placeholder="search" />

    <ul>
        <li v-for="user of users.data" :key="user.id">{{ user.name }}</li>
    </ul>

    <Pagination :links="users.links" />
</template>

<script setup>
import { Head } from "@inertiajs/vue3";
import Pagination from "../../Shared/Pagination.vue";
import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";

const props = defineProps({
    users: Object,
    filters: Object,
});

const search = ref(props.filters.search);
watch(search, (value) =>
    router.get(
        "/users",
        { search: value },
        {
            preserveState: true,
        }
    )
);
</script>
