<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	public function attachments()
    {
        return $this->hasMany('App\Attachment');
    }
}
