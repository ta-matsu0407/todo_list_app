<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { nl2br } from '@/common';
import { Inertia } from '@inertiajs/inertia'

defineProps({
    todo: Object
})
//controller側から、objectが渡ってくる

const deleteTodo = id => {
    Inertia.delete(route('todos.destroy', { todo: id }), {
    onBefore: () => confirm('本当に削除しますか?')
    })
}
</script>

<template>
    <Head title="TODO詳細" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                TODO詳細
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <section class="text-gray-600 body-font relative">
                                <!-- フォームを送信したときにブラウザが自動的にページをリロードする動作を防ぐ -->
                                <div class="container px-5 py-8 mx-auto">
                                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                        <div class="flex flex-wrap -m-2">
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="title" class="leading-7 text-sm text-gray-600">タイトル</label>
                                                    <!-- <input type="text" id="title" name="title" v-model="form.title" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> -->
                                                    <!-- 詳細画面は入力できる必要ないので、input→divタグに -->
                                                    <div id="title" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                        {{ todo.title }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="memo" class="leading-7 text-sm text-gray-600">メモ</label>
                                                    <div id="memo" v-html="nl2br(todo.memo)" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></div>
                                                    <!-- そのままではエスケープ処理されて
                                                    <br>と表示されるので
                                                    v-htmlを使ってHTMLとして表示する -->
                                                </div>
                                            </div>
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="due_date" class="leading-7 text-sm text-gray-600">期限日</label>
                                                    <div id="due_date" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                        {{ todo.due_date }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="status" class="leading-7 text-sm text-gray-600">ステータス</label>
                                                    <div id="status" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">
                                                        <span v-if="todo.status === 0">未実施</span>
                                                        <span v-if="todo.status === 1">実施中</span>
                                                        <span v-if="todo.status === 2">実施済み</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="p-2 w-full">
                                                <Link as="button" :href="route('todos.edit', { todo: todo.id})" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集する</Link>
                                            </div>
                                            <div class="p-2 w-full">
                                                <button @click="deleteTodo(todo.id)" class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">削除する</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
