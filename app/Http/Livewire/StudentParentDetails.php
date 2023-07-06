<?php

namespace App\Http\Livewire;

use App\Models\Student;
use App\Models\Relationship;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Filters\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\{ActionButton, WithExport};
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridColumns};

final class StudentParentDetails extends PowerGridComponent
{public bool $multiSort = true;
    use ActionButton;
    use WithExport;
    
    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            
            Header::make()->showToggleColumns()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
            Exportable::make('Student Details')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return Builder<\App\Models\Relationship>
     */
    public function datasource(): Builder
    {
        return Relationship::query()->select('students.*','father_main.name as father_name','father_main.ic_no as father_ic_no','father_main.occupation as father_occupation','father_main.company_name as father_company_name','father_main.company_add as father_company_add',
        'father_main.email as father_email','father_main.tel as father_tel',
        'mother_main.name as mother_name','mother_main.ic_no as mother_ic_no','mother_main.occupation as mother_occupation','mother_main.company_name as mother_company_name','mother_main.company_add as mother_company_add',
        'mother_main.email as mother_email','mother_main.tel as mother_tel')
        ->join('students','relationship.student','=','students.student_id')
        ->join('parents as father_main','relationship.father','=','father_main.parent_id')
        ->join('parents as mother_main','relationship.mother','=','mother_main.parent_id')
        ;
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
        ->addColumn('record_year')
        ->addColumn('type')
        ->addColumn('students.first_name')
        ->addColumn('last_name')
        ->addColumn('fullname')
        ->addColumn('gender')
        ->addColumn('dob')
        ->addColumn('birth_cert_no')
        ->addColumn('mykid')
        ->addColumn('race')
        ->addColumn('nationality')
        ->addColumn('prev_kindy')
        ->addColumn('no_years')
        ->addColumn('religion')
        ->addColumn('home_add')
        ->addColumn('home_lang')
        ->addColumn('home_tel')
        ->addColumn('j1_class')
        ->addColumn('j2_class')
        ->addColumn('j3_class')
        ->addColumn('aft_j1_class')
        ->addColumn('aft_j2_class')
        ->addColumn('aft_j3_class')
        ->addColumn('father_name')
        ->addColumn('father_ic_no')
        ->addColumn('father_occupation')
        ->addColumn('father_company_name')
        ->addColumn('father_tel')
        ->addColumn('father_email')
        ->addColumn('mother_name')
        ->addColumn('mother_ic_no')
        ->addColumn('mother_occupation')
        ->addColumn('mother_company_name')
        ->addColumn('mother_tel')
        ->addColumn('mother_email');
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
      * PowerGrid Columns.
      *
      * @return array<int, Column>
      */
    public function columns(): array
    {
        return [
            Column::add()->title('Student Name')->field('fullname','fullname')->searchable()->sortable(),
            Column::make('Entry Year','entry_year')->sortable(),
            Column::make('Type', 'type')->searchable()->sortable(),
            Column::make('Birth Cert', 'birth_cert_no')->sortable(),
            Column::make('MyKid', 'mykid')->sortable(),
            Column::make('DOB','dob')->searchable()->sortable(),
            Column::make('Gender', 'gender')->sortable(),
            Column::make('Race', 'race')->sortable(),
            Column::make('Address', 'home_add')->sortable(),
            Column::make('Previous Kindy', 'prev_kindy')->sortable(),
            Column::make('Number of years in Previous Kindy', 'no_years')->sortable(),
            Column::make('Religion', 'religion')->sortable(),
            Column::make('Home Language', 'home_lang')->sortable(),
            Column::make('Home Telephone No.', 'home_tel')->sortable(),
            Column::make('Nationality', 'nationality')->sortable(),
            Column::make('J1 Class','j1_class')->sortable(),
            Column::make('J2 Class','j2_class')->sortable(),
            Column::make('J3 Class','j3_class')->sortable(),
            Column::make('Afternoon J1 Class','aft_j1_class')->sortable(),
            Column::make('Afternoon J2 Class','aft_j2_class')->sortable(),
            Column::make('Afternoon J3 Class','aft_j3_class')->sortable(),
            Column::add()->title('Father Name')->field('father_name','father_name')->sortable(),
            Column::make('Father IC', 'father_ic_no')->sortable(),
            Column::make('Father Contact', 'father_tel')->sortable(),
            Column::make('Father Occupation', 'father_occupation')->sortable(),
            Column::make('Father Company', 'father_company_name')->sortable(),
            Column::make('Father Email', 'father_email')->sortable(),
            Column::make('Mother', 'mother_name')->sortable(),
            Column::make('Mother IC', 'mother_ic_no')->sortable(),
            Column::make('Mother Contact', 'mother_tel')->sortable(),
            Column::make('Mother Occupation', 'mother_occupation')->sortable(),
            Column::make('Mother Company', 'mother_company_name')->sortable(),
            Column::make('Mother Email', 'mother_email')->sortable()


        ];
    }

    /**
     * PowerGrid Filters.
     *
     * @return array<int, Filter>
     */
    public function filters(): array
    {
        return [
            Filter::inputText('fullname')
            ->operators(['contains']),

                
            Filter::select('type', 'type')
            ->dataSource(Relationship::enrolType())
            ->optionValue('type')
            ->optionLabel('type'),

            Filter::select('religion', 'religion')
            ->dataSource(Relationship::religion())
            ->optionValue('religion')
            ->optionLabel('religion'),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid Relationship Action Buttons.
     *
     * @return array<int, Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('relationship.edit', function(\App\Models\Relationship $model) {
                    return $model->id;
               }),

           Button::make('destroy', 'Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('relationship.destroy', function(\App\Models\Relationship $model) {
                    return $model->id;
               })
               ->method('delete')
        ];
    }
    */

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Relationship Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($relationship) => $relationship->id === 1)
                ->hide(),
        ];
    }
    */
}
