<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\MessageRepositoryInterface;
use App\Domain\Models\Message;

class MessageRepository extends BaseRepository implements MessageRepositoryInterface
{
    public function model()
    {
        return Message::class;
    }

    public function markAsRead(Message $message)
    {
        $message->read = true;
        $message->save();

        return $message;
    }

    public function listFiltered(string $searchMessage = null)
    {
        $currentUserId = auth()->user()->id;

        $qb = Message::select('messages.*')
            ->leftJoin('users as senders_table', 'messages.sender_id', '=', 'senders_table.id')
            ->leftJoin('users as receivers_table', 'messages.receiver_id', '=', 'receivers_table.id');

        $qb = $qb->where(function ($query) use ($currentUserId) {
            $query->where('sender_id', $currentUserId)
                ->orWhere('receiver_id', $currentUserId);
        });

        if ($searchMessage) {
            $qb->where(function ($query) use ($searchMessage) {
                $query->where('senders_table.name', 'like', '%' . $searchMessage . '%')
                    ->orWhere('content', 'like', '%' . $searchMessage . '%')
                    ->orWhere('receivers_table.name', 'like', '%' . $searchMessage . '%');
            });
        }

        return $qb->get();
    }
}
