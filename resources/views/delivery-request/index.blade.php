@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">All Delivery Requests</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
                {{ session('error') }}
            </div>
        @endif

        <table class="w-full border border-gray-300">
            <thead class="bg-gray-100 text-left">
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Pickup Name</th>
                <th class="px-4 py-2">Delivery Name</th>
                <th class="px-4 py-2">Type</th>
                <th class="px-4 py-2">Priority</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2 text-right">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($requests as $request)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $request->id }}</td>
                    <td class="px-4 py-2">{{ $request->pickup_name }}</td>
                    <td class="px-4 py-2">{{ $request->delivery_name }}</td>
                    <td class="px-4 py-2">{{ $request->type_of_good }}</td>
                    <td class="px-4 py-2">{{ $request->priority }}</td>
                    <td class="px-4 py-2">
                        <span class="px-2 py-1 rounded text-sm
                            {{ $request->status === 'Cancelled' ? 'bg-red-100 text-red-700' :
                               ($request->status === 'Pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-700') }}">
                            {{ $request->status }}
                        </span>
                    </td>
                    <td class="px-4 py-2 text-right">
                        @if ($request->status === 'Pending')
                            <form action="{{ route('delivery-request.cancel', $request->id) }}" method="POST" onsubmit="return confirm('Cancel this request?')">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-red-600 hover:underline">Cancel</button>
                            </form>
                        @else
                            <span class="text-gray-400 italic">N/A</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center px-4 py-4 text-gray-500">No requests found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $requests->links() }}
        </div>
    </div>
@endsection
