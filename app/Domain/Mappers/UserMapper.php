<?php

namespace App\Domain\Mappers;

use App\Domain\Models\User;
use App\Domain\Facades\DateTimeUtility;

class UserMapper
{
    public static function fromDomainFormat(User $user)
    {
        $appFormatData = [];
        $appFormatData['id'] = $user->id;
        $appFormatData['name'] = $user->name;
        $appFormatData['email'] = $user->email;

        $appFormatData['createdAt'] = DateTimeUtility::format($user->createdAt);
        $appFormatData['updatedAt'] = DateTimeUtility::format($user->updatedAt);

        return $appFormatData;
    }
}
