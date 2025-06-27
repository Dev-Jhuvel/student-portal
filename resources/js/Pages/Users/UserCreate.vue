<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});
const submit = () => {
    form.post(route("users.create"));
};
</script>
<template>
    <div>
        <h1 class="title">Add New User</h1>

        <Link
            :href="route('users.index')"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mx-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mb-5"
            >User List</Link
        >
        <div class="rounded-lg mx-auto max-w-3xl bg-white pb-10">
            <form @submit.prevent="submit">
                <div class="mb-5">
                    <h1 class="font-bold text-2xl px-4 py-2 text-center">
                        User Information
                    </h1>
                    <div class="max-w-lg p-5 mx-auto">
                        <div class="w-full">
                            <label class="text-lg font-semibold">Name</label>
                            <input
                                v-model="form.name"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                                type="text"
                            />
                            <small
                                class="text-red-500"
                                v-if="form.errors.name"
                                >{{ form.errors.name }}</small
                            >
                        </div>
                        <div class="w-full">
                            <label class="text-lg font-semibold">Email</label>
                            <input
                                v-model="form.email"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                                type="email"
                            />
                            <small
                                class="text-red-500"
                                v-if="form.errors.email"
                                >{{ form.errors.email }}</small
                            >
                        </div>
                        <div class="w-full">
                            <label class="text-lg font-semibold"
                                >Password</label
                            >
                            <input
                                v-model="form.password"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                                type="password"
                            />
                            <small
                                class="text-red-500"
                                v-if="form.errors.password"
                                >{{ form.errors.password }}</small
                            >
                        </div>
                        <div class="w-full">
                            <label class="text-lg font-semibold"
                                >Confirm Password</label
                            >
                            <input
                                v-model="form.password_confirmation"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                                type="password"
                            />
                            <small
                                class="text-red-500"
                                v-if="form.errors.password_confirmation"
                                >{{ form.errors.password_confirmation }}</small
                            >
                        </div>
                        <button
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-7 py-2.5 mx-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-5"
                        >
                            Add User
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
