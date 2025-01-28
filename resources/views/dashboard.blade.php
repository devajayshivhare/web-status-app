   @extends('layout.master')

   @section('content')
   
   @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
   <div class="d-flex justify-content-between align-items-center mt-3">
    <a href="{{ route('site_monitoring.create') }}" class="btn btn-primary new-site-btn">Add New Site</a>
    </div>
   <div id="custom-buttons" class=""></div>
   <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
    <thead>
        <tr>
            <th class="text-start">ID</th>
            <th>URL</th>
            <th class="text-start">FREQENCY(Minute)</th>
            <th>Status</th>
            <th>Timestamp</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sites as $site)
        <tr>
            <td class="text-start">{{$site->id}}</td>
            <td>{{$site->site_url}}</td>
            <td class="text-start">{{$site->task_frequency}}</td>
          @if (count($site->logs) == 0)
          <td>NA</td>
          @else
          <td  style="color: {{ $site->logs[0]->status == 'up' ? 'green' : 'red' }}">{{$site->logs[0]->status}}</td>
          @endif
          @if (count($site->logs) == 0)
          <td>NA</td>
          @else
          <td>{{$site->logs[0]->checked_at}}</td>
          @endif
        </tr>
        @endforeach
       
    </tbody>
    <tfoot>
        <tr>
            <th class="text-start">ID</th>
            <th>URL</th>
            <th class="text-start">FREQENCY(Minute)</th>
            <th>Status</th>
            <th>Timestamp</th>
        </tr>
    </tfoot>
</table>
   @endsection