<?php

namespace App\Http\Controllers;

/**
 * Class BaseCrudController
 *
 * @package App\Http\Controllers
 */
abstract class BaseCrudController extends Controller
{
    /**
     * Inject model.
     */
    protected $model;

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->paginate();
    }

    /**
     * @return mixed
     */
    public function store()
    {
        return $this->model->create($this->inputStore());
    }

    /**
     * @param $id
     */
    public function update($id)
    {
        $model = $this->model->findOrFail($id);
        $model->fill($this->inputUpdate());
        $model->save();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * @return mixed
     */
    abstract protected function inputStore();

    /**
     * @return mixed
     */
    abstract protected function inputUpdate();
}
