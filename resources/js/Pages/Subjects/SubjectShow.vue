<script setup>
const props = defineProps({
    subject: Object,
});
const getDate = (date) =>
    new Date(date).toLocaleDateString("en-us", {
        year: "numeric",
        month: "short",
        day: "numeric",
    });
</script>

<template>
    <div>
        <BackButton
            routeName="courses.show"
            text="Back to Course"
            :objectId="subject.course_id"
        />
        <div class="max-w-3xl mx-auto my-auto pt-10">
            <h1 class="title">Show Subject Information</h1>

            <div class="bg-slate-500 max-3xl rounded-md">
                <div class="grid grid-cols-2 gap-2 text-2xl p-5">
                    <div class="font-bold">Subject:</div>
                    <div>{{ subject.name }}</div>
                    <div class="font-bold">Code:</div>
                    <div>{{ subject.code }}</div>
                    <div class="font-bold">Description:</div>
                    <div>{{ subject.description }}</div>
                    <div class="font-bold">Unit:</div>
                    <div>{{ subject.unit }}</div>
                    <div class="font-bold">Created:</div>
                    <div>{{ getDate(subject.created_at) }}</div>
                </div>
            </div>
        </div>
    </div>
</template>
