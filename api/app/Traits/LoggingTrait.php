<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

class LoggingTrait {
  public function LogInfo($message, $context)
  {
    return Log::info($message, $context);
  }
}