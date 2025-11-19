<?php

namespace App\HelpBoard\Interfaces;

use App\HelpBoard\Models\HelpPost;

interface HelpPostInterface {
  public function create(array $data);
  public function find($id);
  public function getAll($filters): array;
  public function delete(HelpPost $post);
  public function update(HelpPost $post, array $data);
  public function getPendingCountByUser(int $uid): int;
}