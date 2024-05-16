<x-user-layout>
    <div class="content-wrapper">
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
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Book Name</th>
                                            <th>ISBN </th>
                                            <th>Issued Date</th>
                                            <th>Return Date</th>
                                            <th>Fine in(TK)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=1; @endphp
                                    @foreach($books as $val)
                                        <tr class="odd gradeX">
                                            <td class="center">{{ htmlentities($i++)}}</td>
                                            <td class="center">{{ htmlentities(get_data_by_id('bookName', 'books', 'id', $val->bookId))}}</td>
                                            <td class="center">{{ htmlentities(get_data_by_id('bookName', 'books', 'id', $val->isbnNumber))}}</td>
                                            <td class="center">{{ htmlentities($val->issuesDate	)}}</td>
                                            <td class="center">
                                                @if(empty($val->returnDate))
                                                <span style="color:red"> {{htmlentities("Not Return Yet")}} </span>
                                                @else
                                                    {{htmlentities($val->returnDate)}}
                                                @endif
                                            </td>
                                            <td class="center">{{ htmlentities($val->fine)}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-user-layout>
