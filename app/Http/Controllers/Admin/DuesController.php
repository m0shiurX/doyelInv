<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDueRequest;
use App\Http\Requests\StoreDueRequest;
use App\Http\Requests\UpdateDueRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DuesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('due_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dues.index');
    }

    public function create()
    {
        abort_if(Gate::denies('due_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dues.create');
    }

    public function store(StoreDueRequest $request)
    {
        $due = Due::create($request->all());

        return redirect()->route('admin.dues.index');
    }

    public function edit(Due $due)
    {
        abort_if(Gate::denies('due_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dues.edit', compact('due'));
    }

    public function update(UpdateDueRequest $request, Due $due)
    {
        $due->update($request->all());

        return redirect()->route('admin.dues.index');
    }

    public function show(Due $due)
    {
        abort_if(Gate::denies('due_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dues.show', compact('due'));
    }

    public function destroy(Due $due)
    {
        abort_if(Gate::denies('due_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $due->delete();

        return back();
    }

    public function massDestroy(MassDestroyDueRequest $request)
    {
        $dues = Due::find(request('ids'));

        foreach ($dues as $due) {
            $due->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
