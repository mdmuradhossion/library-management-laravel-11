<x-admin-layout>

    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add Book</h4>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Book Info
                    </div>
                    <div class="panel-body">
                        <x-auth-session-status class="mb-4" :status="session('message')" />
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form role="form" action="{{route('admin-books-action')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Book Name<span style="color:red;">*</span></label>
                                <input class="form-control" type="text" name="bookname" autocomplete="off"  required />
                            </div>

                            <div class="form-group">
                                <label> Category<span style="color:red;">*</span></label>
                                <select class="form-control" name="category" required="required">
                                    <option value=""> Select Category</option>
                                    @php echo getListInOption('', 'id', 'categoryName', 'categories') @endphp

                                </select>
                            </div>


                            <div class="form-group">
                                <label> Author<span style="color:red;">*</span></label>
                                <select class="form-control" name="author" required="required">
                                    <option value=""> Select Author</option>
                                    @php echo getListInOption('', 'id', 'authorName', 'authors') @endphp

                                </select>
                            </div>

                            <div class="form-group">
                                <label>ISBN Number<span style="color:red;">*</span></label>
                                <input class="form-control" type="text" name="isbn"  required="required" autocomplete="off"  />
                                <p class="help-block">An ISBN is an International Standard Book Number.ISBN Must be unique</p>
                            </div>

                            <div class="form-group">
                                <label>Price<span style="color:red;">*</span></label>
                                <input class="form-control" type="text" name="price" autocomplete="off"   required="required" />
                            </div>

                            <button type="submit" name="create" class="btn btn-info">Create </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- CONTENT-WRAPPER SECTION END-->


</x-admin-layout>
