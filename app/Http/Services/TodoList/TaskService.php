<?php


namespace App\Http\Services\TodoList;


use App\Dto\TodoList\TaskDto;
use App\Http\Repositories\TodoList\TaskRepository;
use Illuminate\Database\QueryException;
use App\Exceptions\InternalServerError;
use App\Exceptions\NotFoundException;

class TaskService
{
    private $taskRepository;

    /**
     * TaskService constructor.
     * @param TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function getTask($id) {
        $task = $this->taskRepository->getById($id);
        return $task;
    }

    public function getList()
    {
        return $this->taskRepository->getAll();
    }

    public function addTask(TaskDto $dto)
    {
        try {
            $result = $this->taskRepository->create($dto);
        } catch (QueryException $e) {
            $data = [
                'module' => 'task',
                'errorType' => 'TASK_ROW_DUPLICATE',
                'data' => [
                    'errors' => $e->getMessage()
                ]
            ];
            throw new InternalServerError($data);
        }

        return $result;
    }

    public function updateTask(TaskDto $dto)
    {
        $result = $this->taskRepository->getById($dto->id);

        if (empty($result)) {
            $data = [
                'module' => 'task',
                'errorType' => 'TASK_NOT_FOUND',
            ];
            throw new NotFoundException($data);
        }

        try {
            $result = $this->taskRepository->update($dto);
        } catch (QueryException $e) {
            $data = [
                'module' => 'task',
                'errorType' => 'TASK_ROW_DUPLICATE',
                'data' => [
                    'errors' => $e->getMessage()
                ]
            ];
            throw new InternalServerError($data);
        }

        return $result;
    }

    public function deleteTask(int $id)
    {
        $result = $this->taskRepository->getById($id);
        if (empty($result)) {
            $data = [
                'module' => 'task',
                'errorType' => 'TASK_NOT_FOUND',
            ];
            throw new NotFoundException($data);
        }

        return $this->taskRepository->delete($id);
    }
}
