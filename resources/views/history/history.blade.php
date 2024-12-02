@include('include.header')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom gutter-b ">
                @if (session('success'))
                    <div class="alert m-2 text-light" style="background-color: #fcaf17">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger m-2">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">
                        </h3>
                    </div>
                </div>
                <div class="card-body p-5" style="overflow:auto">
                    <table class="user_table table table-bordered table-bordered">
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModal">Delete Administration User</h5>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
                <p>Do You Want To Delete This Administration User</p>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn text-light" style="background-color: #fcaf17;" id="delete-user">Yes</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<!--end::Delete Model-->






@include('include.footer')
<script>
    $(document).ready(function () {
        $('.attendance_history_tab').addClass("active")
    });

    $(document).ready(function () {

        var table = $('.user_table').DataTable({
            processing: true,
            serverSide: false,
            order: [],
            ajax: {
                url: "{{ url('employees') }}",
            },
            columns: [{
                data: 'avatar',
                title: 'Avatar',
                render: function (data, type, row) {
                    if (data) {
                        return `<div class="text-center"><img width="50" height="50" style="border-radius:50%" src="${data}" /></div>`;
                    } else {
                        return '-';
                    }
                }
            },
            {
                data: 'full_name',
                title: 'Name ',
                render: function (data, type, row) {
                    return data;
                }
            },
            {
                data: 'phone',
                title: 'Phone '
            },
            {
                data: 'email',
                title: 'Email '
            },
            {
                data: 'designation',
                title: 'Designation '
            },
            {
                data: 'address',
                title: 'Address '
            },
            {
                data: 'joining_date',
                title: 'Joining Date'
            },
            {
                data: 'slug',
                title: 'Attendance',
                render: function (data, type, row) {
                    let url = `/employee/attendance/history/${data}`;
                    let html = `<a href="${url}"> <i class="fa fa-calendar-check" title="View Attendance History" style="font-size:25px; cursor: pointer;"></i></a>`;
                    return html;
                }
            },
            {
                data: 'slug',
                title: 'Fine',
                render: function (data, type, row) {
                    let url = `/employee/attendance/fine/${data}`;
                    let html = `<a href="${url}"> 
                    <i class="fa fa-exclamation-triangle" title="View Fine Details" style="font-size:25px; color: red; cursor: pointer;"></i>
                    </a>`;
                    return html;
                }
            }
            ]
        });


    });


    $(document).ready(function () {
        $(document).on('click', '.delete', function () {
            let user_id = $(this).attr('user-id');
            console.log(user_id);
            $('#delete-user').attr('href', "{{ url('delete/emp') }}" + "/" + user_id);
        });
    })
</script>