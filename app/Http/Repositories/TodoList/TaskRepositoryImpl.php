<?php


namespace App\Http\Repositories\TodoList;


use App\Http\Repositories\TodoList\TaskRepository;
use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class TaskRepositoryImpl implements TaskRepository
{
    protected $task;

    /**
     * TaskRepositoryImpl constructor.
     * @param $task
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function getAll() : Collection
    {
        return $this->task->all();
    }

    public function getById($id) : ?Model
    {
        return $this->task->find($id);
    }

    public function create($data): Model
    {
        $user = $this->task->create([
            'name' => $data->name,
            'content' => $data->content,
            'excepted_date' => $data->exceptedDate
        ]);

        return $user;
    }

    public function update($data): int
    {
        return $this->task->where('id' , $id)->update([
            'name' => $data->name,
            'content' => $data->content,
            'excepted_date' => $data->exceptedDate
        ]);
    }

    public function delete(int $id) : ?int
    {
        return $this->task->where('id', $id)->delete($id);
    }
}
