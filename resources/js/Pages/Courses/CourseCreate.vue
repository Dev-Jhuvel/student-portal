<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    code: "",
    description: "",
    program_year: "",
});
const submit = () => {
    form.post(route("courses.store"));
};
</script>
<template>
    <div>
        <BackButton routeName="courses.index" text="Back to Course" />
        <h1 class="title">Create Course</h1>
        <div class="rounded-lg mx-auto max-w-3xl bg-white pb-10">
            <form @submit.prevent="submit">
                <div class="mb-5">
                    <h1 class="font-bold text-2xl px-4 py-2">
                        Course Information
                    </h1>
                    <div class="flex justify-between gap-5 px-4">
                        <div class="w-full">
                            <label class="text-lg font-semibold"
                                >Course Name</label
                            >
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
                            <label class="text-lg font-semibold"
                                >Course Code</label
                            >
                            <input
                                v-model="form.code"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                                type="text"
                            />
                            <small
                                class="text-red-500"
                                v-if="form.errors.code"
                                >{{ form.errors.code }}</small
                            >
                        </div>
                    </div>
                    <div class="flex justify-between gap-5 px-4">
                        <div class="w-full">
                            <label class="text-lg font-semibold"
                                >Course Description</label
                            >
                            <textarea
                                v-model="form.description"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                                rows="10"
                            ></textarea>
                            <small
                                class="text-red-500"
                                v-if="form.errors.description"
                                >{{ form.errors.description }}</small
                            >
                        </div>
                        <div class="w-full">
                            <label class="text-lg font-semibold"
                                >Program Year</label
                            >

                            <select
                                v-model="form.program_year"
                                class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black bg-white"
                            >
                                <option selected disabled value="">
                                    How Many Years
                                </option>
                                <option value="2">2 years</option>
                                <option value="3">3 years</option>
                                <option value="4">4 years</option>
                                <option value="5">5 years</option>
                            </select>
                            <small
                                class="text-red-500"
                                v-if="form.errors.program_year"
                                >{{ form.errors.program_year }}</small
                            >
                        </div>
                    </div>
                </div>

                <button
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mx-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ms-4"
                >
                    Add Course
                </button>
            </form>
        </div>
    </div>
</template>
