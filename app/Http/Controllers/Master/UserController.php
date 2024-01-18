<?php

namespace App\Http\Controllers\Master;

use App\DataTransferObject\UserDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\UserRequest;
use App\Http\Resources\UserResource;
use App\Library\MessageStatus;
use App\Models\User;
use App\Services\Master\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    protected string $url = "/master/user";
    protected UserService $service;

    public function __construct(UserService $service,)
    {
        $this->service = $service;
    }

    public function index(Request $request): View
    {
        $data['query'] = $request->input('query');
        $data['users'] = $this->service->list();
        return view('pages.master.user.index', $data);
    }

    public function create(): View
    {
        return view('pages.master.user.create');
    }

    public function store(UserRequest $request): RedirectResponse
    {
        $this->service->store(UserDto::fromRequest($request));
        return redirect($this->url)->with('alert', MessageStatus::saveSuccess());
    }

    public function reset_password(User $user): RedirectResponse
    {
        $newPassword = $this->service->generate_password();
        $this->service->change_password($newPassword, $user);
        return redirect($this->url)->with('alert', MessageStatus::resetPassSuccess($newPassword));
    }

    public function delete(User $user): RedirectResponse
    {
        $user->delete();
        return redirect($this->url)->with('alert', MessageStatus::deleteSuccess());
    }

    public function options(Request $request): UserResource
    {
        $query = $request->input('q');
        $data = $this->service->list_option($query);
        return UserResource::make($data);
    }
}
