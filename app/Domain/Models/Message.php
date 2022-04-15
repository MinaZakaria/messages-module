<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use App\Domain\Models\User;
use App\Domain\Models\Traits\SupportCamelCaseProps;

class Message extends Model
{
    use SupportCamelCaseProps;

    protected $fillable = ['senderId', 'receiverId', 'content', 'read'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'senderId');
    }
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiverId');
    }

    public function isRelatedToCurrentUser()
    {
        return $this->isReceivedByCurrentUser() || $this->isSentByCurrentUser();
    }

    public function isReceivedByCurrentUser()
    {
        return $this->receiverId == Auth::user()->id;
    }

    public function isSentByCurrentUser()
    {
        return $this->senderId == Auth::user()->id;
    }
}
