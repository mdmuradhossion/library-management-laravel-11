<x-admin-layout>

    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Manage Authors</h4>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Authors Listing
                    </div>
                    <div class="panel-body">
                        <x-auth-session-status class="mb-4" :status="session('message')" />
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Author</th>
                                    <th>Creation Date</th>
                                    <th>Updation Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach($results as $row)
                                    <tr class="odd gradeX">
                                        <td class="center">{{ htmlentities($i++) }}</td>
                                        <td class="center">{{ htmlentities($row->authorName)}}</td>
                                        <td class="center">{{ htmlentities($row->created_at)}}</td>
                                        <td class="center">{{ htmlentities($row->updated_at)}}</td>
                                        <td class="center">
                                            <a href="{{route('admin-author-edit',$row->id)}}" class="btn btn-sm btn-primary"> <i class="fa fa-edit "></i> Edit </a>
                                            <a href="{{route('admin-author-delete',$row->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?');"> <i class="fa fa-pencil"></i> Delete </a>
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
