<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Empresa;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class Empresatable extends DataTableComponent
{

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setConfigurableAreas([
            // Para añadir un boton desde la vista anadir
            'toolbar-left-start'=>'admin.empresas.anadir',
        
      ]);
    }

    protected $model = Empresa::class;

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->searchable(),
            Column::make("Empresa", "empresa")
                ->sortable()
                ->searchable(),
            Column::make("Nit", "nit")
                ->sortable()
                ->searchable(),
            Column::make("Creado", "created_at")
                ->sortable(),
            Column::make("Actualizado", "updated_at")
                ->sortable(),
            Column::make('Acciones')
                ->label(
                   fn($row)=>view('admin.empresas.actions', compact('row')
                   )
                ),
        ];
    }
    public function builder(): Builder
    {
        return Empresa::query();
                //->select('empresas.*');
    }
   //Para eliminar
    public function delete($id)
    {
        $empresa = Empresa::find($id);
        if ($empresa) {
            $empresa->delete();
            session()->flash('message', 'empresa eliminada correctamente.');
        } else {
            session()->flash('error', 'empresa no encontrada.');
        }
    }
}
