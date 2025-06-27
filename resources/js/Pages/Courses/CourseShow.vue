<script setup>
const props = defineProps({
    course: Object,
    subjects: Object,
});

const getDate = (date) =>
    new Date(date).toLocaleDateString("en-us", {
        month: "long",
        day: "numeric",
        year: "numeric",
    });
</script>

<template>
    <div>
        <BackButton routeName="courses.index" text="Back to Courses" />
        <div class="max-w-3xl mx-auto my-auto pt-10">
            <h1 class="title">Show Course Information</h1>
            <div class="bg-slate-500 max-3xl rounded-md">
                <div class="grid grid-cols-2 gap-2 text-2xl p-5">
                    <div class="font-bold">Course:</div>
                    <div>{{ course.name }}</div>
                    <div class="font-bold">Code:</div>
                    <div>{{ course.code }}</div>
                    <div class="font-bold">Description:</div>
                    <div class="break-word">{{ course.description }}</div>
                    <div class="font-bold">Program Year:</div>
                    <div>{{ course.program_year }}</div>
                    <div class="font-bold">Created:</div>
                    <div>{{ getDate(course.created_at) }}</div>
                </div>
            </div>
        </div>
        <div class="mx-auto max-w-7xl px-6 py-5">
            <div class="relative overflow-x-auto sm:rounded-lg">
                <h1 class="title">{{ course.code }} Subject List</h1>

                <table
                    class="table-auto w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
                >
                    <thead class="text-sm text-white uppercase bg-gray-500">
                        <tr>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Code</th>
                            <!-- <th scope="col" class="px-6 py-3">
                                    Description
                                </th> -->
                            <th scope="col" class="px-6 py-3">Unit</th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody v-if="subjects.length > 0">
                        <tr
                            v-for="subject in subjects"
                            :key="subject.id"
                            class="bg-white text-white text-sm border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200"
                        >
                            <td class="px-6 py-4">{{ subject.name }}</td>
                            <td class="px-6 py-4">{{ subject.code }}</td>
                            <!-- <td class="px-6 py-4">
                                    {{
                                        subject.description.substring(0, 15) +
                                        ".."
                                    }}
                                </td> -->
                            <td class="px-6 py-4">
                                {{ subject.unit }}
                            </td>
                            <td class="px-6 py-4 flex">
                                <Link
                                    :href="
                                        route('subjects.show', {
                                            id: subject.id,
                                        })
                                    "
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mx-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                >
                                    View
                                </Link>
                                <button
                                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mx-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800"
                                >
                                    Edit
                                </button>
                                <button
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
