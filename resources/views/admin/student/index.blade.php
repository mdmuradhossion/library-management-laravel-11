<x-admin-layout>

    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Manage Reg Students</h4>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Reg Students
                    </div>
                    <div class="panel-body">
                        <x-auth-session-status class="mb-4" :status="session('message')" />
                        <br>
                        <div class="table-responsive ">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Email id </th>
                                    <th>Mobile Number</th>
                                    <th>Reg Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach($results as $row)
                                    <tr class="odd gradeX">
                                        <td class="center">{{ htmlentities($i++) }}</td>
                                        <td class="center">{{ htmlentities($row->studentId)}}</td>
                                        <td class="center">{{ htmlentities($row->name)}}</td>
                                        <td class="center">{{ htmlentities($row->email)}}</td>
                                        <td class="center">{{ htmlentities($row->phone)}}</td>
                                        <td class="center">{{ htmlentities($row->created_at)}}</td>
                                        <td class="center">
                                            @if($row->status ==1)
                                                {{htmlentities("Active")}}
                                            @else
                                                {{htmlentities("Blocked")}}
                                            @endif
                                        </td>
                                        <td class="center">
                                            @if($row->status==1)
                                                <a href="{{route('admin-student-status',[$row->id,0])}}" onclick="return confirm('Are you sure you want to block this student?');" >  <button class="btn btn-danger"> Inactive</button>
                                            @else
                                                <a href="{{route('admin-student-status',[$row->id,1])}}" onclick="return confirm('Are you sure you want to active this student?');"><button class="btn btn-primary"> Active</button>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>


    </div>
    <!-- CONTENT-WRAPPER SECTION END-->


</x-admin-layout>
