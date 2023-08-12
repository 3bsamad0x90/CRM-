<?php

namespace App\Http\Controllers;

use Crm\Project\Requests\ProjectStoreRequest;
use Crm\Project\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private ProjectService $ProjectService;

    public function __construct(ProjectService $ProjectService)
    {
        $this->ProjectService = $ProjectService;
    }

    public function index(Request $request)
    {
        return $this->ProjectService->index($request);
    }

    public function show($Project)
    {
        return $this->ProjectService->show($Project);
    }

    public function store(ProjectStoreRequest $request)
    {
        $data = $request->validated();
        return $this->ProjectService->store($data);
    }

    public function update(Request $request, $Project)
    {
        return $this->ProjectService->update($request->all(), $Project);
    }

    public function destroy($Project)
    {
        return $this->ProjectService->delete($Project);
    }

}
