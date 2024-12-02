@include('include.header')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="card-body p-5" style="overflow:auto">
                    <h4>Attendance History for {{ $employee->full_name }} ({{ now()->format('F Y') }})</h4>

                    <div class="row">
                        <div class="col-md-7"></div>
                        <a href="{{ url('attendance/history') }}" class="btn text-light mb-3 ms-3 col-md-2"
                            style="background-color:#fcaf17;">Back</a>
                            <div class="col-md-1"></div>
                        <a href="javascript:void(0);" id="exportBtn" class="btn text-light mb-3 ms-3 col-md-2"
                            style="background-color:#fcaf17;">Export to Excel</a>
                    </div>

                    <table class="user_table table table-bordered">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>Status</th>
                                <th>In Time</th>
                                <th>Out Time</th>
                                <th>Hours Worked</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fullMonthAttendance as $attendance)
                                <tr>
                                    <td>{{ $attendance['day'] }}</td>
                                    <td>
                                        @if($attendance['attendance'])
                                            <span
                                                class="badge {{ $attendance['badgeClass'] }}">{{ $attendance['attendance'] }}</span>
                                        @else
                                            <span>Pending</span>
                                        @endif
                                    </td>
                                    <td>{{ $attendance['inn_time'] ? $attendance['inn_time'] : '00:00:00' }}</td>
                                    <td>{{ $attendance['out_time'] ? $attendance['out_time'] : '00:00:00' }}</td>
                                    <td>{{ $attendance['hours'] ? $attendance['hours'] : '00:00' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('include.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
<script>
    $(document).ready(function () {
        $('.attendance_history_tab').addClass("active")
    });

    document.getElementById('exportBtn').addEventListener('click', function () {
        var table = document.querySelector('.user_table');

        var wb = XLSX.utils.table_to_book(table, { sheet: "Attendance History" });

        XLSX.writeFile(wb, "attendance_history.xlsx");
    });
</script>