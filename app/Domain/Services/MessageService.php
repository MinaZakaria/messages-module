<?php

namespace App\Domain\Services;

use App\Domain\Mappers\MessageMapper;
use App\Domain\Models\Message;
use App\Domain\Repositories\MessageRepositoryInterface;

class MessageService
{
    private $messageRepository;

    public function __construct(MessageRepositoryInterface $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    public function send(int $senderId, string $content, int $receiverId)
    {
        $messageData = compact('senderId', 'content', 'receiverId');

        $message = $this->messageRepository->create($messageData);

        return MessageMapper::fromDomainFormat($message);
    }

    public function view(int $messageId)
    {
        $message = $this->findOrFail($messageId);

        if ($message->isReceivedByCurrentUser() && $message->read == false) {
            $this->messageRepository->markAsRead($message);
        }

        return MessageMapper::fromDomainFormat($message);
    }

    public function findOrFail(int $messageId): ?Message
    {
        return $this->messageRepository->findOrFail($messageId);
    }

    public function listFiltered(string $searchMessage = null)
    {
        $messages = $this->messageRepository->listFiltered($searchMessage);
        return MessageMapper::fromDomainFormatList($messages);
    }

    public function canAccessMessage($messageId)
    {
        $message = $this->findOrFail($messageId);
        return $message->isRelatedToCurrentUser();
    }
}
