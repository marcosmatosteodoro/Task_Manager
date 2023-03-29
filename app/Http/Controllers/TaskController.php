<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    protected $task;

    public function __construct()
    {
        $this->task = new Task;
    }

    # Adicionar variaveis opcionais, que serão os filtros
    protected function index(Request $request, $filter=[])
    {
        //GET 	/categories
        $tasks = $this->task->getTasks();

        return view('activities.index', ['activities'=>$tasks]);
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
    
    protected function changeStatus(Request $request)
    {
        #tratar requisição e atualizad corretamente
        $status = 0;
        $id = 1;

        switch ($status) {
            case $this->task->COMPLETED :
                $response = $this->task->taskCompleted($id);
            break;
            
            case $this->task->NOT_DONE :
                $response = $this->task->taskNotDone($id);
            break;

            case $this->task->OVERDUE :
                $response = $this->task->taskOverdue($id);
            break;

            default:
                $response = false;
            break;
        }
    }
}
