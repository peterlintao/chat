<?php

namespace App\Handlers;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Laravel\Facades\Image;

class ImageUploadHandler{
    protected array $allowed_ext = ['png', 'jpg', 'gif', 'jpeg'];

    public function save($file, $folder, $model_id, $max_width=false){
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
        //存储新的照片文件
        $file->move($upload_path, $filename);
        if ($max_width && $extension != 'gif') {
            $this->reduceSize($upload_path.'/'.$filename, $max_width);
        }

        //删除旧的照片文件
        $this->delOldImage($model_id);

        return ['path' => config('app.url') . '/'.$folder_name."/". $filename];
    }

    public function reduceSize($file_path, $max_width){
        $image = Image::read($file_path);
        $image->scaleDown($max_width)->save();
    }

    public function delOldImage($user_id): bool
    {
        $user = DB::table('users')->where('id', $user_id)->first();

        // 提前返回，减少嵌套
        if (!$user || !$user->avatar) {
            return true; // 视为“无旧文件可删”，流程成功
        }

        $parsed = parse_url($user->avatar);
        if (!isset($parsed['path'])) {
            return false;
        }

        $relative_path = ltrim($parsed['path'], '/');
        $file_path = public_path($relative_path);

        // 1. 首先检查文件是否存在
        if (!file_exists($file_path)) {
            return true; // 文件已不存在，目标达成，视为成功
        }

        // 2. 确保文件可写（安全后备）
        if (!is_writable($file_path)) {
            chmod($file_path, 0644);
        }

        // 3. 核心：先清空文件内容
        if (file_put_contents($file_path, '') === false) {
            return false;
        }

        // 4. 短暂延迟，确保系统释放文件句柄
        usleep(100000); // 0.1秒

        // 5. 执行最终删除
        if (unlink($file_path)) {
            return true;
        } else {
            $lastError = error_get_last();
            return false;
        }
    }
}
