<x-layout>
    @if (Auth()->user()->can('view dashboard'))
    <a href="{{ route('users.index') }}" class="btn btn-info">Go to CMS PORTAL</a>
    @endif

    <div class="d-flex justify-content-between align-items-center mt-3">
        <a href="{{ route('site_monitoring.create') }}" class="btn btn-primary">Add New Site</a>
        {{-- @if (Auth()->user()->can('view logs')) --}}
        <div id="custom-buttons" class=""></div>
        {{-- @endif --}}
    </div>
    <div class="d-flex justify-content-between mt-3 mb-3 bg-body-tertiary">
        {{-- @dd($sites) --}}
            {{-- <p>Site URL</p><a target="_blank" href="{{$sites[0]->site_url}}">{{$sites[0]->site_url}}</a>
            <p>Frequency (minutes)</p>: {{$sites[0]->task_frequency}} --}}
            <p>Site URL</p><a target="_blank" href="{{$sites->site_url}}">{{$sites->site_url}}</a>
            <p>Frequency (minutes)</p>: {{$sites->task_frequency}}
    </div>
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>TimeStamp</th>
            <th>Status Log</th>
        </tr> 
    </thead>
    <tbody>
        {{-- @foreach ($sites->log as $site) --}}
        {{-- @dd($site) --}}
                {{-- <tr>
                    
                    <td>
                        <ul>
                            @foreach ($sites->logs as $log)
                            <li>{{ $log->checked_at }}</li>
                            @endforeach
                        </ul>
                    </td>
                        <td>
                            <ul>
                                @foreach ($sites->logs as $log)
                                <li>{{ $log->status }}</li>
                                @endforeach
                            </ul>
                        </td>
                </tr> --}}
                {{-- @endforeach --}}
       
        
    </tbody>
    <tfoot>
        <tr>
            <th>Id</th>
            <th>TimeStamp</th>
            <th>Status Log</th>
        </tr>
    </tfoot>
</table>

<x-bot></x-bot>
</x-layout>