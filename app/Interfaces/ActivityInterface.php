<?php
namespace App\Interface;

interface ActivityInterface
{
    public function getActivities(array $filters): object;
    public function getActivity(int $id): object;
    public function createActivity(string $name, string $description, string $range, int $status): bool;
    public function updateActivity(int $id, string $name, string $description, string $range, int $status): bool;
    public function destroyActivity(int $id): bool;
}