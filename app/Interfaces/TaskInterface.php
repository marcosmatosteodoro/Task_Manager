<?php
namespace App\Interface;

interface TaskInterface
{
    public function getTasks(array $filters): object;
    public function getTask(int $id): object;
    public function createTask(string $date, int $activities_id, int $status): bool;
    public function updateTask(int $id, string $date, int $activities_id, int $status): bool;
    public function destroyTask(int $id): bool;
    public function taskCompleted(int $id): bool;
    public function taskNotDone(int $id): bool;
    public function taskOverdue(int $id): bool;
}