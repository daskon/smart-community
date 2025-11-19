<?php

namespace App\HelpBoard\Repositories;

use App\HelpBoard\Interfaces\HelpPostInterface;
use App\HelpBoard\Models\HelpPost;

class HelpPostRepository implements HelpPostInterface {

  public function create($data)
  {
    return HelpPost::create($data);
  }

  public function find($id)
  {
    return HelpPost::findOrFail($id);
  }

  public function getAll($filters): array
  {
    return HelpPost::where($filters)->get();
  }

  public function delete(HelpPost $post)
  {
    return $post->delete();
  }

  public function update(HelpPost $post, $data)
  {
    return $post->update($data);
  }

  public function getPendingCountByUser($uid): int
  {
    return HelpPost::where('user_id', $uid)
                   ->where('status', 'pending')
                   ->count();
  }
}