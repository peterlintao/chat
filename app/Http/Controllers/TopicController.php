<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Request $request):View
    {
        $topics = Topic::with('user','category')->withOrder($request->get('order'))->paginate(10);
        return view('topics.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():View
    {
        return view('topics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTopicRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreTopicRequest $request,Topic $topic)
    {
        $topic->fill($request->all());
        $topic->user_id = Auth::user()->id;
        $topic->save();
        return redirect()->route('topics.show', $topic->id)->with('success','帖子发表成功！');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTopicRequest  $request
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTopicRequest $request, Topic $topic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        //
    }

    //上传富文本编辑器图片
    public function uploadImage(Request $request, ImageUploadHandler $uploader){
        $data = [
            'success' => false,
            'message' => '图片文件上传失败',
            'file_path' => ''
        ];

        if ($file = $request->upload_file) {
            $result = $uploader->save($file, 'topics', Auth::id(),800);
            if ($result) {
                $data['success'] = true;
                $data['message'] = '图片文件上传成功';
                $data['file_path'] = $result['path'];
            }
        }

        return $data;
    }
}
