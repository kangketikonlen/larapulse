<?php

namespace App\Http\Controllers;

use App\Models\System\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('pages.dashboard.superadmin');
    }

    public function administrator(): View
    {
        return view('pages.dashboard.administrator');
    }

    public function general(): View
    {
        return view('pages.dashboard.general');
    }

    public function switch_role(Request $request): RedirectResponse
    {
        $newRole = $request->get('role');
        $roles = Role::where('name', $newRole)->first();

        if (!empty($roles)) {
            $session = array(
                'role_id' => $roles->id,
                'role_name' => $roles->name,
                'role_description' => $roles->description,
                'role_url' => $roles->dashboard_url,
                'role_page' => $roles->is_landing
            );
            Session::put($session);
            return redirect($session['role_url'])->with('alert', ['status', 'success', 'message' => "Session changed!"]);
        }

        return redirect('/')->with('alert', ['status', 'danger', 'message' => "Session failed to change!"]);
    }

    public function reset_role(): RedirectResponse
    {
        $user = auth()->user();
        $session = array(
            'role_id' => $user?->role_id,
            'role_name' => $user?->roles?->name,
            'role_description' => $user?->roles?->description,
            'role_url' => $user?->roles?->dashboard_url,
            'role_page' => $user?->roles?->is_landing
        );
        Session::put($session);
        return redirect('/')->with('alert', ['status', 'success', 'message' => "Session changed!"]);
    }
}
