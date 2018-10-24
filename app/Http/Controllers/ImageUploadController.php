<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function uploadImage(Request $request){
        $this->validate($request, [
            'image' => 'mimes:jpeg,png|max:4096',
        ],
            $messages = [
                'required' => 'The :attribute field is required.',
                'mimes' => 'Only jpeg, png are allowed.'
            ]
        );
    }
}
