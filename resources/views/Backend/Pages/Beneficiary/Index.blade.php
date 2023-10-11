@extends('Backend.Layout.App')
@section('title','সকল উপকারভোগীর  তালিকা')
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                     <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">
                    <h4>সকল উপকারভোগীর  তালিকা</h4>

                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">
                <div class="panel panel-default">

                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> নতুন উপকারভোগী তৈরি করুন
                        </button>
                    </div><!-- panel-footer -->
                </div><!-- panel -->
        </div><!-- panel -->

        <div class="contentpanel">
            <h2 class="control-label text-center text-danger"> সকল উপকারভোগী তালিকা </h2>
            <h3></h3>
            <table id="basicTable" class="table table-striped  table-hover">
                <thead>
                <tr>
                    <th>ক্রমিক নং</th>
                    <th>উপজেলার নাম</th>
                    <th>সংযোজন তারিখ</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                    @php
                        $key=0;
                    @endphp
                @foreach($data as $item)
                    {{-- <tr>
                        <td><span style="font-family:SutonnyMJ; font-size: 18px;">{{ ++$key }}</span></td>
                        <td>{{ $item->name }}</td>
                        <td><span
                                style="font-family:SutonnyMJ; font-size: 18px;">{{ date('d-m-Y',strtotime($item->created_at)) }}</span>
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm mr-3" href="{{ route('admin.upzila.edit', $item->id) }}"><i class="fa fa-edit"></i></a>


                            <a type="button" onclick="return confirm('Are you sure')" class="btn btn-danger btn-sm mr-3" href="{{ route('admin.upzila.delete', $item->id) }}"><i class="icon ion-compose tx-28"></i>Delete</a>

                        </td>
                    </tr> --}}



                @endforeach

                </tbody>
            </table>
        </div><!-- panel -->
    </div><!-- mainwrapper -->
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#basicTable').dataTable();
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

