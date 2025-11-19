<?php

namespace App\HelpBoard\Services;

use App\HelpBoard\Interfaces\HelpPostInterface;
use Illuminate\Validation\ValidationException;

class HelpPostService {

  public function __construct(private HelpPostInterface $post){}

  public function createHelpPost(array $data, $uid)
  {
    if($data['type'] === 'help_request') {
      $count = $this->post->getPendingCountByUser($uid);

      if($count >= 3) {
        throw ValidationException::withMessages([
          'limit' => 'You already have 3 pending requests'
        ]);
      }
    }
     $data['user_id'] = $uid;
     $data['status'] = 'pending';

     return $this->post->create($data);
  }

  
}