@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Create Delivery Request</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('delivery-request.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Pickup Info --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium">Pickup Address</label>
                    <input type="text" name="pickup_address" class="input" required>
                </div>
                <div>
                    <label class="block font-medium">Pickup Name</label>
                    <input type="text" name="pickup_name" class="input" required>
                </div>
                <div>
                    <label class="block font-medium">Pickup Contact No</label>
                    <input type="text" name="pickup_contact_no" class="input" required>
                </div>
                <div>
                    <label class="block font-medium">Pickup Email</label>
                    <input type="email" name="pickup_email" class="input">
                </div>
            </div>

            {{-- Delivery Info --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium">Delivery Address</label>
                    <input type="text" name="delivery_address" class="input" required>
                </div>
                <div>
                    <label class="block font-medium">Delivery Name</label>
                    <input type="text" name="delivery_name" class="input" required>
                </div>
                <div>
                    <label class="block font-medium">Delivery Contact No</label>
                    <input type="text" name="delivery_contact_no" class="input" required>
                </div>
                <div>
                    <label class="block font-medium">Delivery Email</label>
                    <input type="email" name="delivery_email" class="input">
                </div>
            </div>

            {{-- Shipment Info --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium">Type of Good</label>
                    <select name="type_of_good" class="input" required>
                        <option value="Document">Document</option>
                        <option value="Parcel">Parcel</option>
                    </select>
                </div>
                <div>
                    <label class="block font-medium">Delivery Provider</label>
                    <select name="delivery_provider" class="input" required>
                        <option value="DHL">DHL</option>
                        <option value="STARTRACK">STARTRACK</option>
                        <option value="ZOOM2U">ZOOM2U</option>
                        <option value="TGE">TGE</option>
                    </select>
                </div>
                <div>
                    <label class="block font-medium">Priority</label>
                    <select name="priority" class="input" required>
                        <option value="Standard">Standard</option>
                        <option value="Express">Express</option>
                        <option value="Immediate">Immediate</option>
                    </select>
                </div>
                <div class="flex gap-4">
                    <div class="w-1/2">
                        <label class="block font-medium">Pickup Date</label>
                        <input type="date" name="shipment_pickup_date" class="input" required>
                    </div>
                    <div class="w-1/2">
                        <label class="block font-medium">Pickup Time</label>
                        <input type="time" name="shipment_pickup_time" class="input" required>
                    </div>
                </div>
            </div>

            {{-- Package Info --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2">
                    <label class="block font-medium">Package Description</label>
                    <input type="text" name="package_description" class="input" required>
                </div>
                <div>
                    <label class="block font-medium">Length</label>
                    <input type="number" step="0.01" name="length" class="input" required>
                </div>
                <div>
                    <label class="block font-medium">Height</label>
                    <input type="number" step="0.01" name="height" class="input" required>
                </div>
                <div>
                    <label class="block font-medium">Width</label>
                    <input type="number" step="0.01" name="width" class="input" required>
                </div>
                <div>
                    <label class="block font-medium">Weight</label>
                    <input type="number" step="0.01" name="weight" class="input" required>
                </div>
            </div>

            <div>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                    Submit Request
                </button>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    <style>
        .input {
            @apply w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-500;
        }
    </style>
@endpush
