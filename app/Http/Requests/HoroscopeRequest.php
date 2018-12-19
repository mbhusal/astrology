<?php

namespace App\Http\Requests;

use App\Rules\DailyHoroscope;
use Illuminate\Foundation\Http\FormRequest;

class HoroscopeRequest extends FormRequest
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
        $id = $this->route()->parameter('id');

        return [
            'date' => 'required',
            'rasi' => 'required',
            'horoscope' => 'required',
            'slug' => 'required|unique:horoscopes'
        ];
    }
}
