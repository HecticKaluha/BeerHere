<?php

namespace App\Http\Controllers;

use App\Picture;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ImageUploadController extends Controller
{
    public function uploadImage(Request $request)
    {
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
        $extension = $request->file('file')->getClientOriginalExtension();
        $dir = 'uploads/avatars/';
        $filename = uniqid() . '_' . time() . '.' . $extension;
        $request->file('file')->move($dir, $filename);
        $user = User::find(Auth::user()->id);
        $user->avatar_url = 'uploads/avatars/' . $filename;
        $user->update();
        return $filename;

    }


    public function uploadImages(Request $request)
    {
        $this->validate($request, [

            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg'

        ]);
        if($request->hasfile('images'))
        {
            $user = User::find(Auth::user()->id);
            $dir = 'uploads/pictures/'.$user->id . '/';

            foreach($request->file('images') as $image)
            {
                $extension = $image->getClientOriginalExtension();
                $filename = uniqid() . '_' . time() . '.' . $extension;
                $image->move($dir, $filename);
                Picture::create([
                    'picture_url' => 'uploads/pictures/'.$user->id . '/' .$filename,
                    'user_id' => $user->id,
                ]);
            }
            return back()->with('success', 'Your images has been successfully uploaded');
        }
        else{
            return back()->with('errors', 'There where no files selected');
        }
    }
}
