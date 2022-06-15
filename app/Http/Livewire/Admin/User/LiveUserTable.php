<?php

namespace App\Http\Livewire\Admin\User;

// use Livewire\Component;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;


class LiveUserTable extends DataTableComponent
{

    protected $model = User::class;
    // public $myParam = 'Default';
    // public string $tableName = 'users1';
    // public array $users1 = [];

    public $columnSearch = [
        'name' => null,
        'email' => null,
        // 'active' => null,
    ];
    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setFiltersEnabled();
        $this->setFiltersVisibilityStatus(true);
        $this->setFiltersVisibilityEnabled();
        $this->setFilterPillsStatus(true);
        $this->setFilterPillsEnabled();
        $this->setFilterLayoutPopover();
        $this->setFilterLayoutSlideDown();
        $this->setFilterLayout('slide-down');
        $this->setHideBulkActionsWhenEmptyDisabled();
    }
    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make('Nombre', 'name')
                ->sortable()
                ->searchable(),
            Column::make('Correo electróncio', 'email')
                ->sortable()
                ->searchable()
                ->collapseOnMobile(),
            BooleanColumn::make('Estado', 'active')
                ->sortable()
                ->searchable()
                ->collapseOnMobile(),
            Column::make('Registrado', 'created_at')
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make('Actions')
                ->label(fn ($row, Column $column) => view('admin.pages.user.partials.buttons'))
                ->unclickable(),
        ];
    }
    // public function filters(): array
    // {
    //     return [
    //         SelectFilter::make('Active')
    //             ->options([
    //                 '' => 'All',
    //                 '1' => 'Yes',
    //                 '0' => 'No',
    //             ])
    //             ->filter(function (Builder $builder, string $value) {
    //                 if ($value === '1') {
    //                     $builder->where('active', true);
    //                 } elseif ($value === '0') {
    //                     $builder->where('active', false);
    //                 }
    //             }),
    //     ];
    // }
    public function builder(): Builder
    {
        return User::query()
            ->when($this->columnSearch['name'] ?? null, fn ($query, $name) => $query->where('users.name', 'like', '%' . $name . '%'))
            ->when($this->columnSearch['email'] ?? null, fn ($query, $email) => $query->where('users.email', 'like', '%' . $email . '%'));
        // return User::query()
        //     ->when($this->getAppliedFilterWithValue('active'), fn ($query, $active) => $query->where('active', $active === 'yes'));
    }
    public function bulkActions(): array
    {
        return [
            'activate' => 'Activar',
            'deactivate' => 'Desactivar',
            'export' => 'Exportar',
        ];
    }
    public function export()
    {

        foreach ($this->getSelected() as $item) {
            dd($item);
        }

        // $users = $this->getSelected();
        // $this->clearSelected();

        // return Excel::download(new UsersExport($users), 'users.xlsx');
    }
    public function activate()
    {
        User::whereIn('id', $this->getSelected())->update(['active' => true]);

        $this->clearSelected();
    }
    public function deactivate()
    {
        User::whereIn('id', $this->getSelected())->update(['active' => false]);

        $this->clearSelected();
    }
}