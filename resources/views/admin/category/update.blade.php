<x-admin-layout>

    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Edit category</h4>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Category Info
                    </div>
                    <div class="panel-body">
                        <x-auth-session-status class="mb-4" :status="session('message')" />
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form role="form" action="{{route('admin-category-update-action')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Category Name</label>
                                <input class="form-control" type="text" name="category" value="{{$results->categoryName}}" autocomplete="off" required />
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" id="status" value="1" @php echo ($results->status == 1)?'checked':''; @endphp >Active
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" id="status" value="0" @php echo ($results->status == 0)?'checked':''; @endphp>Inactive
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{$results->id}}" required />
                            <button type="submit" name="create" class="btn btn-info">Update </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- CONTENT-WRAPPER SECTION END-->


</x-admin-layout>
