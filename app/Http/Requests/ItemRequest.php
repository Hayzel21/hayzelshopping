<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'codeNo' =>'required',
            'name' =>'required',
            'image' =>'required',
            'price' =>'required',
            'discount' =>'required',
            'inStock' =>'required',
            'category_id' =>'required',
            'description' =>'required',
        ]; 
    }

    public function messages(){

        return[

            'codeNo.required' => 'code Number ဖြည့်ရန်လိုအပ်ပါသည်...',
            'name' => 'Name ဖြည့်ရန်လိုအပ်ပါသည်...',
            'image' => 'Image ဖြည့်ရန်လိုအပ်ပါသည်...',
            'price' => 'Price ဖြည့်ရန်လိုအပ်ပါသည်...',
            'discount' => 'Discount ဖြည့်ရန်လိုအပ်ပါသည်...',
            'category_id' => 'Please Select Category...',
            'description' => 'Description ဖြည့်ရန်လိုအပ်ပါသည်...'
        ]; 
    }
}
