<script setup>
defineProps({
    routeName: String,
    text: String,
    objectId: null,
})
</script>

<template>
     <Link
            :href="route(routeName,{id: objectId})"
            v-html="text"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mx-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mb-5 absolute top-3"
            ></Link
        >
</template>