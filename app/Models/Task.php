<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Interface\TaskInterface;

class Task extends Model implements TaskInterface
{
    use HasFactory;

    const COMPLETED = 1;
    const NOT_DONE  = 2;
    const OVERDUE   = 3;

    protected $fillable = ['date','activities_id', 'status'];
    
    public function getTasks(array $filters=[]): object
    {
        $tasks = self::all();

        if($filters !== [])
            $tasks->where($filters);

        return $tasks;
    }
    
    public function getTask(int $id): object
    {
        return self::find($id);
    }

    public function createTask(string $date, int $activities_id, int $status): bool
    {
        $response = self::create([
            'date' => $date,
            'activities_id' => $activities_id,
            'status' => $status,
        ]);
        
        return !empty($response);
    }

    public function updateTask(int $id, string $date, int $activities_id, int $status): bool
    {
        $task = self::find($id);

        $task->date = $date;
        $task->activities_id = $activities_id;
        $task->status = $status;

        return $task->save();
    }

    public function destroyTask(int $id): bool
    {
        $task = self::find($id);
        return $task->destroy();
    }

    public function taskCompleted(int $id): bool
    {
        return $this->saveStatus($id, self::COMPLETED);
    }

    public function taskNotDone(int $id): bool
    {
        return $this->saveStatus($id, self::NOT_DONE);
    }

    public function taskOverdue(int $id): bool
    {
        return $this->saveStatus($id, self::OVERDUE);
    }

    protected function saveStatus(int $id, int $status):bool
    {
        $task = self::find($id);
        $task->status = $status;
        return $task->save();
    }
}
