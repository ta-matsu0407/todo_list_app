<script setup>
import FlashMessage from '@/Components/FlashMessage.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    todos: Array
})
// 親コンポーネントから受け取るデータ（props）を定義
// 複数情報をArrayで取得

</script>

<template>
    <Head title="TODOリスト" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                TODOリスト
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <section class="text-gray-600 body-font">
                            <div class="container px-5 py-8 mx-auto">
                                <FlashMessage />
                                <div class="flex pl-4 my-4 lg:w-2/3 w-full mx-auto">
                                    <Link as="button" :href="route('todos.create')" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">TODO登録</Link>
                                    <!-- Linkコンポーネントを使うことで、SPAを作成 -->
                                </div>
                                <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                    <table class="table-auto w-full text-left whitespace-no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">No.</th>
                                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">タイトル</th>
                                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">期限日</th>
                                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">ステータス</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="todo in todos" :key="todo.id">
                                                <!-- v-forで配列の中身を1つずつ取り出して、HTMLに繰り返し表示 -->
                                                <!-- todosの中身を順番に取り出してtodoとして使う -->
                                                <!-- keyはv-forを使うときにパフォーマンスの向上として付けるのがお約束 -->
                                                <td class="border-b-2 border-gray-200 px-4 py-3">
                                                    <Link class="text-blue-400" :href="route('todos.show', { todo: todo.id })">
                                                        {{ todo.id }}
                                                    </Link>
                                                </td>
                                                <td class="border-b-2 border-gray-200 px-4 py-3">{{ todo.title }}</td>
                                                <td class="border-b-2 border-gray-200 px-4 py-3">{{ todo.due_date }}</td>
                                                <td class="border-b-2 border-gray-200 px-4 py-3">
                                                    <span v-if="todo.status === 0">未実施</span>
                                                    <span v-if="todo.status === 1">実施中</span>
                                                    <span v-if="todo.status === 2">実施済み</span>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
