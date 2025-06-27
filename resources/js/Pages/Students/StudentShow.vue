<script setup>
const props = defineProps({
    student: Object,
});
const fullName = (fName, lName, mName, suffix) => {
    return `${fName} ${(mName ? `${mName}` : "").charAt(0)}${
        mName ? "." : ""
    } ${lName} ${suffix ?? ""}`;
};

const fullAddress = (hNumber, SNumber, barangay, city, province) => {
    return `${hNumber} ${SNumber}, ${barangay}, ${city}, ${province}`;
};

const getDate = (date) =>
    new Date(date).toLocaleDateString("en-us", {
        month: "long",
        day: "numeric",
        year: "numeric",
    });

const getAge = (date) => {
    let today = new Date();
    let bday = new Date(date);
    let age = today.getFullYear() - bday.getFullYear();
    let month = today.getMonth() - bday.getMonth();
    if (month < 0 || (month === 0 && today.getDate() < bday.getDate())) {
        age--;
    }
    return age;
};
</script>

<template>
    <div>
        <BackButton routeName="students.index" text="Back to Students" />
        <div class="max-w-3xl mx-auto my-auto pt-10">
            <h1 class="title">Show Student Information</h1>
            <div class="bg-slate-500 max-3xl rounded-md">
                <div class="grid grid-cols-2 gap-2 text-2xl p-5">
                    <div class="font-bold">Student Full Name:</div>
                    <div>
                        {{
                            fullName(
                                student.firstName,
                                student.lastName,
                                student.middleName,
                                student.suffix
                            )
                        }}
                    </div>
                    <div class="font-bold">Course and Year:</div>
                    <div>{{ student.course.code + " - " + student.year }}</div>
                    <div class="font-bold">Full Address:</div>
                    <div>
                        {{
                            fullAddress(
                                student.houseNumber,
                                student.street,
                                student.barangay,
                                student.city,
                                student.province
                            )
                        }}
                    </div>
                    <div class="font-bold">Birthday:</div>
                    <div>{{ getDate(student.birthday) }}</div>
                    <div class="font-bold">Age:</div>
                    <div>{{ getAge(student.birthday) + " years old" }}</div>
                    <div class="font-bold">Email:</div>
                    <div>{{ student.email }}</div>
                    <div class="font-bold">Contact Number:</div>
                    <div>{{ student.contactNumber }}</div>
                </div>
            </div>
        </div>
    </div>
</template>
