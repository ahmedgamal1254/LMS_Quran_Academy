<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'genre' => ['string','required'],
            'name' => ['string','required'],
            'desc'  => ['required'],
            'genre' => ['string','required']
        ];
    }

    public function messages(){
        return [
            'desc.required'  => 'من فضلك أدخل وصف للباقة',
            'name.required' => 'من فضلك أدخل اسم للباقة'
        ];
    }
}
