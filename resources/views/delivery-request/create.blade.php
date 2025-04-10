@extends('layouts.app')

@section('content')
    <div class="bg-gray-50 py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Page Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">New Delivery Request</h1>
                <p class="text-gray-600">Please fill out the form below to request a new delivery.</p>
            </div>

            <!-- Alerts -->
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-md">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">There were errors with your submission</h3>
                            <div class="mt-2 text-sm text-red-700">
                                <ul class="list-disc pl-5 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-md">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Form Container -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="px-6 py-5 bg-gradient-to-r from-indigo-600 to-purple-600">
                    <h2 class="text-xl font-semibold text-white">Delivery Request Form</h2>
                    <p class="text-indigo-100 text-sm">Complete all required fields marked with an asterisk (*)</p>
                </div>

                <form action="{{ route('delivery-request.store') }}" method="POST" class="p-6">
                    @csrf

                    <!-- Progress Steps -->
                    <div class="mb-10">
                        <div class="flex justify-between items-center">
                            <div class="flex flex-col items-center">
                                <div class="rounded-full h-10 w-10 flex items-center justify-center bg-indigo-600 text-white font-bold">1</div>
                                <div class="text-xs font-medium text-indigo-600 mt-2">Pickup</div>
                            </div>
                            <div class="h-1 flex-1 mx-2 bg-indigo-600"></div>
                            <div class="flex flex-col items-center">
                                <div class="rounded-full h-10 w-10 flex items-center justify-center bg-indigo-600 text-white font-bold">2</div>
                                <div class="text-xs font-medium text-indigo-600 mt-2">Delivery</div>
                            </div>
                            <div class="h-1 flex-1 mx-2 bg-indigo-600"></div>
                            <div class="flex flex-col items-center">
                                <div class="rounded-full h-10 w-10 flex items-center justify-center bg-indigo-600 text-white font-bold">3</div>
                                <div class="text-xs font-medium text-indigo-600 mt-2">Shipment</div>
                            </div>
                            <div class="h-1 flex-1 mx-2 bg-indigo-600"></div>
                            <div class="flex flex-col items-center">
                                <div class="rounded-full h-10 w-10 flex items-center justify-center bg-indigo-600 text-white font-bold">4</div>
                                <div class="text-xs font-medium text-indigo-600 mt-2">Package</div>
                            </div>
                        </div>
                    </div>

                    <!-- Pickup Info -->
                    <div class="form-section mb-8">
                        <div class="flex items-center mb-4">
                            <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Pickup Information</h3>
                        </div>

                        <div class="bg-gray-50 p-6 rounded-lg">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="pickup_address" class="block text-sm font-medium text-gray-700 mb-1">Pickup Address <span class="text-red-500">*</span></label>
                                    <input type="text" id="pickup_address" name="pickup_address" value="{{ old('pickup_address') }}" class="form-input w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('pickup_address') border-red-500 @enderror" required>
                                </div>
                                <div>
                                    <label for="pickup_name" class="block text-sm font-medium text-gray-700 mb-1">Pickup Name <span class="text-red-500">*</span></label>
                                    <input type="text" id="pickup_name" name="pickup_name" value="{{ old('pickup_name') }}" class="form-input w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('pickup_name') border-red-500 @enderror" required>
                                </div>
                                <div>
                                    <label for="pickup_contact_no" class="block text-sm font-medium text-gray-700 mb-1">Pickup Contact No <span class="text-red-500">*</span></label>
                                    <input type="text" id="pickup_contact_no" name="pickup_contact_no" value="{{ old('pickup_contact_no') }}" class="form-input w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('pickup_contact_no') border-red-500 @enderror" required pattern="[0-9]+">
                                </div>
                                <div>
                                    <label for="pickup_email" class="block text-sm font-medium text-gray-700 mb-1">Pickup Email</label>
                                    <input type="email" id="pickup_email" name="pickup_email" value="{{ old('pickup_email') }}" class="form-input w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('pickup_email') border-red-500 @enderror">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delivery Info -->
                    <div class="form-section mb-8">
                        <div class="flex items-center mb-4">
                            <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Delivery Information</h3>
                        </div>

                        <div class="bg-gray-50 p-6 rounded-lg">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="delivery_address" class="block text-sm font-medium text-gray-700 mb-1">Delivery Address <span class="text-red-500">*</span></label>
                                    <input type="text" id="delivery_address" name="delivery_address" value="{{ old('delivery_address') }}" class="form-input w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('delivery_address') border-red-500 @enderror" required>
                                </div>
                                <div>
                                    <label for="delivery_name" class="block text-sm font-medium text-gray-700 mb-1">Delivery Name <span class="text-red-500">*</span></label>
                                    <input type="text" id="delivery_name" name="delivery_name" value="{{ old('delivery_name') }}" class="form-input w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('delivery_name') border-red-500 @enderror" required>
                                </div>
                                <div>
                                    <label for="delivery_contact_no" class="block text-sm font-medium text-gray-700 mb-1">Delivery Contact No <span class="text-red-500">*</span></label>
                                    <input type="text" id="delivery_contact_no" name="delivery_contact_no" value="{{ old('delivery_contact_no') }}" class="form-input w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('delivery_contact_no') border-red-500 @enderror" required pattern="[0-9]+">
                                </div>
                                <div>
                                    <label for="delivery_email" class="block text-sm font-medium text-gray-700 mb-1">Delivery Email</label>
                                    <input type="email" id="delivery_email" name="delivery_email" value="{{ old('delivery_email') }}" class="form-input w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('delivery_email') border-red-500 @enderror">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Shipment Info -->
                    <div class="form-section mb-8">
                        <div class="flex items-center mb-4">
                            <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Shipment Details</h3>
                        </div>

                        <div class="bg-gray-50 p-6 rounded-lg">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="type_of_good" class="block text-sm font-medium text-gray-700 mb-1">Type of Good <span class="text-red-500">*</span></label>
                                    <select id="type_of_good" name="type_of_good" class="form-select w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('type_of_good') border-red-500 @enderror" required>
                                        <option value="Document" {{ old('type_of_good') == 'Document' ? 'selected' : '' }}>Document</option>
                                        <option value="Parcel" {{ old('type_of_good') == 'Parcel' ? 'selected' : '' }}>Parcel</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="delivery_provider" class="block text-sm font-medium text-gray-700 mb-1">Delivery Provider <span class="text-red-500">*</span></label>
                                    <select id="delivery_provider" name="delivery_provider" class="form-select w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('delivery_provider') border-red-500 @enderror" required>
                                        <option value="DHL" {{ old('delivery_provider') == 'DHL' ? 'selected' : '' }}>DHL</option>
                                        <option value="STARTRACK" {{ old('delivery_provider') == 'STARTRACK' ? 'selected' : '' }}>STARTRACK</option>
                                        <option value="ZOOM2U" {{ old('delivery_provider') == 'ZOOM2U' ? 'selected' : '' }}>ZOOM2U</option>
                                        <option value="TGE" {{ old('delivery_provider') == 'TGE' ? 'selected' : '' }}>TGE</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="priority" class="block text-sm font-medium text-gray-700 mb-1">Priority <span class="text-red-500">*</span></label>
                                    <div class="grid grid-cols-3 gap-3">
                                        <div>
                                            <input type="radio" id="standard" name="priority" value="Standard" {{ old('priority') == 'Standard' ? 'checked' : '' }} class="hidden peer" required>
                                            <label for="standard" class="block text-center border border-gray-300 rounded-lg py-3 cursor-pointer hover:bg-gray-100 peer-checked:bg-indigo-50 peer-checked:border-indigo-500 peer-checked:text-indigo-600 font-medium text-sm">Standard</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="express" name="priority" value="Express" {{ old('priority') == 'Express' ? 'checked' : '' }} class="hidden peer">
                                            <label for="express" class="block text-center border border-gray-300 rounded-lg py-3 cursor-pointer hover:bg-gray-100 peer-checked:bg-indigo-50 peer-checked:border-indigo-500 peer-checked:text-indigo-600 font-medium text-sm">Express</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="immediate" name="priority" value="Immediate" {{ old('priority') == 'Immediate' ? 'checked' : '' }} class="hidden peer">
                                            <label for="immediate" class="block text-center border border-gray-300 rounded-lg py-3 cursor-pointer hover:bg-gray-100 peer-checked:bg-indigo-50 peer-checked:border-indigo-500 peer-checked:text-indigo-600 font-medium text-sm">Immediate</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex gap-4">
                                    <div class="w-1/2">
                                        <label for="shipment_pickup_date" class="block text-sm font-medium text-gray-700 mb-1">Pickup Date <span class="text-red-500">*</span></label>
                                        <input type="date" id="shipment_pickup_date" name="shipment_pickup_date" value="{{ old('shipment_pickup_date') }}" class="form-input w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('shipment_pickup_date') border-red-500 @enderror" required>
                                    </div>
                                    <div class="w-1/2">
                                        <label for="shipment_pickup_time" class="block text-sm font-medium text-gray-700 mb-1">Pickup Time <span class="text-red-500">*</span></label>
                                        <input type="time" id="shipment_pickup_time" name="shipment_pickup_time" value="{{ old('shipment_pickup_time') }}" class="form-input w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('shipment_pickup_time') border-red-500 @enderror" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Package Info -->
                    <div class="form-section mb-8">
                        <div class="flex items-center mb-4">
                            <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Package Information</h3>
                        </div>

                        <div class="bg-gray-50 p-6 rounded-lg">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="md:col-span-2">
                                    <label for="package_description" class="block text-sm font-medium text-gray-700 mb-1">Package Description <span class="text-red-500">*</span></label>
                                    <textarea id="package_description" name="package_description" rows="3" class="form-textarea w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('package_description') border-red-500 @enderror" required>{{ old('package_description') }}</textarea>
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-3">Package Dimensions <span class="text-red-500">*</span></label>
                                    <div class="grid grid-cols-4 gap-4">
                                        <div>
                                            <div class="flex items-center mb-1">
                                                <label for="length" class="block text-sm text-gray-600">Length</label>
                                                <span class="ml-1 text-xs text-gray-500">(cm)</span>
                                            </div>
                                            <input type="number" step="0.01" id="length" name="length" value="{{ old('length') }}" class="form-input w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('length') border-red-500 @enderror" required>
                                        </div>
                                        <div>
                                            <div class="flex items-center mb-1">
                                                <label for="width" class="block text-sm text-gray-600">Width</label>
                                                <span class="ml-1 text-xs text-gray-500">(cm)</span>
                                            </div>
                                            <input type="number" step="0.01" id="width" name="width" value="{{ old('width') }}" class="form-input w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('width') border-red-500 @enderror" required>
                                        </div>
                                        <div>
                                            <div class="flex items-center mb-1">
                                                <label for="height" class="block text-sm text-gray-600">Height</label>
                                                <span class="ml-1 text-xs text-gray-500">(cm)</span>
                                            </div>
                                            <input type="number" step="0.01" id="height" name="height" value="{{ old('height') }}" class="form-input w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('height') border-red-500 @enderror" required>
                                        </div>
                                        <div>
                                            <div class="flex items-center mb-1">
                                                <label for="weight" class="block text-sm text-gray-600">Weight</label>
                                                <span class="ml-1 text-xs text-gray-500">(kg)</span>
                                            </div>
                                            <input type="number" step="0.01" id="weight" name="weight" value="{{ old('weight') }}" class="form-input w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('weight') border-red-500 @enderror" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium rounded-lg shadow-md hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition-all duration-150 ease-in-out">
                            <div class="flex items-center">
                                <span>Submit Request</span>
                                <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Custom input heights and styling */
        .form-input, .form-select, .form-textarea {
            padding-top: 0.625rem;    /* 10px */
            padding-bottom: 0.625rem; /* 10px */
            height: 3rem;             /* 48px - increased height */
        }

        .form-textarea {
            height: auto;
            min-height: 6rem;         /* 96px for textareas */
        }

        /* Custom focus styles */
        .focus-within\:ring-indigo-500:focus-within {
            --tw-ring-color: #6366F1;
        }

        /* Custom transitions */
        .transition-all {
            transition-property: all;
        }

        /* Enhanced select styling */
        select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236B7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.75rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
            appearance: none;
        }

        /* Improved section styling */
        .form-section h3 {
            letter-spacing: 0.025em;
        }

        /* Better spacing in radio button labels */
        input[type="radio"] + label {
            transition: all 0.15s ease-in-out;
        }
    </style>
@endpush
