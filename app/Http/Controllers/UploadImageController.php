<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;

class UploadImageController extends Controller
{
    public function load($event_id)
    {
        return view('images.upload', compact('event_id'));
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
        'image' => 'required|mimes:jpeg,png,jpg,JPG|max:12000',
        ]);

        $event = Event::find($request->event_id);

        $event->addMedia($request->file('image'))
                ->toMediaCollection('photos', 's3');

        return redirect('/event/'.$request->event_id);
    }

    public function delete($aid, $id)
    {
        $mediaitem = Media::find($id)->delete();

        return redirect('/event/'.$aid);
    }

    public function featured($aid, $id)
    {
        $event = Event::find($aid);
        $event->featured_img = Media::find($id)->getUrl();
        $event->save();

        return redirect('/event/'.$aid);
    }

    // Show a media Item
    public function show($id)
    {
        $image = Media::find($id);

        return view('images.show', compact('image'));
    }
}
