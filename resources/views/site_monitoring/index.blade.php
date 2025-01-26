<x-layout>
    <div class="d-flex justify-content-between align-items-center mt-3">
        <a href="{{ route('site_monitoring.create') }}" class="btn btn-primary">Add New Site</a>
        <div id="custom-buttons" class=""></div>
    </div>
    <div class="d-flex justify-content-between mt-3 mb-3 bg-body-tertiary">
            <p>Site URL</p><a target="_blank" href="{{$sites[0]->site_url}}">{{$sites[0]->site_url}}</a>
            <p>Frequency (minutes)</p>: {{$sites[0]->task_frequency}}
    </div>
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>TimeStamp</th>
            <th>Status Log</th>
            {{-- <th><a 
                {{-- href="{{ route('site_monitoring.exportLogs', $site->id) }}"  --}}
                {{-- class="btn btn-success btn-sm">Export Logs</a></th> --}}
        </tr> 
    </thead>
    <tbody>
        {{-- @dd($sites) --}}
        @foreach ($sites as $site)
                <tr>
                    {{-- <td>{{ $site->site_url }}</td> --}}
                    {{-- <td>{{ $site->task_frequency }}</td> --}}
                    <td>
                        <ul>
                            @foreach ($site->logs as $log)
                            <li>{{ $log->checked_at }}</li>
                            @endforeach
                        </ul>
                    </td>
                        <td>
                            <ul>
                                @foreach ($site->logs as $log)
                                <li>{{ $log->status }}</li>
                                @endforeach
                            </ul>
                        </td>
                    {{-- <td>
                        
                    </td> --}}
                </tr>
                @endforeach
       
        
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