<?php

namespace Crm\Project\Services;

use Crm\Base\Response\traitResponse;
use Crm\Project\Events\ProjectCreation;
use Crm\Project\Models\Project;
use Crm\Project\Resources\ProjectResource;

class ProjectService
{
    use traitResponse;

    public function index($request)
    {
        $Projects = Project::with('customer')->get();
        return $this->successfully('Success', [
            'Projects' => ProjectResource::collection($Projects)
        ]);
    }

    public function show($Project)
    {
        return $this->successfully('Success', [
            'Project' => new ProjectResource($Project)
        ]);
    }

    public function store(array $data)
    {
        $Project = Project::firstOrCreate($data);

        event(new ProjectCreation($Project));

        return $this->successfully('Created Successfully', [
            'Project' => new ProjectResource($Project)
        ]);
    }

    public function update($data, Project $Project)
    {
        $Project->update($data);
        return $this->successfully('Updated Successfully', [
            'Project' => new ProjectResource($Project)
        ]);
    }

    public function delete(Project $Project): bool
    {
        return $Project->delete();
    }
}
