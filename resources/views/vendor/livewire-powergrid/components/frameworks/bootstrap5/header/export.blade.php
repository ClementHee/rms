<div class="dropdown">
    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <svg width="20" height="20"
             fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
        </svg>
    </button>
    <ul class="dropdown-menu">
        @if(in_array('xlsx', data_get($setUp, 'exportable.type')))
            <li class="d-flex">
                <div class="dropdown-item">
                    <span style="min-width: 25px;">@lang('XLSX')</span>
                    <a class="text-black-50" wire:click="exportToXLS()" href="#">
                        @lang('livewire-powergrid::datatable.labels.all')
                    </a>
                    @if($checkbox)
                        /
                        <a class="text-black-50" wire:click="exportToXLS(true)" href="#">
                            @lang('livewire-powergrid::datatable.labels.selected')
                        </a>
                    @endif
                </div>
            </li>
        @endif
        @if(in_array('csv', data_get($setUp, 'exportable.type')))
            <li class="d-flex">
                <div class="dropdown-item">
                    <span>@lang('Csv')</span>
                    <a class="text-black-50" wire:click="exportToCsv" href="#">
                        @lang('livewire-powergrid::datatable.labels.all')
                    </a>
                    @if($checkbox)
                        /
                        <a class="text-black-50" wire:click="exportToCsv(true)" href="#">
                            @lang('livewire-powergrid::datatable.labels.selected')
                        </a>
                    @endif
                </div>
            </li>
        @endif
    </ul>
</div>
