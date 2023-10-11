@extends('Backend.Layout.App')
@section('title','উপজেলার পরিবর্তন  পেজ ')
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">

                    <h4>উপজেলার পরিবর্তন  করুন</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">

            <form action="{{route('admin.upzila.update')}}" method="post">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="row">

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">উপজেলার নাম</label>
                                        <input type="hidden" name="id"   value="{{$data->id}}" required/>
                                        <input type="text" name="name"  class="form-control" placeholder="উপজেলার নাম লিখুন" value="{{$data->name}}" required/>
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                        </div>
                    </div><!-- panel-body -->
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> পরিবর্তন
                        </button>
                    </div><!-- panel-footer -->
                </div><!-- panel -->
            </form>
        </div><!-- panel -->


    </div><!-- mainwrapper -->
@endsection

@section('script')
    @if(session('success'))
    <script>
        toastr.success('{{ session('success') }}');
    </script>
    @elseif(session('error'))
    <script>
        toastr.error('{{ session('error') }}');
    </script>
    @endif



@endsection

