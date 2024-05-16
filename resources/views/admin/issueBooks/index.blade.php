<x-admin-layout>

    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Manage Issued Books</h4>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Issued Books
                    </div>
                    <div class="panel-body">
                        <x-auth-session-status class="mb-4" :status="session('message')" />
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student Name</th>
                                    <th>Book Name</th>
                                    <th>ISBN </th>
                                    <th>Issued Date</th>
                                    <th>Return Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach($results as $row)
                                    <tr class="odd gradeX">
                                        <td class="center">{{ htmlentities($i++) }}</td>
                                        <td class="center">{{ htmlentities(get_data_by_id('name','users','studentId', $row->studentID))}}</td>
                                        <td class="center">{{ htmlentities(get_data_by_id('bookName','books','isbnNumber', $row->bookId))}}</td>
                                        <td class="center">{{ htmlentities($row->bookId)}}</td>
                                        <td class="center">{{ htmlentities($row->issuesDate)}}</td>
                                        <td class="center">
                                            @if($row->returnDate=="")
                                                {{htmlentities("Not Return Yet")}}
                                            @else
                                                {{htmlentities($row->returnDate)}}
                                            @endif
                                        </td>
                                        <td class="center">
                                            <a href="{{route('admin-issueBooks-edit',$row->id)}}" class="btn btn-sm btn-primary"> <i class="fa fa-edit "></i> Edit </a>
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
