<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreMakanansRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'makanan' => 'mimes:png,jpg,jpeg,gif|required',
            'stok' => 'min:1|max:2147483647|required|numeric',
            'deskripsi' => 'required',
        ];
    }
}
