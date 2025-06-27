<script setup>
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    student: Object,
    courses: Object,
});
const getDate = (date) =>
    new Date(date).toLocaleDateString("en-us", {
        month: "long",
        day: "numeric",
        year: "numeric",
    });

const form = useForm({
    firstName: props.student.firstName,
    lastName: props.student.lastName,
    middleName: props.student.middleName,
    suffix: props.student.suffix,
    birthday: props.student.birthday,
    gender: props.student.gender,
    province: props.student.province,
    city: props.student.city,
    email: props.student.email,
    contactNumber: props.student.contactNumber,
    barangay: props.student.barangay,
    street: props.student.street,
    houseNumber: props.student.houseNumber, //HOUSE NUMBER
    course: props.student.course_id,
    year: props.student.year,
    semester: props.student.semester,
    schoolYear: props.student.schoolYear,
});

const submit = () => {
    form.put(route("students.update", { id: props.student.id }));
};
</script>

<template>
    <BackButton routeName="students.index" text="Back to Students" />

    <div class="py-10 px-5">
        <h1 class="title">Update {{ student.firstName }}'s Information</h1>

        <div class="mx-auto max-w-3xl bg-white m-5">
            <form v-if="student" @submit.prevent="submit">
                <div>
                    <h1 class="font-bold text-2xl px-4 py-2">
                        Personal Information
                    </h1>
                    <div class="sm:flex justify-between gap-5 px-4">
                        <div class="w-full">
                            <label class="text-lg font-semibold"
                                >First Name</label
                            >
                            <input
                                v-model="form.firstName"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                                type="text"
                            />
                            <small
                                class="text-red-500"
                                v-if="form.errors.firstName"
                                >{{ form.errors.firstName }}</small
                            >
                        </div>
                        <div class="w-full">
                            <label class="text-lg font-semibold"
                                >Last Name</label
                            >
                            <input
                                v-model="form.lastName"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                                type="text"
                            />
                            <small
                                class="text-red-500"
                                v-if="form.errors.lastName"
                                >{{ form.errors.lastName }}</small
                            >
                        </div>
                    </div>
                    <div class="sm:flex justify-between gap-5 px-4">
                        <div class="w-full">
                            <label class="text-lg font-semibold"
                                >Middle Name</label
                            >
                            <input
                                v-model="form.middleName"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                                type="text"
                            />
                            <small
                                class="text-red-500"
                                v-if="form.errors.middleName"
                                >{{ form.errors.middleName }}</small
                            >
                        </div>
                        <div class="w-full">
                            <label class="text-lg font-semibold">Suffix</label>

                            <select
                                v-model="form.suffix"
                                class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black bg-white"
                            >
                                <option selected disabled value="">
                                    Select Suffix
                                </option>
                                <option value="">None</option>
                                <option value="Sr">Sr.</option>
                                <option value="Jr">Jr.</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                                <option value="V">V</option>
                            </select>
                            <small
                                class="text-red-500"
                                v-if="form.errors.schoolYear"
                                >{{ form.errors.schoolYear }}</small
                            >
                        </div>
                    </div>
                    <div class="sm:flex justify-between gap-5 px-4 mb-3">
                        <div class="w-full">
                            <label class="text-lg font-semibold"
                                >Birthday</label
                            >
                            <input
                                v-model="form.birthday"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                                type="date"
                            />
                            <small
                                class="text-red-500"
                                v-if="form.errors.birthday"
                                >{{ form.errors.birthday }}</small
                            >
                        </div>
                        <div class="w-full">
                            <label class="text-lg font-semibold">Gender</label>

                            <select
                                v-model="form.gender"
                                class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black bg-white"
                            >
                                <option selected disabled value="">
                                    Select Gender
                                </option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <small
                                class="text-red-500"
                                v-if="form.errors.gender"
                                >{{ form.errors.gender }}</small
                            >
                        </div>
                    </div>
                </div>
                <div>
                    <h1 class="font-bold text-2xl px-4 py-2">Address</h1>
                    <div class="sm:flex justify-between gap-5 px-4 mb-3">
                        <div class="w-full">
                            <label class="text-lg font-semibold"
                                >Province</label
                            >
                            <input
                                v-model="form.province"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                                type="text"
                            />
                            <small
                                class="text-red-500"
                                v-if="form.errors.province"
                                >{{ form.errors.province }}</small
                            >
                        </div>
                        <div class="w-full">
                            <label class="text-lg font-semibold">City</label>
                            <input
                                v-model="form.city"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                                type="text"
                            />
                            <small
                                class="text-red-500"
                                v-if="form.errors.city"
                                >{{ form.errors.city }}</small
                            >
                        </div>
                        <div class="w-full">
                            <label class="text-lg font-semibold"
                                >Barangay</label
                            >
                            <input
                                v-model="form.barangay"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                                type="text"
                            />
                            <small
                                class="text-red-500"
                                v-if="form.errors.barangay"
                                >{{ form.errors.barangay }}</small
                            >
                        </div>
                        <div class="w-full">
                            <label class="text-lg font-semibold"
                                >Street No.</label
                            >
                            <input
                                v-model="form.street"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                                type="text"
                            />
                            <small
                                class="text-red-500"
                                v-if="form.errors.street"
                                >{{ form.errors.street }}</small
                            >
                        </div>
                        <div class="w-full">
                            <label class="text-lg font-semibold"
                                >House No.</label
                            >
                            <input
                                v-model="form.houseNumber"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                                type="text"
                            />
                            <small
                                class="text-red-500"
                                v-if="form.errors.houseNumber"
                                >{{ form.errors.houseNumber }}</small
                            >
                        </div>
                    </div>
                </div>
                <div>
                    <h1 class="font-bold text-2xl px-4 py-2">
                        Contact Information
                    </h1>
                    <div class="sm:flex justify-between gap-5 px-4 mb-3">
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
                                >Contact Number</label
                            >
                            <input
                                v-model="form.contactNumber"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black"
                                type="text"
                                placeholder="09123456789"
                            />
                            <small
                                class="text-red-500"
                                v-if="form.errors.contactNumber"
                                >{{ form.errors.contactNumber }}</small
                            >
                        </div>
                    </div>
                </div>
                <div>
                    <h1 class="font-bold text-2xl px-4 py-2">
                        Course, Semester, and Year
                    </h1>
                    <div class="sm:flex justify-between gap-5 px-4 mb-3">
                        <div v-if="courses" class="w-full">
                            <label class="text-lg font-semibold">Course</label>

                            <select
                                v-model="form.course"
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
                                    {{ course.name }}
                                </option>
                            </select>
                            <small
                                class="text-red-500"
                                v-if="form.errors.course"
                                >{{ form.errors.course }}</small
                            >
                        </div>
                        <div class="w-full">
                            <label class="text-lg font-semibold">Year</label>

                            <select
                                v-model="form.year"
                                class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black bg-white"
                            >
                                <option selected disabled value="">
                                    Select Year Level
                                </option>
                                <option value="1">First</option>
                                <option value="2">Second</option>
                                <option value="3">Third</option>
                                <option value="4">Fourth</option>
                                <option value="5">Fifth</option>
                                <option value="0">Irregular</option>
                            </select>
                            <small
                                class="text-red-500"
                                v-if="form.errors.year"
                                >{{ form.errors.year }}</small
                            >
                        </div>
                        <div class="w-full">
                            <label class="text-lg font-semibold"
                                >Semester</label
                            >

                            <select
                                v-model="form.semester"
                                class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black bg-white"
                            >
                                <option selected disabled value="">
                                    Select Semester
                                </option>

                                <option value="First Semester">
                                    First Semester
                                </option>
                                <option value="Second Semester">
                                    Second Semester
                                </option>
                                <option value="Summer">Summer</option>
                            </select>
                            <small
                                class="text-red-500"
                                v-if="form.errors.semester"
                                >{{ form.errors.semester }}</small
                            >
                        </div>
                        <div class="w-full">
                            <label class="text-lg font-semibold"
                                >School Year</label
                            >

                            <select
                                v-model="form.schoolYear"
                                class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-black bg-white"
                            >
                                <option selected disabled value="">
                                    Select School Year
                                </option>
                                <option value="2025-2026">2025-2026</option>
                            </select>
                            <small
                                class="text-red-500"
                                v-if="form.errors.schoolYear"
                                >{{ form.errors.schoolYear }}</small
                            >
                        </div>
                    </div>
                </div>
                <button
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mx-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                >
                    Update Student
                </button>
            </form>
            <div v-else>
                <h1 class="title">No Student Information</h1>
            </div>
        </div>
    </div>
</template>
