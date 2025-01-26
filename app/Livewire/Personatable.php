<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Persona;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;


class Personatable extends DataTableComponent
{
    
    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setConfigurableAreas([
            // Para añadir un boton desde la vista anadir
            'toolbar-left-start'=>'admin.personas.anadir',
        
      ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Paterno", "paterno")
                ->sortable()
                ->searchable(),
            Column::make("Materno", "materno")
                ->sortable()
                ->searchable(),
            Column::make("Nombre", "nombre")
                ->sortable()
                ->searchable(),
            Column::make("Tipo docuemento", "tipodocumento.tipodocumento")
                ->sortable()
                ->searchable(),
            Column::make("Ci", "ci")
                ->sortable()
                ->searchable(),
            Column::make("Dirección", "direccion")
                ->sortable()
                ->collapseOnTablet()
                ->searchable(),

            Column::make("Creación", "created_at")
                ->sortable()
                ->deselected(),

            Column::make("Actualización", "updated_at")
                ->sortable()
                ->deselected(),
            Column::make('Acciones')
                ->label(
                   fn($row)=>view('admin.personas.actions', compact('row')
                   )
                ),
        ];
    }

    public function builder(): Builder
    {
        return Persona::query();
                //->select('personas.*');
    }
   //Para eliminar
    public function delete($id)
    {
        $persona = Persona::find($id);
        if ($persona) {
            $persona->delete();
            session()->flash('message', 'Persona eliminada correctamente.');
        } else {
            session()->flash('error', 'Persona no encontrada.');
        }
    }
}
