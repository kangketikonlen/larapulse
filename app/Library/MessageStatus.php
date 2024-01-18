<?php

namespace App\Library;

class MessageStatus
{
    public static function saveSuccess(): array
    {
        return [
            'status' => 'success',
            'message' => 'Data has been saved!'
        ];
    }

    public static function deleteSuccess(): array
    {
        return [
            'status' => 'danger',
            'message' => 'Data has been deleted!',
        ];
    }

    public static function resetPassSuccess(string $newPassword): array
    {
        return [
            'status' => 'success',
            'message' => 'Password has been reset, your new password is ' . $newPassword
        ];
    }
}
