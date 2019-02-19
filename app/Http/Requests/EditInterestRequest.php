<?php

namespace App\Http\Requests;

use App\Interest;
use Illuminate\Foundation\Http\FormRequest;

class EditInterestRequest extends FormRequest
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
            'name' => 'required|unique:interests|string|max:20',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'You must provide a name for the interest',
            'name.unique' => 'The name you provided is already in use',
            'image.required' => 'You must provide an image to represent the interest',
            'image.*.image' => 'The file must be an image',
            'image.*.mimes' => 'We only accept :mimes',
            'image.*.max' => 'The image must be smaller than :max kb',
        ];
    }

    public function patch(Interest $interest)
    {
        $filename = 'bar.jpg';
        $dir = '/image/';
        if (request()->hasfile('image')) {
            $extension = request()->file('image')->getClientOriginalExtension();
            $dir = 'uploads/interest_pictures/';
            $filename = uniqid() . '_' . time() . '.' . $extension;
            request()->file('image')->move($dir, $filename);
        }
        $interest->name = request('name');
        $interest->picture_url = $dir . $filename;

        $interest->update();
    }
}
