<?php

namespace App\Transformers;

use App\Post;
use League\Fractal\TransformerAbstract;

class PostTransformer extends TransformerAbstract
{
  public function Transform(Post $post){
    return [
      'id'          => $post->id,
      'title'       => $post->title,
      'content'     => $post->content,
      'user_id'     => $post->user_id,
      'published'   => $post->created_at->diffForHumans(),
    ];
  }
}


 ?>
