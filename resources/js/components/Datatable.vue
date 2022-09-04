<template>
    <div>
        <span>search field:</span>
        <select v-model="searchField">
            <option value="title">titre du livre</option>
            <option value="email">email de l'auteur</option>
        </select>

        <br/>

        <span>search value:</span>
        <input type="text" v-model="searchValue">

        <EasyDataTable
            :headers="headers"
            :items="items"
            :search-field="searchField"
            :search-value="searchValue"
        >
            <template #item-description="item">
                <span class="text-pink-500">
                    {{ item.description }}
                </span>
            </template>

            <template #item-user.name="item">
                <span class="text-pink-500">
                    {{ item.user.name }}
                </span>
            </template>

        </EasyDataTable>
    </div>
</template>

<script lang="ts" setup>
import { Header, Item } from "vue3-easy-data-table";
import { onMounted, ref } from "vue";

const searchField = ref('');
const searchValue = ref('');

const books = ref([]);

const headers: Header[] = [
    { text: "Titre", value: "title" },
    { text: "Description", value: "description" },
    { text: "Auteur", value: "author" },
    { text: "Email", value: "email" },
];

const items: Item[] = books.value;

onMounted(async () => {
    const response = await axios.get('/api/books');
    books.value.push(...response.data.data);
});
</script>

<style>
.text-pink-500 {
    color: deeppink;
}
</style>
