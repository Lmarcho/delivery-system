<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryRequest;


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

    public function store(Request $request)
    {
        $validated = $request->validate([
            // Pickup
            'pickup_address' => 'required',
            'pickup_name' => 'required',
            'pickup_contact_no' => 'required',
            'pickup_email' => 'nullable|email',

            // Delivery
            'delivery_address' => 'required',
            'delivery_name' => 'required',
            'delivery_contact_no' => 'required',
            'delivery_email' => 'nullable|email',

            // Shipment
            'type_of_good' => 'required|in:Document,Parcel',
            'delivery_provider' => 'required|in:DHL,STARTRACK,ZOOM2U,TGE',
            'priority' => 'required|in:Standard,Express,Immediate',
            'shipment_pickup_date' => 'required|date',
            'shipment_pickup_time' => 'required',

            // Package
            'package_description' => 'required',
            'length' => 'required|numeric',
            'height' => 'required|numeric',
            'width' => 'required|numeric',
            'weight' => 'required|numeric',
        ]);

        DeliveryRequest::create($validated);
        return redirect()->route('delivery-request.create')->with('success', 'Delivery request submitted!');


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
