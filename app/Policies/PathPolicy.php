<?php

namespace App\Policies;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class PathPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
    * Get model name from namespace
    *
    * @param string $scdmodel
    * @return string $modelname
    */
    protected function getModelName($scdmodel)
    {
        $modelname = last(explode('App\\', $scdmodel));
        return $modelname;
    }

    public function index($firstmodel, $scdmodel)
    {
        $modelname = $this->getModelName($scdmodel);
        return Auth::user()->superCan('index_'.strtolower(str_plural($modelname)));
    }

    public function show($firstmodel, $scdmodel)
    {
        $modelname = $this->getModelName($scdmodel);
        return Auth::user()->superCan('show_'.strtolower(str_plural($modelname)));
    }

    public function create($firstmodel, $scdmodel)
    {
        $modelname = $this->getModelName($scdmodel);
        return Auth::user()->superCan('create_'.strtolower(str_plural($modelname)));
    }

    public function update($firstmodel, $scdmodel)
    {
        $modelname = $this->getModelName($scdmodel);
        return Auth::user()->superCan('edit_'.strtolower(str_plural($modelname)));
    }

    public function destroy($firstmodel, $scdmodel)
    {
        $modelname = $this->getModelName($scdmodel);
        return Auth::user()->superCan('delete_'.strtolower(str_plural($modelname)));
    }
}
