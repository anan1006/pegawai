<?php

namespace App\DataTables;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PegawaiDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function(Pegawai $pegawai){
                return view('pages.pegawai.action',compact("pegawai"));
            })
            ->addColumn('isActive', function(Pegawai $pegawai){
                if ($pegawai->isActive == 1) {
                    return "Tampil";
                }else {
                    return "Tidak Tampil";
                }
            })
            ->editColumn('status', function(Pegawai $pegawai){
                return 'Pegawai '.$pegawai->status;
            })
            ->editColumn('gaji', function(Pegawai $pegawai){
                return 'Rp. '. number_format($pegawai->gaji, 0 , "," , ".");
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Pegawai $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('pegawai-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('nama_pegawai')
            ->addClass('text-capitalize text-center'),
            // Column::make('telepon')
            // ->addClass('text-center'),
            Column::make('posisi')
            ->addClass('text-capitalize text-center'),
            Column::make('status')
            ->title("Status Kepegawaian")
            ->addClass('text-capitalize text-center'),
            Column::make('gaji')
            ->addClass('text-center'),
            Column::computed('isActive')
            ->addClass('text-center')
            ->title("Tampil di Landing"),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'),

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Pegawai_' . date('YmdHis');
    }
}
