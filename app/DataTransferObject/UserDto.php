<?php

namespace App\DataTransferObject;

use App\Http\Requests\Master\UserRequest;

class UserDto
{
    public readonly mixed $name;
    public readonly mixed $username;
    public readonly mixed $password;

    public function __construct(mixed $name, mixed $username, mixed $password)
    {
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
    }

    public static function fromRequest(UserRequest $userRequest): UserDto
    {
        return new self(
            $userRequest->validated('name'),
            $userRequest->validated('username'),
            $userRequest->validated('password'),
        );
    }
}
