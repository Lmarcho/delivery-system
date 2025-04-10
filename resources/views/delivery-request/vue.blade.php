@extends('layouts.app')

@section('content')
    <div id="app" class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Vue Delivery Request</h2>
        <delivery-form></delivery-form>
    </div>
@endsection

@vite('resources/js/app.js')
