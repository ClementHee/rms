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
use PowerComponents\LivewirePowerGrid\Detail;
use PowerComponents\LivewirePowerGrid\Traits\WithCheckbox;

final class SummaryDetails extends PowerGridComponent
{
    
    use ActionButton;
    use WithExport;
    public bool $multiSort = true; 
    public string $primaryKey = 'student_id'; 
    public string $sortField = 'student_id';

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox('student_id');
    
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
     * @return Builder<\App\Models\Student>
     */
    public function datasource(): Builder
    {
        return Student::query()
        ->join('parents as pf', function ($parents) { 
            $parents->on('students.father', '=', 'pf.parent_id');
        })->join('parents as pm', function ($parents) { 
            $parents->on('students.mother', '=', 'pm.parent_id');
        })->select([
            'students.*',
            'pf.name as father_name',
            'pm.name as mother_name'
        ]);
               
                
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
    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('student_id')
            
            ->addColumn('first_name')
            ->addColumn('last_name')
            ->addColumn('fullname')
            ->addColumn('gender')
            ->addColumn('dob_formatted', fn (Student $model) => Carbon::parse($model->dob)->format('d/m/Y'))
            ->addColumn('birth_cert_no')
            ->addColumn('mykid')
            ->addColumn('pos_in_family')
            ->addColumn('race')
            ->addColumn('nationality')
            ->addColumn('prev_kindy')
            ->addColumn('no_years')
            ->addColumn('religion')
            ->addColumn('home_add')
            ->addColumn('poscode')
            ->addColumn('state')
            ->addColumn('country')
            ->addColumn('district')
            ->addColumn('home_lang')
            ->addColumn('home_tel')
            ->addColumn('father_name')
            ->addColumn('mother_name')
            ->addColumn('e_contact')
            ->addColumn('e_contact_hp')
            ->addColumn('e_contact2')
            ->addColumn('e_contact2_hp')
            ->addColumn('fam_doc')
            ->addColumn('fam_doc_hp')
            ->addColumn('allergies')
            ->addColumn('others')
            ->addColumn('potential')
            ->addColumn('j1_class')
            ->addColumn('j2_class')
            ->addColumn('j3_class')
            ->addColumn('aft_j1_class')
            ->addColumn('aft_j2_class')
            ->addColumn('aft_j3_class')
            ->addColumn('time_to_sch')
            ->addColumn('carplate')
            ->addColumn('status')
            ->addColumn('chinese_name')
            ->addColumn('signature')
            ->addColumn('enrolment_date_formatted', fn (Student $model) => Carbon::parse($model->enrolment_date)->format('d/m/Y'))
            ->addColumn('referral')

           /** Example of custom column using a closure **/
            ->addColumn('referral_lower', fn (Student $model) => strtolower(e($model->referral)))

            ->addColumn('reasons')
            ->addColumn('pref_pri_sch')
            ->addColumn('entry_year')
            ->addColumn('type');
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
            
    
            Column::make('Student id', 'student_id'),
            

            Column::make('First name', 'first_name')
                ->sortable()
                ->searchable(),

            Column::make('Last name', 'last_name')
                ->sortable()
                ->searchable(),

            Column::make('Fullname', 'fullname')
                ->sortable()
                ->searchable(),

            Column::make('Gender', 'gender')
                ->sortable()
                ->searchable(),

            Column::make('Dob', 'dob_formatted', 'dob')
                ->sortable(),

            Column::make('Birth cert no', 'birth_cert_no')
                ->sortable()
                ->searchable(),

            Column::make('Mykid', 'mykid')
                ->sortable()
                ->searchable(),

            Column::make('Pos in family', 'pos_in_family')
                ->sortable()
                ->searchable(),

            Column::make('Race', 'race')
                ->sortable()
                ->searchable(),

            Column::make('Nationality', 'nationality')
                ->sortable()
                ->searchable(),

            Column::make('Prev kindy', 'prev_kindy')
                ->sortable()
                ->searchable(),

            Column::make('No years', 'no_years')
                ->sortable()
                ->searchable(),

            Column::make('Religion', 'religion')
                ->sortable()
                ->searchable(),

            Column::make('Home add', 'home_add')
                ->sortable()
                ->searchable(),

            Column::make('Poscode', 'poscode')
                ->sortable()
                ->searchable(),

            Column::make('State', 'state')
                ->sortable()
                ->searchable(),

            Column::make('Country', 'country')
                ->sortable()
                ->searchable(),

            Column::make('District', 'district')
                ->sortable()
                ->searchable(),

            Column::make('Home lang', 'home_lang')
                ->sortable()
                ->searchable(),

            Column::make('Home tel', 'home_tel')
                ->sortable()
                ->searchable(),

            Column::make('Father','father_name'),
            Column::make('Mother','mother_name'),
           
            Column::make('E contact', 'e_contact')
                ->sortable()
                ->searchable(),

            Column::make('E contact hp', 'e_contact_hp')
                ->sortable()
                ->searchable(),

            Column::make('E contact2', 'e_contact2')
                ->sortable()
                ->searchable(),

            Column::make('E contact2 hp', 'e_contact2_hp')
                ->sortable()
                ->searchable(),

            Column::make('Fam doc', 'fam_doc')
                ->sortable()
                ->searchable(),

            Column::make('Fam doc hp', 'fam_doc_hp')
                ->sortable()
                ->searchable(),

            Column::make('Allergies', 'allergies')
                ->sortable()
                ->searchable(),

            Column::make('Others', 'others')
                ->sortable()
                ->searchable(),

            Column::make('Potential', 'potential')
                ->sortable()
                ->searchable(),

            Column::make('J1 class', 'j1_class')
                ->sortable()
                ->searchable(),

            Column::make('J2 class', 'j2_class')
                ->sortable()
                ->searchable(),

            Column::make('J3 class', 'j3_class')
                ->sortable()
                ->searchable(),

            Column::make('Aft j1 class', 'aft_j1_class')
                ->sortable()
                ->searchable(),

            Column::make('Aft j2 class', 'aft_j2_class')
                ->sortable()
                ->searchable(),

            Column::make('Aft j3 class', 'aft_j3_class')
                ->sortable()
                ->searchable(),

            Column::make('Time to sch', 'time_to_sch')
                ->sortable()
                ->searchable(),

            Column::make('Carplate', 'carplate')
                ->sortable()
                ->searchable(),

            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),

