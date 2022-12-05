<?php

namespace App\Http\Livewire\Admin\YouthObservatory;

use App\Models\admin\Youth_observatory;
use App\Models\admin\YouthObservatory;
use Livewire\Component;

class YouthObservatoryTable extends Component
{
   // use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = "";
    public $perPage = 5; //Para filtrar cuando se ve
    public $camp = null; //Para fel campo a ordenar
    public $order = null; //Para fel campo a ordenar ascendente o descendente
    public $icon = '-sort'; //Para el ícono
    /*******************************************************
     * Para mantener persistente los filtros y la búsqueda *
     *******************************************************/
    protected $queryString = [
        'search' => ['except' => ''],
        'camp' => ['except' => null],
        'order' => ['except' => null],
    ];
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingPerPage()
    {
        $this->resetPage();
        $this->gotoPage(1);//puse por el error de paginaciòn
    }
    public function mount()
    {
        $this->camp = 'created_at'; //Para que carga filtrado porla fecha de creación
        $this->order = 'desc';      //Para que carga en forma descendente
        $this->icon = $this->iconDirection($this->order);
    }
    public function render()
    {
        $youthObservatories = YouthObservatory::where('mission', 'like', "%{$this->search}%")
        ->orWhere('url_organization_chart', 'like', "%{$this->search}%");


        //Verificamos si el campo no son nuloss
        if ($this->camp and $this->order) {
            //Ejecuta la sentensettings agrega al usuario + el orderby
            $youthObservatories = $youthObservatories->orderBy($this->camp, $this->order);
        } else {
            $this->camp = null;
            $this->order = null;
        }
        $youthObservatories = $youthObservatories->paginate($this->perPage);
        // $categories = Category::paginate(5);
        return view('livewire.admin.youth-observatory.youth-observatory-table', compact('youthObservatories'));
    }
    public function sortable($camp)
    {
        if ($camp !== $this->camp) {
            $this->order = null;
        }
        // dd($camp);
        switch ($this->order) {
            case null:
                $this->order = 'asc';
                // $this->icon = '-sort-up';
                break;
            case 'asc':
                $this->order = 'desc';
                // $this->icon = '-sort-down';
                break;
            case 'desc':
                $this->order = null;
                // $this->icon = '-sort';
                break;
            default:
                $this->order = 'asc';
                // $this->icon = '-sort-up';
                break;
        }
        // Actualizamos el campo a nivel global
        $this->icon = $this->iconDirection($this->order);
        $this->camp = $camp;
    }
    public function iconDirection($sort): string
    {
        if (!$sort) {
            return '-sort';
        }
        return $sort === 'asc' ? '-sort-up' : '-sort-down';
    }
    //Método para limpiar todo
    public function clear()
    {
        $this->page = 1;
        $this->order = null;
        $this->camp = null;
        $this->icon = '-sort';
        $this->search = '';
        $this->perPage = 5;
    }
}
