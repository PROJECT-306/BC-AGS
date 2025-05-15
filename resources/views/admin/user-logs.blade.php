@extends('layouts.app')

@section('content')
<div class="container py-4">
    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 text-dark fw-bold mb-0">📊 User Logs</h1>
        <div class="d-flex align-items-center">
            <form id="dateFilterForm" action="{{ route('admin.userLogs') }}" method="GET" class="d-flex align-items-center">
                <label for="date" class="me-2">Select Date:</label>
                <input type="date" name="date" id="date" value="{{ old('date', $selectedDate ?? $dateToday) }}" 
                       class="form-control" style="width: 200px;" />
            </form>
        </div>
    </div>

    {{-- No logs warning --}}
    @if ($userLogs->isEmpty())
        <div class="alert alert-warning text-center fw-semibold">
            No logs found for the selected date.
        </div>
    @endif

    {{-- Logs Table --}}
    <div class="card shadow-sm">
        <div class="card-body p-3">
            <table id="userLogsTable" class="table table-bordered mb-0">
                <thead class="table-success">
                    <tr>
                        <th>User</th>
                        <th>Event Type</th>
                        <th>Browser</th>
                        <th>Device</th>
                        <th>Platform</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($userLogs as $log)
                        <tr>
                            <td>
                                @if ($log->user)
                                    {{ $log->user->first_name }} {{ $log->user->last_name }}
                                @else
                                    <em class="text-muted">Unknown</em>
                                @endif
                            </td>
                            <td>{{ ucfirst($log->event_type) }}</td>
                            <td>{{ $log->browser ?? 'N/A' }}</td>
                            <td>{{ $log->device ?? 'N/A' }}</td>
                            <td>{{ $log->platform ?? 'N/A' }}</td>
                            <td>{{ $log->created_at ? $log->created_at->format('F j, Y') : 'N/A' }}</td>
                            <td>{{ $log->created_at ? $log->created_at->format('g:i A') : 'N/A' }}</td>
                        </tr>
                    @empty
                        {{-- Hidden row to avoid DataTables warning --}}
                        <tr>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function () {
        $('#userLogsTable').DataTable({
            ordering: false,
            paging: true,
            info: true,
            language: {
                lengthMenu: 'Show Entries <select class="form-select form-select-sm d-inline-block w-auto me-2" style="min-width: 70px; max-width: 90px; border-radius: 0.375rem; padding: 0.25rem 0.5rem;">' +
                    '<option value="5">5</option>' +
                    '<option value="10" selected>10</option>' +
                    '<option value="25">25</option>' +
                    '<option value="50">50</option>' +
                    '<option value="100">100</option>' +
                    '</select>'
            }
        });

        // Submit form when date changes
        $('#date').on('change', function () {
            $('#dateFilterForm').submit();
        });
    });
</script>

<style>
    .dataTables_length {
        display: flex !important;
        align-items: center;
        gap: 0.5rem;
    }

    .dataTables_length label {
        margin: 0;
        font-weight: 500;
    }

    /* Style the select dropdown to blend nicely with Bootstrap */
    .dataTables_length select.form-select {
        box-shadow: none;
        border: 1px solid #ced4da;
        transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }

    .dataTables_length select.form-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        outline: none;
    }

    .dataTables_filter {
        margin-bottom: 0.5rem;
    }
</style>
@endpush
@endsection









