<x-admin-layout>

    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Issued Book Details</h4>
            </div>

        </div>
        <div class="row">
            <div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1" >
            <div class="panel panel-info">
                <div class="panel-heading">
                    Issued Book Details
                </div>
                <div class="panel-body">
                    <x-auth-session-status class="mb-4" :status="session('message')" />
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form role="form" action="{{route('admin-issueBooks-update-action')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Student Name :</label>
                            {{ htmlentities(get_data_by_id('name','users','studentId', $result->studentID))}}
                        </div>
                        <div class="form-group">
                            <label>Book Name :</label>
                            {{ htmlentities(get_data_by_id('bookName','books','isbnNumber', $result->bookId))}}
                        </div>
                        <div class="form-group">
                            <label>ISBN :</label>
                            {{ htmlentities($result->bookId)}}
                        </div>
                        <div class="form-group">
                            <label>Book Issued Date :</label>
                            {{ htmlentities($result->issuesDate)}}
                        </div>

                        <div class="form-group">
                            <label>Book Returned Date :</label>
                            @if (empty($result->returnDate))
                                {{htmlentities("Not Return Yet")}}
                            @else
                                {{htmlentities($result->returnDate)}}
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Fine (in USD) :</label>
                            @if (empty($result->returnDate))
                                <input class="form-control" type="text" name="fine" id="fine" required/>
                            @else
                                {{htmlentities($result->fine)}}
                            @endif
                        </div>
                        @if (empty($result->returnDate))
                            <input type="hidden" name="id" value="{{$result->id}}" required/>
                            <button type="submit" name="return" id="submit" class="btn btn-info">Return Book</button>
                        @endif
                </form>
            </div>
        </div>
    </div>

    </div>


    </div>
    <!-- CONTENT-WRAPPER SECTION END-->


</x-admin-layout>
