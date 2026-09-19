<?php

namespace App\Services\Admin;

use App\Models\User;
use App\Traits\ApiResponser;
use Auth;

class CommentService
{
    use ApiResponser;

    public function replyServiceValidation()
    {
        $sql = User::find(Auth::user()->id);
        if ($sql) {
            return 1;
        }

        return 0;
    }
}
