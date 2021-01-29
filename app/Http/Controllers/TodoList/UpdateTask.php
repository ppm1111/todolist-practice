<?php


namespace App\Http\Controllers\TodoList;


use App\Dto\TodoList\TaskDto;
use App\Http\Controllers\Controller;
use App\Http\Services\TodoList\TaskService;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TaskResource;

class UpdateTask extends Controller
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

    public function __invoke(TaskRequest $request, $id)
    {
        $task = $this->taskService->getTask($id);
    
        $taskDto = new TaskDto();
        $taskDto->id = $id;
        $taskDto->name = $task->name;
        $taskDto->content = $task->content;
        $taskDto->expectedDate = $task->expected_date;

        $result = $this->taskService->updateTask($taskDto);

        return new TaskResource($result);
    }
}
