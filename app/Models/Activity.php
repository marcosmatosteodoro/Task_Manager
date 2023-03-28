<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Interface\ActivityInterface;

class Activity extends Model implements ActivityInterface
{
    use HasFactory;

    public function getActivities(array $filters=[]): object
    {
        $activities = self::all();

        if($filters !== [])
            $activities->where($filters);

        return $activities;
    }

    public function getActivity(int $id): object
    {
        return self::find($id);
    }

    public function createActivity(string $name, string $description, string $range, int $status=1): bool
    {
        $response = self::create([
            'name' => $name,
            'description' => $description,
            'range' => $range,
        ]);
        
        return !empty($response);
    }

    public function updateActivity(int $id, string $name, string $description, string $range, int $status): bool
    {
        $activity = self::find($id);

        $activity->name = $name;
        $activity->description = $description;
        $activity->range = $range;
        $activity->status = $status;

        return $activity->save();
    }

    public function destroyActivity(int $id): bool
    {
        $category = self::find($id);
        return $category->destroy();
    }

}
