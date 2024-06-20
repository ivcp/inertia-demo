<template>
    <Head title="Create User" />
    <h1 class="text-3xl">Create New User</h1>
    <form @submit.prevent="submit" class="flex flex-col w-80">
        <label for="name">Name</label>
        <input
            v-model="form.name"
            type="text"
            name="name"
            id="name"
            class="bg-blue-100"
        />
        <label for="email">Email</label>
        <input
            v-model="form.email"
            type="email"
            name="email"
            id="email"
            required
            class="bg-blue-100"
        />
        <label for="password">Password</label>
        <input
            v-model="form.password"
            type="password"
            name="password"
            id="password"
            required
            class="bg-blue-100"
        />
        <button type="submit" class="bg-blue-200 w-1/2 self-center mt-4">
            Submit
        </button>
    </form>
</template>

<script setup>
import { Head, router } from "@inertiajs/vue3";
import { reactive } from "vue";

const form = reactive({
    name: "",
    email: "",
    password: "",
});

const submit = () => {
    router.post("/users", form);
};
</script>
