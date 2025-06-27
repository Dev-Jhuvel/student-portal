<script setup>
import { router, useForm } from "@inertiajs/vue3";
import { debounce } from "lodash";
import { ref, watch } from "vue";
const props = defineProps({
    students: Object,
    courses: Object,
    searchTerm: String,
    filterParams: Object,
});

const getDate = (date) =>
    new Date(date).toLocaleDateString("en-us", {
        year: "numeric",
        month: "short",
        day: "numeric",
    });

const fullName = (fName, lName, mName, suffix) => {
    return `${fName} ${(mName ? `${mName}` : "").charAt(0)}${
        mName ? "." : ""
    } ${lName} ${suffix ?? ""}`;
};

const deleteButton = (id) => {
    if (confirm("Are you sure?")) {
        router.delete(route("students.destroy", { id: id }));
    }
};
const filterByCourse = () => {
    console.log(filter.value);
    router.get("/students", { filter: filter.value }, { preserveState: true });
};
const sortByColumn = (column) => {
    isASC.value = !isASC.value;
    console.log(isASC.value);
    router.get("/students", {
        sort: column,
        order: isASC.value,
    });
};
const search = ref(props.searchTerm);
const filter = ref({
    year: "",
    course: "",
});
const sort = ref("");
let isASC = ref(false);
watch(
    search,
    debounce(
        (query) =>
            router.get("/students", { search: query }, { preserveState: true }),
        500
    )
);
</script>

<template>
    <div>
        <h1 class="title">Manage Student</h1>

        <div class="mx-auto max-w-7xl px-6 py-2">
            <div class="flex justify-between items-center pe-2">
                <Link
                    :href="route('students.create')"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mx-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                    >Add Student Information</Link
                >
                <div class="flex justify-between gap-x-5">
                    <div v-if="courses" class="flex gap-3 items-center">
                        <label class="text-lg font-semibold">Course: </label>

                        <select
                            v-model="filter.course"
                            class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black bg-white"
                        >
                            <option selected disabled value="">
                                Select Course
                            </option>

                            <option
                                v-for="course in courses"
                                :key="course.id"
                                :value="course.id"
                            >
                                {{ course.code }}
                            </option>
                        </select>
                    </div>
                    <div class="flex gap-3 items-center">
                        <label class="text-lg font-semibold">Year: </label>

                        <select
                            v-model="filter.year"
                            class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black bg-white"
                        >
                            <option selected disabled value="">
                                Select Year
                            </option>

                            <option value="1">First Year</option>
                            <option value="2">Second Year</option>
                            <option value="3">Third Year</option>
                            <option value="4">Fourth Year</option>
                            <option value="5">Fifth Year</option>
                        </select>
                    </div>
                    <div>
                        <button
                            @click="filterByCourse"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm p-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 disabled:bg-gray-500 disabled:hover:bg-gray-500"
                            v-bind:disabled="
                                filter.year === '' && filter.course === ''
                            "
                        >
                            filter
                        </button>
                    </div>
                    <div>
                        <input
                            v-model="search"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                            type="search"
                            placeholder="Search..."
                        />
                    </div>
                </div>
            </div>
            <div class="relative overflow-x-auto sm:rounded-lg mt-2">
                <table
                    class="table-auto w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
                >
                    <thead class="text-sm text-white uppercase bg-gray-500">
                        <tr>
                            <!-- <th
                                @click="sortByColumn('firstName')"
                                scope="col"
                                class="px-6 py-3"
                            >
                                Date
                            </th> -->
                            <th scope="col" class="px-6 py-3">Full Name</th>
                            <th scope="col" class="px-6 py-3">Course</th>
                            <th scope="col" class="px-6 py-3">Year</th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody v-if="students.data">
                        <tr
                            v-for="student in students.data"
                            :key="student.id"
                            class="bg-white text-white text-sm border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200"
                        >
                            <!-- <td class="px-6 py-4">
                                {{ getDate(student.created_at) }}
                            </td> -->
                            <td class="px-6 py-4">
                                {{
                                    fullName(
                                        student.firstName,
                                        student.lastName,
                                        student.middleName,
                                        student.suffix
                                    )
                                }}
                            </td>
                            <td class="px-6 py-4">{{ student.course.name }}</td>
                            <td class="px-6 py-4">{{ student.year }}</td>
                            <td class="px-6 py-4 flex justify-center">
                                <Link
                                    :href="
                                        route('students.show', {
                                            id: student.id,
                                        })
                                    "
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mx-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                >
                                    View
                                </Link>
                                <Link
                                    :href="
                                        route('students.edit', {
                                            id: student.id,
                                        })
                                    "
                                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mx-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800"
                                >
                                    Edit
                                </Link>
                                <button
                                    @click="deleteButton(student.id)"
                                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mx-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                    <div v-else>
                        <h1 class="title">No Student Record</h1>
                    </div>
                </table>
                <PaginationLinks :paginator="students" />
            </div>
        </div>
    </div>
</template>
