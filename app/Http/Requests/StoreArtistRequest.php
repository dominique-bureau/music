<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArtistRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'first_name' => 'required',
            'nationality_id' => 'min:2|max:2',
            'birth_date' => 'date_format:Y-m-d',
            'death_date' => 'date_format:Y-m-d|after:birth_date'
        ];
    }

}
