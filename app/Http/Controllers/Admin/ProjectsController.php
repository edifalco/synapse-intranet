<?php

namespace App\Http\Controllers\Admin;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProjectsRequest;
use App\Http\Requests\Admin\UpdateProjectsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class ProjectsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Project.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('project_access')) {
            return abort(401);
        }


                $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating new Project.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('project_create')) {
            return abort(401);
        }
        
        $statuses = \App\Status::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.projects.create', compact('statuses'));
    }

    /**
     * Store a newly created Project in storage.
     *
     * @param  \App\Http\Requests\StoreProjectsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectsRequest $request)
    {
        if (! Gate::allows('project_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $project = Project::create($request->all());



        return redirect()->route('admin.projects.index');
    }


    /**
     * Show the form for editing Project.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('project_edit')) {
            return abort(401);
        }
        
        $statuses = \App\Status::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $project = Project::findOrFail($id);

        return view('admin.projects.edit', compact('project', 'statuses'));
    }

    /**
     * Update Project in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectsRequest $request, $id)
    {
        if (! Gate::allows('project_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $project = Project::findOrFail($id);
        $project->update($request->all());



        return redirect()->route('admin.projects.index');
    }


    /**
     * Display Project.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('project_view')) {
            return abort(401);
        }
        
        $statuses = \App\Status::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');$budgets = \App\Budget::where('project_id', $id)->get();$meetings = \App\Meeting::where('project_id', $id)->get();$invoices = \App\Invoice::where('project_id', $id)->get();

        $project = Project::findOrFail($id);

        return view('admin.projects.show', compact('project', 'budgets', 'meetings', 'invoices'));
    }


    /**
     * Remove Project from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('project_delete')) {
            return abort(401);
        }
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('admin.projects.index');
    }

    /**
     * Delete all selected Project at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('project_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Project::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
