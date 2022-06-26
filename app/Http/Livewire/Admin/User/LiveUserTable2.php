<?php

namespace App\Http\Livewire\Admin\User;

// use Livewire\Component;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;

class LiveUserTable2 extends DataTableComponent
{

    public string $tableName = 'users';
    public array $users = [];

    public $columnSearch = [
        'name' => null,
        'email' => null,
    ];
    public function configure(): void
    {
        // $this->setPrimaryKey('id');
        // $this->setFiltersEnabled();
        // $this->setFiltersVisibilityStatus(true);
        // $this->setFiltersVisibilityEnabled();
        // $this->setFilterPillsStatus(true);
        // $this->setFilterPillsEnabled();
        // $this->setFilterLayoutPopover();
        // $this->setFilterLayoutSlideDown();
        // $this->setFilterLayout('slide-down');
        // $this->setHideBulkActionsWhenEmptyDisabled();

        $this->setPrimaryKey('id')
            // ->setReorderEnabled()
            ->setSingleSortingDisabled()
            ->setReorderDisabled()
            // ->setHideReorderColumnUnlessReorderingEnabled()
            ->setFilterLayoutSlideDown()
            ->setFiltersVisibilityEnabled()
            ->setFilterPillsStatus(true)
            ->setFilterPillsEnabled()
            ->setDefaultSort('created_at', 'desc') //no funciona
            // ->setRememberColumnSelectionDisabled()
            ->setSecondaryHeaderTrAttributes(function ($rows) {
                return ['class' => 'bg-gray-100'];
            })
            ->setSecondaryHeaderTdAttributes(function (Column $column, $rows) {
                if ($column->isField('id')) {
                    return ['class' => 'text-red-500'];
                }

                return ['default' => true];
            })
            ->setFooterTrAttributes(function ($rows) {
                return ['class' => 'bg-gray-100'];
            })
            ->setFooterTdAttributes(function (Column $column, $rows) {
                if ($column->isField('name')) {
                    return ['class' => 'text-green-500'];
                }

                return ['default' => true];
            })
            ->setUseHeaderAsFooterEnabled()
            ->setColumnSelectDisabled()
            ->setRememberColumnSelectionStatus(true)
            ->setRememberColumnSelectionEnabled()
            ->setColumnSelectEnabled()
            ->setHideBulkActionsWhenEmptyEnabled();
    }
    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable()
                ->searchable()
                ->collapseOnTablet()
                ->setSortingPillTitle('Key')
                ->setSortingPillDirections('0-9', '9-0'),
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
                ->collapseOnMobile()
                ->deselected(),
            Column::make('Registrado', 'created_at')
                ->sortable()
                ->searchable()
                ->format(fn ($value, $row, Column $column) => $row->created_at->format('d-m-Y'))
                ->collapseOnTablet(),
            Column::make('Actions')
                ->label(fn ($row, Column $column) => view('admin.pages.user.partials.buttons'))
                ->unclickable(),
        ];
    }
    public function filters(): array
    {
        return [
            // MultiSelectFilter::make('Tags')
            // ->options(
            //     Tag::query()
            //         ->orderBy('name')
            //         ->get()
            //         ->keyBy('id')
            //         ->map(fn ($tag) => $tag->name)
            //         ->toArray()
            // )->filter(function (Builder $builder, array $values) {
            //     $builder->whereHas('tags', fn ($query) => $query->whereIn('tags.id', $values));
            // })
            //     ->setFilterPillValues([
            //         '3' => 'Tag 1',
            //     ]),
            SelectFilter::make('Correo verificado', 'email_verified_at')
                ->setFilterPillTitle('Verified')
                ->options([
                    ''    => 'Todos',
                    'yes' => 'Si',
                    'no'  => 'No',
                ])
                ->filter(function (Builder $builder, string $value) {
                    if ($value === 'yes') {
                        $builder->whereNotNull('email_verified_at');
                    } elseif ($value === 'no') {
                        $builder->whereNull('email_verified_at');
                    }
                }),
            SelectFilter::make('Activo', 'active')
                ->setFilterPillTitle('Estado de Usuario')
                ->setFilterPillValues([
                    '1' => 'Activo',
                    '0' => 'Inactivo',
                ])
                ->options([
                    '' => 'Todos',
                    '1' => 'Si',
                    '0' => 'No',
                ])
                ->filter(function (Builder $builder, string $value) {
                    if ($value === '1') {
                        $builder->where('active', true);
                    } elseif ($value === '0') {
                        $builder->where('active', false);
                    }
                }),
            DateFilter::make('Fecha inicio')
                ->config([
                    'min' => '2020-01-01',
                    'max' => '2021-12-31',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('email_verified_at', '>=', $value);
                }),
            DateFilter::make('Fecha fin')
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('email_verified_at', '<=', $value);
                }),
        ];
    }
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