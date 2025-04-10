<template>
    <form @submit.prevent="submitForm" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div v-if="successMessage" class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ successMessage }}
        </div>
        <!-- Pickup Info -->
        <div>
            <label class="form-label">Pickup Address *</label>
            <input v-model="form.pickup_address" class="form-input" required />
            <p v-if="getError('pickup_address')" class="text-sm text-red-600 mt-1">
                {{ getError('pickup_address') }}
            </p>
        </div>
        <div>
            <label class="form-label">Pickup Name *</label>
            <input v-model="form.pickup_name" class="form-input" required />
            <p v-if="getError('pickup_name')" class="text-sm text-red-600 mt-1">
                {{ getError('pickup_name') }}
            </p>
        </div>
        <div>
            <label class="form-label">Pickup Contact No *</label>
            <input v-model="form.pickup_contact_no" class="form-input" type="tel" required />
            <p v-if="getError('pickup_contact_no')" class="text-sm text-red-600 mt-1">
                {{ getError('pickup_contact_no') }}
            </p>
        </div>
        <div>
            <label class="form-label">Pickup Email</label>
            <input v-model="form.pickup_email" class="form-input" type="email" />
            <p v-if="getError('pickup_email')" class="text-sm text-red-600 mt-1">
                {{ getError('pickup_email') }}
            </p>
        </div>

        <!-- Delivery Info -->
        <div>
            <label class="form-label">Delivery Address *</label>
            <input v-model="form.delivery_address" class="form-input" required />
            <p v-if="getError('delivery_address')" class="text-sm text-red-600 mt-1">
                {{ getError('delivery_address') }}
            </p>
        </div>
        <div>
            <label class="form-label">Delivery Name *</label>
            <input v-model="form.delivery_name" class="form-input" required />
            <p v-if="getError('delivery_name')" class="text-sm text-red-600 mt-1">
                {{ getError('delivery_name') }}
            </p>
        </div>
        <div>
            <label class="form-label">Delivery Contact No *</label>
            <input v-model="form.delivery_contact_no" class="form-input" type="tel" required />
            <p v-if="getError('delivery_contact_no')" class="text-sm text-red-600 mt-1">
                {{ getError('delivery_contact_no') }}
            </p>
        </div>
        <div>
            <label class="form-label">Delivery Email</label>
            <input v-model="form.delivery_email" class="form-input" type="email" />
            <p v-if="getError('delivery_email')" class="text-sm text-red-600 mt-1">
                {{ getError('delivery_email') }}
            </p>
        </div>

        <!-- Shipment Info -->
        <div>
            <label class="form-label">Type of Good *</label>
            <select v-model="form.type_of_good" class="form-input" required>
                <option value="Document">Document</option>
                <option value="Parcel">Parcel</option>
            </select>
        </div>
        <div>
            <label class="form-label">Delivery Provider *</label>
            <select v-model="form.delivery_provider" class="form-input" required>
                <option value="DHL">DHL</option>
                <option value="STARTRACK">STARTRACK</option>
                <option value="ZOOM2U">ZOOM2U</option>
                <option value="TGE">TGE</option>
            </select>
        </div>
        <div>
            <label class="form-label">Priority *</label>
            <select v-model="form.priority" class="form-input" required>
                <option value="Standard">Standard</option>
                <option value="Express">Express</option>
                <option value="Immediate">Immediate</option>
            </select>
        </div>
        <div class="flex gap-4">
            <div class="w-1/2">
                <label class="form-label">Pickup Date *</label>
                <input v-model="form.shipment_pickup_date" class="form-input" type="date" required />
            </div>
            <div class="w-1/2">
                <label class="form-label">Pickup Time *</label>
                <input v-model="form.shipment_pickup_time" class="form-input" type="time" required />
                <p v-if="getError('shipment_pickup_time')" class="text-sm text-red-600 mt-1">
                    {{ getError('shipment_pickup_time') }}
                </p>
            </div>
        </div>

        <!-- Package Info -->
        <div class="md:col-span-2">
            <label class="form-label">Package Description *</label>
            <textarea v-model="form.package_description" class="form-input" required></textarea>
        </div>

        <div>
            <label class="form-label">Length *</label>
            <input v-model="form.length" type="number" class="form-input" required />
            <p v-if="getError('length')" class="text-sm text-red-600 mt-1">
                {{ getError('length') }}
            </p>
        </div>
        <div>
            <label class="form-label">Height *</label>
            <input v-model="form.height" type="number" class="form-input" required />
            <p v-if="getError('height')" class="text-sm text-red-600 mt-1">
                {{ getError('height') }}
            </p>
        </div>
        <div>
            <label class="form-label">Width *</label>
            <input v-model="form.width" type="number" class="form-input" required />
            <p v-if="getError('width')" class="text-sm text-red-600 mt-1">
                {{ getError('width') }}
            </p>
        </div>
        <div>
            <label class="form-label">Weight *</label>
            <input v-model="form.weight" type="number" class="form-input" required />
            <p v-if="getError('weight')" class="text-sm text-red-600 mt-1">
                {{ getError('weight') }}
            </p>
        </div>

        <div class="md:col-span-2 flex justify-end">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded">
                Submit Request
            </button>
        </div>
    </form>
</template>


<script>
import axios from 'axios';

export default {
    data() {
        return {
            form: {
                pickup_address: '',
                pickup_name: '',
                pickup_contact_no: '',
                pickup_email: '',
                delivery_address: '',
                delivery_name: '',
                delivery_contact_no: '',
                delivery_email: '',
                type_of_good: 'Document',
                delivery_provider: 'DHL',
                priority: 'Standard',
                shipment_pickup_date: '',
                shipment_pickup_time: '',
                package_description: '',
                length: '',
                height: '',
                width: '',
                weight: '',
            },
            errors: {},
            successMessage: '',
        };
    },
    methods: {
        async submitForm() {
            try {
                const res = await axios.post('/delivery-request', this.form);
                this.successMessage = res.data.message || 'Submitted!';
                this.errors = {};
            } catch (error) {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                } else {
                    alert('Unexpected error occurred.');
                }
            }
        },
        getError(field) {
            return this.errors[field] ? this.errors[field][0] : '';
        },
    },
};

</script>

<style scoped>
.form-label {
    @apply block text-sm font-medium text-gray-700 mb-1;
}
.form-input {
    @apply w-full px-4 py-3 border border-gray-300 rounded shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500;
}
</style>
