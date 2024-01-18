<?php

namespace App\Services\Master;

use App\DataTransferObject\UserDto;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public function list(): LengthAwarePaginator
    {
        return User::where('role_id', 2)->paginate(10)->appends(request()->query());
    }

    public function store(UserDto $userDto): User
    {
        $formFields = [
            'role_id' => 2,
            'name' => $userDto->name,
            'username' => $userDto->username,
            'password' => bcrypt($this->generate_password())
        ];
        return User::create($formFields);
    }

    public function generate_password(): string
    {
        $countData = User::count();
        $random = rand(11, 21);
        $serialCode = str_pad(strval($countData + 1), 2, "0", STR_PAD_LEFT);
        return "SCR" . $serialCode . $random . "P";
    }

    public function change_password(string $newPassword, User $user): User
    {
        $formFields = [
            'password' => bcrypt($newPassword),
        ];

        return tap($user)->update($formFields);
    }

    public function list_option(mixed $query): Collection
    {
        return User::where('name', 'like', '%' . $query . '%')->get();
    }
}
