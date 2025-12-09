<?php

namespace App\Handlers;

class ImageUploadHandler{
    protected array $allowed_ext = ['png', 'jpg', 'gif', 'jpeg'];

    public function save($file, $folder, $model_id){
        //文件夹路径
        $folder_name = "uploads/images/" . $folder ."/". date('Ym/d', time()) ;
        //物理的文件夹路径
        $upload_path = public_path() . "/" . $folder_name;
        //获取文件后缀
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';
        //设置唯一文件名
        $filename = md5($model_id . '_' . time()) . '.' . $extension;
        //判断是否是图片
        if (!in_array($extension, $this->allowed_ext)) {
            return false;
        }
        //存储文件
        $file->move($upload_path, $filename);
        return ['path' => config('app.url') . '/'.$folder_name."/". $filename];
    }
}
