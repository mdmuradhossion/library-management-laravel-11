<x-admin-layout>

    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Issue a New Book</h4>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Issue a New Book
                    </div>
                    <div class="panel-body">
                        <x-auth-session-status class="mb-4" :status="session('message')" />
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form role="form" action="{{route('admin-issueBooks-action')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Srtudent id<span style="color:red;">*</span></label>
                                <input class="form-control" type="text" name="studentid" id="studentid" onBlur="getstudent()" autocomplete="off"  required />
                            </div>
                            <div class="form-group">
                                <span id="get_student_name" style="font-size:16px;"></span>
                            </div>

                            <div class="form-group">
                                <label>ISBN Number or Book Title<span style="color:red;">*</span></label>
                                <input class="form-control" type="text" name="bookid" id="bookid" onBlur="getbook()"  required="required" />
                            </div>

                            <div class="form-group">
                                <select  class="form-control" name="bookdetails" id="get_book_name" readonly></select>
                            </div>

                            <button type="submit" name="create" class="btn btn-info">Issue Book </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <script>
        function getstudent() {
            $("#loaderIcon").show();
            var id = $("#studentid").val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('admin-issueBooks-get_student')}}",
                data:{studentid:id},
                type: "POST",
                success:function(data){
                    $("#get_student_name").html(data);
                    $("#loaderIcon").hide();
                },
                error:function (){}
            });
        }

        //function for book details
        function getbook() {
            $("#loaderIcon").show();
            var id = $("#bookid").val();
            jQuery.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('admin-issueBooks-get_book')}}",
                data:{bookid:id},
                type: "POST",
                success:function(data){
                    $("#get_book_name").html(data);
                    $("#loaderIcon").hide();
                },
                error:function (){}
            });
        }
    </script>

</x-admin-layout>
