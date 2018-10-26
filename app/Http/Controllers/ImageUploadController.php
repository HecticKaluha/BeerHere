<?php

namespace App\Http\Controllers;

use App\Picture;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ImageUploadController extends Controller
{
    public function validateUpload(Request $request){
        $validator = Validator::make($request->all(),
            [
                'file' => 'image',
            ],
            [
                'file.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
            ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->errors()
            );
        }
    }



    public function uploadImages(Request $request)
    {
        $this->validate($request, [
            'images' => 'required|max:10',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ],
        [
            'images.required' => 'You haven\'t chosen a file.',
            'images.max' => 'You can only upload :max files at once.',
            'images.*.image' => 'The file must be an image, silly!',
            'images.*.mimes' => 'We only accept :mimes.',
            'images.*.max' => 'The files must be smaller than :max kb each.',
        ]
        );
        if ($request->hasfile('images')) {
            $user = User::find(Auth::user()->id);
            $dir = 'uploads/pictures/' . $user->id . '/';

            foreach ($request->file('images') as $image) {
                $extension = $image->getClientOriginalExtension();
                $filename = uniqid() . '_' . time() . '.' . $extension;
                $image->move($dir, $filename);
                Picture::create([
                    'picture_url' => 'uploads/pictures/' . $user->id . '/' . $filename,
                    'user_id' => $user->id,
                ]);
            }
            return back()->with('success', 'Your images has been successfully uploaded, you can view them in your carousel on your profilepage');
        } else {
            return back()->with('errors', 'There where no files selected');
        }
    }
}
