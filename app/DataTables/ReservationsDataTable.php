<?php

namespace App\DataTables;

use App\Models\Reservation;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ReservationsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'dashboard.reservations.btn')
            ->addColumn('user_id', function ($q) {
                return $q->user->name;
            })
            ->addColumn('doctor_id', function ($q) {
                return $q->doctor->user->name ?? '--';
            })
            ->addColumn('appointment_id', function ($q) {
                return $q->appointment->day ?? $q->date->format('Y-m-d');
            })
            ->addColumn('type', function ($q) {
                return $q->type_lang;
            })
            ->addColumn('status', function ($q) {
                return $q->status_lang;
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Reservation $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Reservation::with('user','doctor','appointment','specialization','branch','service')->latest();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('reservations-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons(
                Button::make('export'),
                Button::make('print'),
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')->orderable(true)->title('رقم الطلب')->addClass('text-center'),
            Column::make('user_id')->orderable(false)->title('المريض')->addClass('text-center'),
            Column::make('doctor_id')->orderable(true)->title('الطبيب')->addClass('text-center'),
            Column::make('appointment_id')->orderable(true)->title('الميعاد')->addClass('text-center'),
            Column::make('type')->orderable(true)->title('النوع')->addClass('text-center'),
            Column::make('status')->orderable(true)->title('الحالة')->addClass('text-center'),


            Column::computed('action')
                ->title('العمليات')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Reservations_' . date('YmdHis');
    }
}
