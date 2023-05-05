<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Partent;

class ParentRequst extends FormRequest
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
    
    public function rules()
    {
        return [
            'name' => ['string','required'],
            'email' => ['string','required','unique:'.Partent::class],
            'phone'  => ['required','numeric'],
            'country' => ['string','required']
        ];
    }

    public function messages(){
        return [
            'name.required'  => 'من فضلك أدخل اسم الطالب',
            'email.required'  => 'من فضلك أدخل االبريد الالكترونى للطالب',
            'phone.required'  => 'من فضلك أدخل رقم االهاتف للطالب',
            'country.required'  => 'من فضلك أدخل الدولة للطالب',
        ];
    }
}
