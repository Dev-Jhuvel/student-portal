<script setup>
import { router } from "@inertiajs/vue3";


const props = defineProps({
    courses: Object,
});

const getDate = (date) =>
    new Date(date).toLocaleDateString("en-us", {
        year: "numeric",
        month: "short",
        day: "numeric",
    });

const deleteButton = (id, count) => {
    if (confirm(`This course has ${count} subjects. Are you sure?`)) {
        router.delete(route("courses.destroy", { id: id }));
    }
};
</script>

<template>
    <div>
        <h1 class="title">Manage Course</h1>

        <Link
            :href="route('courses.create')"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mx-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mb-5"
            >Add Course Information</Link
        >
        <div class="mx-auto max-w-7xl px-6 py-5">
            <div class="relative overflow-x-auto sm:rounded-lg">
                <table
                    class="table-auto w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
                >
                    <thead class="text-sm text-white uppercase bg-gray-500">
                        <tr>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Code</th>
                            <th scope="col" class="px-6 py-3">Subject</th>
                            <th scope="col" class="px-6 py-3">Description</th>
                            <th scope="col" class="px-6 py-3">Years</th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody v-if="courses">
                        <tr
                            v-for="course in courses"
                            :key="course.id"
                            class="bg-white text-white text-sm border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200"
                        >
                            <td class="px-6 py-4">{{ course.name }}</td>
                            <td class="px-6 py-4">{{ course.code }}</td>
                            <td class="px-6 py-4">
                                {{ course.subjects_count }}
                            </td>
                            <td class="px-6 py-4">
                                {{ course.description.substring(0, 15) + ".." }}
                            </td>
                            <td class="px-6 py-4">{{ course.program_year }}</td>
                            <td class="px-6 py-4 flex">
                                <Link
                                    :href="
                                        route('courses.show', { id: course.id })
                                    "
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mx-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                >
                                    View
                                </Link>
                                <Link
                                    :href="
                                        route('courses.edit', { id: course.id })
                                    "
                                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mx-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800"
                                >
                                    Edit
                                </Link>
                                <button
                                    @click="
                                        deleteButton(
                                            course.id,
                                            course.subjects_count
                                        )
                                    "
                                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mx-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
