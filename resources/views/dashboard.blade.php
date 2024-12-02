@include('include.header')

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->
            <div class="row">
                <!-- Employee Attendance Overview -->
                <div class="col-md-6 col-xl-3">
                    <div class="card card-custom bg-info text-white">
                        <div class="card-body">
                            <h4 class="card-title">Total Attendance</h4>
                            <p class="card-text">This week: {{ $totalHoursThisWeek }} hours</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <i class="fas fa-calendar-check fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Absentee Employees -->
                <div class="col-md-6 col-xl-3">
                    <div class="card card-custom bg-warning text-white">
                        <div class="card-body">
                            <h4 class="card-title">Absentees</h4>
                            <p class="card-text">Employees who didn't clock in today</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <i class="fas fa-user-times fa-3x"></i>
                                <span class="h2 font-weight-bolder">{{ $absenteesCount }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Attendance Chart -->
                <div class="col-md-12 col-xl-6">
                    <div class="card card-custom">
                        <div class="card-header">
                            <h4 class="card-title">Attendance Trends</h4>
                        </div>
                        <div class="card-body">
                            <div id="attendance-chart" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Attendance Logs -->
            <div class="card card-custom mt-5">
                <div class="card-header">
                    <h4 class="card-title">Recent Attendance Logs</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Employee</th>
                                <th>Clock In</th>
                                <th>Clock Out</th>
                                <th>Hours Worked</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentLogs as $log)
                                <tr>
                                    <td>{{ $log->employee->full_name ?? '-' }}</td>
                                    <td>{{ $log->inn_time ?? '-' }}</td>
                                    <td>{{ $log->out_time ?? '-' }}</td>
                                    <td>{{ $log->hours ?? '-' }} Hours</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->

@include('include.footer')

<script>
    $(document).ready(function() {
        $('.dashboard_tab').addClass("active");

        var options = {
            series: [{
                name: 'Attendance Rate',
                data: {!! json_encode($attendanceRate) !!}
            }],
            chart: {
                height: 300,
                type: 'line'
            },
            xaxis: {
                categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
            },
            colors: ['#0D6EFD']
        };
        var chart = new ApexCharts(document.querySelector("#attendance-chart"), options);
        chart.render();
    });
</script>
