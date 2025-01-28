    @extends('layout.master')
    @section('content')
        
<div class="container" style="max-width: 50%">
    <h2 class="text-center mt-2">Add a Site for Monitoring</h2>
    <form action="{{ route('site_monitoring.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="site_url">Site URL</label>
            <input type="url" name="site_url" id="site_url" class="form-control" required placeholder="https://example.com">
        </div>
        <div class="form-group">
            <label for="task_frequency">Frequency (minutes)</label>
            <input type="number" name="task_frequency" id="task_frequency" class="form-control" required placeholder="5">
        </div>
        <button type="submit" class="btn btn-success mt-3">Add Site</button>
    </form>
</div>
@endsection

