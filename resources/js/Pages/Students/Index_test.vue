<script setup>
import FlashMessage from '@/Components/FlashMessage.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue'
// import { onMounted } from 'vue'

defineProps({
'students' : Object
})

// onMounted(() => { //ページが表示されたタイミングで実行
// console.log(props.students)
// })

</script>

<template>
<ul v-for="student in students.data" :key="student.id">
<li>{{ student.id }}</li>
<li>{{ student.name }}</li>
</ul>
<Pagination class="mt-6" :links="students.links"></Pagination>
</template>
