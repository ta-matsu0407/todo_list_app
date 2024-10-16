<script setup>
import { Inertia } from '@inertiajs/inertia'

defineProps({ // controllerから変数の受け取り(CompositionAPIのsetup機能)
id : String, //id,blogはcontrollerのキーの部分
blog : Object
})

const deleteConfirm = (id) => {
    //console.log(id):開発者ツールで、情報が渡ってきているか確認できる
Inertia.delete(`/inertia/${id}`, {
    onBefore: () => confirm('本当に削除しますか?')
})
//jsの記述方法で、バッククォートで記述

}

</script>

<template>
{{ id }}<br>
{{ blog.title }}<br>
<button @click="deleteConfirm(blog.id)">削除</button>
</template>
