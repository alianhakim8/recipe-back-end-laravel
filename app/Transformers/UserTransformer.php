<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
  public function Transform(User $user){
    return [
      'id'          => $user->id,
      'name'        => $user->name,
      'email'       => $user->email,
      'token'       => $user->api_token,
      'registered'  => $user->created_at->diffForHumans(),
    ];
  }
}


 ?>