            Column::make('Chinese name', 'chinese_name')
                ->sortable()
                ->searchable(),

            Column::make('Signature', 'signature')
                ->sortable()
                ->searchable(),

                Column::make('Enrolment date', 'enrolment_date_formatted', 'enrolment_date')
                ->sortable(),

            Column::make('Referral', 'referral')
                ->sortable()
                ->searchable(),

            Column::make('Reasons', 'reasons')
                ->sortable()
                ->searchable(),

            Column::make('Pref pri sch', 'pref_pri_sch')
                ->sortable()
                ->searchable(),

            Column::make('Entry year', 'entry_year'),
            Column::make('Type', 'type')
                ->sortable()
                ->searchable(),

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
            Filter::datepicker('enrolment_date'),
            Filter::inputText('referral')->operators(['contains']),
            Filter::inputText('reasons')->operators(['contains']),
            Filter::inputText('pref_pri_sch')->operators(['contains']),
            Filter::inputText('type')->operators(['contains']),
            Filter::inputText('first_name')->operators(['contains']),
            Filter::inputText('last_name')->operators(['contains']),
            Filter::inputText('fullname')->operators(['contains']),
            Filter::inputText('gender')->operators(['contains']),
            Filter::datepicker('dob'),
            Filter::inputText('birth_cert_no')->operators(['contains']),
            Filter::inputText('mykid')->operators(['contains']),
            Filter::inputText('pos_in_family')->operators(['contains']),
            Filter::inputText('race')->operators(['contains']),
            Filter::inputText('nationality')->operators(['contains']),
            Filter::inputText('prev_kindy')->operators(['contains']),
            Filter::inputText('no_years')->operators(['contains']),
            Filter::inputText('religion')->operators(['contains']),
            Filter::inputText('poscode')->operators(['contains']),
            Filter::inputText('state')->operators(['contains']),
            Filter::inputText('country')->operators(['contains']),
            Filter::inputText('district')->operators(['contains']),
            Filter::inputText('home_lang')->operators(['contains']),
            Filter::inputText('home_tel')->operators(['contains']),
            Filter::inputText('e_contact')->operators(['contains']),
            Filter::inputText('e_contact_hp')->operators(['contains']),
            Filter::inputText('e_contact2')->operators(['contains']),
            Filter::inputText('e_contact2_hp')->operators(['contains']),
            Filter::inputText('fam_doc')->operators(['contains']),
            Filter::inputText('fam_doc_hp')->operators(['contains']),
            Filter::inputText('allergies')->operators(['contains']),
            Filter::inputText('others')->operators(['contains']),
            Filter::inputText('potential')->operators(['contains']),
            Filter::inputText('j1_class')->operators(['contains']),
            Filter::inputText('j2_class')->operators(['contains']),
            Filter::inputText('j3_class')->operators(['contains']),
            Filter::inputText('aft_j1_class')->operators(['contains']),
            Filter::inputText('aft_j2_class')->operators(['contains']),
            Filter::inputText('aft_j3_class')->operators(['contains']),
            Filter::inputText('time_to_sch')->operators(['contains']),
            Filter::inputText('carplate')->operators(['contains']),
            Filter::inputText('status')->operators(['contains']),
            Filter::inputText('chinese_name')->operators(['contains']),
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
     * PowerGrid Student Action Buttons.
     *
     * @return array<int, Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('student.edit', function(\App\Models\Student $model) {
                    return $model->id;
               }),

           Button::make('destroy', 'Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('student.destroy', function(\App\Models\Student $model) {
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
     * PowerGrid Student Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($student) => $student->id === 1)
                ->hide(),
        ];
    }
    */
}
