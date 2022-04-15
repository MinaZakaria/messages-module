<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Message;

interface MessageRepositoryInterface extends BaseRepositoryInterface
{
    public function markAsRead(Message $message);
    public function listFiltered(string $searchMessage = null);
}