<?php

namespace App\Service;

use Exception;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $data['content'] = strip_tags($data['content']);
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $post = Post::firstOrCreate($data);
            DB::commit();
        } catch (Exception $exeption) {
            DB::rollBack();
            abort(500);
        }
    }
    public function update($data, $post)
    {
        try {
            DB::beginTransaction();

            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

            $post->update($data);

            DB::commit();
        } catch (Exception $exeption) {
            DB::rollBack();
            abort(500);
        }

        return $post;
    }
}
