import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler.js';
import Datatable from './components/Datatable.vue';
import Vue3EasyDataTable from 'vue3-easy-data-table';
import 'vue3-easy-data-table/dist/style.css';

const app = createApp();

app
    .component('Datatable', Datatable)
    .component('EasyDataTable', Vue3EasyDataTable);

app
    .mount('#app');
