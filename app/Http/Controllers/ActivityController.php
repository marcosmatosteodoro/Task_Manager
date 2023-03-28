<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    //
    protected $activity;

    public function __construct()
    {
        $this->activity = new Activity;
    }

    protected function index(Request $request)
    {
        //GET 	/categories
        $activity = new Activity;
        $activities = $activity->getActivities();

        return view('activities.index', ['activities'=>$activities]);
    }

    protected function create(Request $request)
    {
        //GET /categories/create
        return 'entrei em create';
    }

    protected function show(Request $request)
    {
        //GET /categories/{id}
        return 'entrei em show';
    }

    protected function edit(Request $request)
    {
        //GET /categories/{id}/edit
        return 'entrei em edit';
    }

    protected function store(Request $request)
    {
        //POST /categories
    }

    protected function update(Request $request)
    {
        //PUT/PATCH /categories/{id}
    }

    protected function destroy(Request $request)
    {
        //DELETE /categories/{id}
    }
}
