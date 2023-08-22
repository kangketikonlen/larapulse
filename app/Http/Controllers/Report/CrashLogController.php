<?php

namespace App\Http\Controllers\Report;

use Illuminate\Http\Request;
use App\Models\System\CrashLog;
use App\Http\Controllers\Controller;

class CrashLogController extends Controller
{
    protected $url = "/report/crash-log";

    public function index(Request $request)
    {
        $data['query'] = $request->input('query');
        $data['crashLogs'] = CrashLog::orderBy('id', 'desc')->paginate(10)->appends(request()->query());
        return view('pages.report.crash-log.index', $data);
    }

    public function clear()
    {
        CrashLog::truncate();
        return redirect($this->url)->with('alert', ['message' => 'Data has been deleted!', 'status' => 'danger']);
    }
}