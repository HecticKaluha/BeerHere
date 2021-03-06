<?php

namespace App\Http\Controllers;

use App\Picture;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class ImageUploadController extends Controller
{
    public function validateUpload(Request $request)
    {
        Log::info(request('file'));

        $validator = Validator::make($request->all(),
            [
                'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'file.image' => 'The file must be an image',
                'file.max' => 'The file cannot be bigger than :maxmb',
                'file.mimes' => 'We only accept jpeg, png, jpg, gif and svg',
            ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->errors()
            );
        }
    }

    public function validateMultipleUploads(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'file' => 'max:10',
                'file.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            [
                'file.*.image' => 'The file must be an image',
                'file.*.max' => 'The file cannot be bigger than :maxmb',
                'file.*.mimes' => 'We only accept jpeg, png, jpg, gif and svg',
                'file.max' => 'You can only upload :max files at once',
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
        Log::info($request);
        $this->validate($request, [
            'images' => 'required|max:10',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ],
            [
                'images.required' => 'You haven\'t chosen a file.',
                'images.max' => 'You can only upload :max files at once.',
                'images.*.image' => 'The files must all be images, silly!',
                'images.*.mimes' => 'We only accept :mimes',
                'images.*.max' => 'The files must be smaller than :max kb each.',
            ]
        );
        if ($request->hasfile('images')) {
            $user = User::find(Auth::user()->id);
            $dir = 'uploads/pictures/' . $user->id . '/';

            $picturesLeft = $user->pictures->count();
            foreach ($request->file('images') as $image) {
                if ($picturesLeft < 10) {
                    $extension = $image->getClientOriginalExtension();
                    $filename = uniqid() . '_' . time() . '.' . $extension;
                    $image->move($dir, $filename);
                    Picture::create([
                        'picture_url' => 'uploads/pictures/' . $user->id . '/' . $filename,
                        'user_id' => $user->id,
                    ]);
                    $picturesLeft++;
                } else {
                    return Redirect::to(URL::previous() . "#upload_pictures")->with('error', 'We didn\'t upload all or some of your pictures since you\'ve reached the maximum amount of 10 pictures for your account');
                }
            }
            return Redirect::to(URL::previous() . "#upload_pictures")->with('success', 'Your images have been successfully uploaded, you can view them in your carousel on your profilepage');
        } else {
            return Redirect::to(URL::previous() . "#upload_pictures")->with('error', 'There were no files selected');
        }
    }
}
