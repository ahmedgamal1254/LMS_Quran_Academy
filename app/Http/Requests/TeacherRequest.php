<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Teacher;

class TeacherRequest extends FormRequest
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
            'name' => ['string','required'],
            'email' => ['string','required','unique:'.Teacher::class],
            'phone'  => ['required','numeric'],
            'country' => ['string','required']
        ];
    }

    public function messages(){
        return [
            'name.required'  => 'من فضلك أدخل اسم المدرس',
            'email.required'  => 'من فضلك أدخل االبريد الالكترونى للمدرس',
            'phone.required'  => 'من فضلك أدخل رقم االهاتف للمدرس',
            'country.required'  => 'من فضلك أدخل الدولة للمدرس',
        ];
    }
}
