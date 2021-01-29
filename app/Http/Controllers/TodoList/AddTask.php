<?php


namespace App\Http\Controllers\TodoList;


use App\Dto\TodoList\TaskDto;
use App\Http\Controllers\Controller;
use App\Http\Services\TodoList\TaskService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Exceptions\NotFoundHttpException;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;

class AddTask extends Controller
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

    public function __invoke(TaskRequest $request)
    {
        $taskDto = new TaskDto();
        $taskDto->name = $request->input('name');
        $taskDto->content = $request->input('content');
        $taskDto->exceptedDate = $request->input('excepted_date');

        $result = $this->taskService->addTask($taskDto);

        return new TaskResource($result);
    }
}
