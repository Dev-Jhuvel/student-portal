<script setup>
import { useForm } from "@inertiajs/vue3";
import Guest from "../../Layouts/Guest.vue";
defineOptions({ layout: Guest });
const form = useForm({
    email: "",
    password: "",
});
const submit = () => {
    form.post(route("login"));
};
</script>
<template>
    <div>
        <div class="rounded-lg mx-auto max-w-3xl bg-white pt-10">
            <div class="flex justify-center gap-3">
                <img class="w-24" src="../../../images/university.png" alt="" />
                <h1 class="title">University</h1>
            </div>
            <form @submit.prevent="submit">
                <div class="mb-5">
                    <h1 class="font-bold text-2xl px-4 py-2 text-center">
                        Login to your account
                    </h1>
                    <div class="max-w-lg p-5 mx-auto">
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

                        <button
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-7 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-5"
                        >
                            Login
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
