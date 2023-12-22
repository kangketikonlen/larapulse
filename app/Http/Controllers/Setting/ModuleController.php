<?php

namespace App\Http\Controllers\Setting;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\System\Module;
use App\Models\System\Navbar;
use App\Http\Controllers\Controller;
use App\Models\System\Subnavbar;
use Illuminate\Http\RedirectResponse;

class ModuleController extends Controller
{
    protected string $url = "/setting/module";

    public function index(Request $request): View
    {
        $data['query'] = $request->input('query');
        $data['mods'] = Module::paginate(10)->appends(request()->query());
        return view('pages.setting.module.index', $data);
    }

    public function edit(Module $module): View
    {
        $data['mod'] = $module;
        $data['navs'] = Navbar::get();
        return view('pages.setting.module.edit', $data);
    }

    public function update(Module $module, Request $request): RedirectResponse
    {
        $formFields = $request->validate([
            'subnavbars' => 'required'
        ]);

        // Checking the navnars
        $navbars = [];
        foreach ($formFields['subnavbars'] as $subnavbar) {
            $subnavbar = Subnavbar::find($subnavbar);
            if (!in_array($subnavbar->navbar_id, $navbars)) {
                $navbars[] = $subnavbar->navbar_id;
            }
        }

        $formFields['navbars'] = implode(",", $navbars);
        $formFields['subnavbars'] = implode(",", $formFields['subnavbars']);

        $module->update($formFields);

        return redirect($this->url)->with('alert', ['message' => 'Data has been updated!', 'status' => 'success']);
    }

    public function options(Request $request): string|false
    {
        $query = $request->input('q');
        $data = Module::select('id', 'description')->where('description', 'like', '%' . $query . '%')->get();
        return json_encode($data);
    }
}
