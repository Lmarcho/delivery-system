<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryRequest;
use App\Http\Requests\StoreDeliveryRequest;


class DeliveryRequestController extends Controller
{
    public function create()
    {
        return view('delivery-request.create');
    }

    public function index()
    {
        $requests = DeliveryRequest::orderBy('created_at', 'desc')->paginate(10);
        return view('delivery-request.index', compact('requests'));
    }

    public function store(StoreDeliveryRequest $request)
    {
        DeliveryRequest::create($request->validated());

        return redirect()
            ->route('delivery-request.create')
            ->with('success', 'Delivery request submitted successfully!');
    }

    public function cancel($id)
    {
        $request = DeliveryRequest::findOrFail($id);

        if (in_array($request->status, ['Processed', 'Shipped'])) {
            return redirect()->back()->with('error', 'This request cannot be cancelled.');
        }

        $request->status = 'Cancelled';
        $request->save();

        return redirect()->back()->with('success', 'Request cancelled successfully.');
    }


}
