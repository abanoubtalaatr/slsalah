<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPlan;
use App\Models\User;
use App\Models\Video;
use App\Http\Controllers\Controller;
use App\Notifications\NewVideoNotification;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        return view('video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'video_name' => 'required',
            'video_url' => 'required| starts_with:https://www.youtube.com/',
            'video_description' => 'required',
            'video_time' => 'required',
            'video_isActive' => 'required',
        ], [
            'video_url.starts_with' => 'يجب ان يكون الحقل رابط من موقع اليوتيوب '
        ]);
       $video = Video::create([
            'name' => $request->video_name,
            'url' => $request->video_url,
            'description' => $request->video_description,
            'time' => $request->video_time,
            'isActive' => ($request->video_isActive == 1 ? 1 :0 ),
        ]);
        $users = User::query()->where('super_admin', 0)->get();

        $data = [
            'subscribe' => '',
            'plan' => '',
            'user' => '',
            'type' => 'فيديو جديد',
            'notification_type'=> 'video',
            'video' => $video->id,
        ];

        foreach ($users as $user)  {
            $user->notify(new NewVideoNotification($data));
        }

        return redirect()->route('video.index')->with('msg', 'تم اضافة الفيديو');
    }

    public function show(Video $video)
    {
      return  view('video.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::findorFail($id);
        return view('video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required| starts_with:https://www.youtube.com/',
            'description' => 'required',
            'time' => 'required',
            'isActive' => 'required',
        ], [
            'url.starts_with' => 'يجب ان يكون الحقل رابط من موقع اليوتيوب '
        ]);
        $video = Video::findorFail($id);
        $video->name = $request->name;
        $video->url = $request->url;
        $video->description = $request->description;
        $video->time = $request->time;
        $video->isActive = $request->isActive;
        $video->save();
        return redirect()->route('video.index')->with('msg', 'تم تعديل الفيديو');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::findorFail($id);
        $video->delete();
        return redirect()->back()->with('msg', 'تم حذف الفيديو');
    }
}
