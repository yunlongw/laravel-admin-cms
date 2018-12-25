<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/25/025
 * Time: 17:55
 */

namespace App\Http\Requests\Admin;


use Illuminate\Foundation\Http\FormRequest;

class StorePermissionsRequest extends FormRequest
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
            'name' => 'required',
        ];
    }
}