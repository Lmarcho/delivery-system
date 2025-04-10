import './bootstrap';
import { createApp } from 'vue';
import DeliveryForm from './components/DeliveryForm.vue';

const app = createApp({});
app.component('delivery-form', DeliveryForm);
app.mount('#app');
