@extends('Backend.Layout.App')
@section('title','ভাতার পরিবর্তন করুন') 
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">

                    <h4>ভাতার পরিবর্তন করুন</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">

            <form action="{{route('admin.vatar.update')}}" method="post">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-sm-3" style="display: none;">
                                <div class="form-group"> 
                                    <label class="control-label">Id</label>
                                    <input  name="id" class="form-control" value="{{$vatar->id}}" required>
                                </div><!-- form-group -->
                            </div><!-- col-sm-2 -->


                            <div class="col-sm-3">
                                <div class="form-group"> 
                                    <label class="control-label">ভাতার নাম</label>
                                    <input  name="name" id="name" class="form-control" placeholder="এইখানে ভাতার নাম লিখুন" value="{{$vatar->name}}" required>
                                </div><!-- form-group -->
                            </div><!-- col-sm-2 -->
                           
                        </div>
                    </div><!-- panel-body -->
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> পরিবর্তন করুন 
                        </button>
                    </div><!-- panel-footer -->
                </div><!-- panel -->
            </form>
        </div><!-- panel -->

       
    </div><!-- mainwrapper -->
@endsection




@section('script')

    <script>
        $(document).ready(function () {
            $('#basicTable').dataTable();
            $("#name").select2();
            
        });










    </script>

    @if(session('success'))
        <script>
            toastr.success('{{ session('success') }}');
        </script>
    @elseif(session('error'))
        <script>
            toastr.error('{{ session('error') }}');
        </script>
    @endif

    @if(session('errors'))
        <script>
            var errors = @json(session('errors'));
            errors.forEach(function(error) {
                toastr.error(error);
            });
        </script>
    @endif


@endsection

