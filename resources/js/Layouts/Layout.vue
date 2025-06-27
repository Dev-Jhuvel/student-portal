<script setup>
import { ref } from "vue";

let isMinimize = ref(false);
const sidebarMin = () => {
    isMinimize.value = !isMinimize.value;
};
</script>

<template>
    <div class="flex min-h-screen">
        <div class="bg-gray-600 border-r border-gray-200">
            <div class="py-4 px-6 flex items-center gap-3">
                <Link>
                    <img class="logo" src="../../images/university.png" alt=""
                /></Link>
                <h1
                    class="text-white text-2xl uppercase font-bold"
                    :class="{ hidden: isMinimize }"
                >
                    University
                </h1>
            </div>
            <hr />
            <div class="flex items-center gap-3 px-5 py-2 border border-b">
                <Icon class="icon" name="user" />
                <div class="text-center">
                    <h1
                        class="font-medium text-2xl tracking-wide"
                        :class="{ hidden: isMinimize }"
                    >
                        {{ $page.props.auth.user.name }}
                    </h1>
                    <p
                        class="text-normal tracking-wide"
                        :class="{ hidden: isMinimize }"
                    >
                        Admin
                    </p>
                </div>
            </div>
            <Link
                :href="route('dashboard')"
                class="flex items-center gap-3 px-5 py-2 border border-b"
                :class="{
                    'bg-gray-400 text-white': $page.url === '/',
                }"
            >
                <Icon class="icon" name="dashboard" />
                <h1
                    class="font-medium text-2xl tracking-wide"
                    :class="{ hidden: isMinimize }"
                >
                    Dashboard
                </h1>
            </Link>
            <Link
                :href="route('students.store')"
                class="flex items-center gap-3 px-5 py-2 border border-b"
                :class="{
                    'bg-gray-400 text-white': $page.url.includes('/students'),
                }"
            >
                <Icon class="icon" name="student" />
                <h1
                    class="font-medium text-2xl tracking-wide"
                    :class="{ hidden: isMinimize }"
                >
                    Students
                </h1>
            </Link>
            <Link
                :href="route('courses.index')"
                class="flex items-center gap-3 px-5 py-2 border border-b"
                :class="{
                    'bg-gray-400 text-white': $page.url.includes('/courses'),
                }"
            >
                <Icon class="icon" name="course" />
                <h1
                    class="font-medium text-2xl tracking-wide"
                    :class="{ hidden: isMinimize }"
                >
                    Courses
                </h1>
            </Link>
            <Link
                :href="route('users.index')"
                class="flex items-center gap-3 px-5 py-2 border border-b"
                :class="{
                    'bg-gray-400 text-white': $page.url.includes('/users'),
                }"
            >
                <Icon class="icon" name="users" />
                <h1
                    class="font-medium text-2xl tracking-wide"
                    :class="{ hidden: isMinimize }"
                >
                    Users
                </h1>
            </Link>
            <Link
                :href="route('logout')"
                class="flex items-center gap-3 px-5 py-2 border border-b"
            >
                <Icon class="icon" name="logout" />
                <h1
                    class="font-medium text-2xl tracking-wide"
                    :class="{ hidden: isMinimize }"
                >
                    Logout
                </h1>
            </Link>
            <button
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-base px-5 py-3 m-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 self-center"
                @click="sidebarMin"
            >
                X
            </button>
        </div>
        <main class="flex-1 bg-gray-300">
            <p
                v-if="$page.props.flash.message"
                class="bg-green-200 p-4 text-center"
            >
                {{ $page.props.flash.message }}
            </p>

            <slot />
        </main>
    </div>
</template>
