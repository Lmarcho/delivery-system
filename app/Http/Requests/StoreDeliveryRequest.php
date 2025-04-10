<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeliveryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'pickup_address' => 'required|string|max:255',
            'pickup_name' => 'required|string|max:100',
            'pickup_contact_no' => 'required|numeric',
            'pickup_email' => 'nullable|email',

            'delivery_address' => 'required|string|max:255',
            'delivery_name' => 'required|string|max:100',
            'delivery_contact_no' => 'required|numeric',
            'delivery_email' => 'nullable|email',

            'type_of_good' => 'required|in:Document,Parcel',
            'delivery_provider' => 'required|in:DHL,STARTRACK,ZOOM2U,TGE',
            'priority' => 'required|in:Standard,Express,Immediate',
            'shipment_pickup_date' => 'required|date',
            'shipment_pickup_time' => 'required',

            'package_description' => 'required|string|max:255',
            'length' => 'required|numeric|min:0',
            'height' => 'required|numeric|min:0',
            'width' => 'required|numeric|min:0',
            'weight' => 'required|numeric|min:0',
        ];
    }

}
