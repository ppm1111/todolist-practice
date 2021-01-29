<?php


namespace App\Http\Controllers\TodoList;


use App\Http\Controllers\Controller;
use App\Http\Services\TodoList\TaskService;
use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;
use App\Http\Resources\TaskCollection;

class GetTaskList extends Controller
{
    private $taskService;

    /**
     * GetTaskList constructor.
     * @param TaskService $taskService
     */
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function __invoke(Request $request)
    {
        $result = $this->taskService->getList();
        return new TaskCollection(TaskResource::collection($result));
    }
}
