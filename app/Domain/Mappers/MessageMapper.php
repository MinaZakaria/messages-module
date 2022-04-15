<?php

namespace App\Domain\Mappers;

use App\Domain\Models\Message;
use App\Domain\Mappers\UserMapper;
use App\Domain\Facades\DateTimeUtility;

class MessageMapper
{
    public static function fromDomainFormat(Message $message)
    {
        $appFormatData = [];
        $appFormatData['id'] = $message->id;
        $appFormatData['content'] = $message->content;
        $appFormatData['read'] = (boolean) $message->read;

        $appFormatData['createdAt'] = DateTimeUtility::format($message->createdAt);
        $appFormatData['updatedAt'] = DateTimeUtility::format($message->updatedAt);

        $appFormatData['sender'] = UserMapper::fromDomainFormat($message->sender);
        $appFormatData['receiver'] = UserMapper::fromDomainFormat($message->receiver);

        return $appFormatData;
    }

    public static function fromDomainFormatList(iterable $messages)
    {
        $allData = [];
        foreach ($messages as $message) {
            $allData[] = self::fromDomainFormat($message);
        }
        return $allData;
    }
}
