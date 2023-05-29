<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait ApiTrait
{
    /**************************************
     * scope para modificar las consultas *
     **************************************/
    //Para ver categoría y sus relaciones
    public function scopeIncluded(Builder $query)
    {
        if (!empty([$this->allowIncluded, request('included')])) {
            $relations = explode(',', request('included')); // [posts, relation2]
            $allowIncluded = collect($this->allowIncluded);
            foreach ($relations as $key => $relationship) {
                if (!$allowIncluded->contains($relationship)) {
                    unset($relations[$key]);
                }
            }
            $query->with($relations);
        }
    }
    // Para filtrar por campos
    public function scopeFilter(Builder $query)
    {
        if (empty($this->allowFilter)) {
            return;
        }
        $filters = request('filter');
        if (empty($filters)) {
            return;
        }
        $allowFilter = collect($this->allowFilter);
        foreach ($filters as $filter => $value) {
            if ($allowFilter->contains($filter)) {
                if ($filter === 'search') {
                    $query->search($value);
                } else {
                    $query->where($filter, 'LIKE', '%' . $value . '%');
                }
            }
        }
    }

    public function scopeSort(Builder $query)
    {
        if (empty($this->allowSort) || empty(request('sort'))) {
            return;
        }
        $sortFields = explode(',', request('sort'));
        $allowSort = collect($this->allowSort);
        foreach ($sortFields as $sortField) {
            $direction = 'asc';
            if (substr($sortField, 0, 1) == '-') {
                $direction = 'desc';
                $sortField = substr($sortField, 1);
            }
            if ($allowSort->contains($sortField)) {
                $query->orderBy($sortField, $direction);
            }
        }
    }
    public function scopeSearch(Builder $query, $searchTerm)
    {
        if (empty($this->allowSearch) || empty($searchTerm)) {
            return;
        }
        $searchableFields = collect($this->allowSearch);
        $query->where(function ($query) use ($searchableFields, $searchTerm) {
            foreach ($searchableFields as $field) {
                $query->orWhere($field, 'LIKE', '%' . $searchTerm . '%');
            }
        });
    }
    public function scopeGetOrPaginate(Builder $query)
    {
        if (request('perPage')) {
            $perPage = intval(request('perPage')); //convertimos a un entero
            //Si es un entero
            if ($perPage) {
                //paginar
                return $query->paginate($perPage);
            }
        }
        //caso contrario mostrar todos los registros
        return $query->get();
    }
}
