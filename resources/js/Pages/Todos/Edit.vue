<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'

const props = defineProps({
    todo: Object,
    errors: Object
})
//編集したいのでコントローラから渡ってくる情報をdefinePropsで受けて、それを変数に入れる

const form = reactive({
    id: props.todo.id,
    title: props.todo.title,
    memo: props.todo.memo,
    due_date: props.todo.due_date,
    status: props.todo.status,
})
// reactiveでリアクティブ対応にする

const updateTodo = id => {
    Inertia.put(route('todos.update', { todo: id}), form)
}
//const: 再代入できない変数(定数)を宣言
//メソッド名は動詞名詞

</script>

<template>
    <Head title="TODO編集" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                TODO編集
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <section class="text-gray-600 body-font relative">
                            <form @submit.prevent="updateTodo(form.id)">
                                <!-- フォームを送信したときにブラウザが自動的にページをリロードする動作を防ぐ -->
                                <div class="container px-5 py-8 mx-auto">
                                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                        <div class="flex flex-wrap -m-2">
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="title" class="leading-7 text-sm text-gray-600">タイトル</label>
                                                    <input type="text" id="title" name="title" v-model="form.title" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                    <!-- v-modelでフォームの入力値とデータオブジェクトの間で、リアルタイムでデータが行き来するように設定 -->
                                                    <!-- const formで作成したオブジェクト -->
                                                    <div v-if="errors.title">{{ errors.title }}</div>

                                                </div>
                                            </div>
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="memo" class="leading-7 text-sm text-gray-600">メモ</label>
                                                    <textarea id="memo" name="memo" v-model="form.memo" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                                </div>
                                            </div>
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="due_date" class="leading-7 text-sm text-gray-600">期限日</label>
                                                    <input type="date" id="due_date" name="due_date" v-model="form.due_date" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                    <div v-if="errors.due_date">{{ errors.due_date }}</div>
                                                </div>
                                            </div>

                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label class="leading-7 text-sm text-gray-600">ステータス</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" v-model="form.status" value="0">
                                                            未実施
                                                        </label>
                                                        <label>
                                                            <input type="radio" v-model="form.status" value="1">
                                                            実施中
                                                        </label>
                                                        <label>
                                                            <input type="radio" v-model="form.status" value="2">
                                                            実施済み
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="p-2 w-full">
                                                <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新する</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
