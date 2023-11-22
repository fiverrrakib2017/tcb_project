@extends('Backend.Layout.App')
@section('title','সকল জেলা তালিকা')
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">

                    <h4>জেলা যুক্ত করুন</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">

            <form action="{{route('admin.zila.store')}}" method="post">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="row">

                            <div class="col-md-4 col-sm-3">
                                <div class="form-group">
                                    <label class="control-label">বিভাগ</label>

                                    <select name="division_id" id="division_id" class="form-control" required>
                                        <option value="" >---নির্বাচন করুন---</option>
                                        @foreach($division as $division)

                                        <option value="{{$division->id}}">{{$division->name_ban}} </option>

                                        @endforeach
                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                            <div class="col-md-4 col-sm-3">
                                <div class="form-group">
                                    <label class="control-label">জেলার নাম</label>
                                        <input type="text" name="name"  class="form-control" placeholder="জেলার নাম লিখুন" required/>
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                        </div>
                    </div><!-- panel-body -->
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> সংরক্ষন
                        </button>
                    </div><!-- panel-footer -->
                </div><!-- panel -->
            </form>
        </div><!-- panel -->

        <div class="contentpanel">
            <div class="row">
                    <div class="col-md-4 col-sm-3">
                        <div class="form-group">
                            <label class="control-label">বিভাগ</label>
                            <select  id="search_division_id" class="form-control" required>
                                <option value="">---নির্বাচন করুন---</option>
                                    @foreach ($filter_div as $division)
                                        <option value="{{ $division->id }}">{{ $division->name_ban }}</option>
                                    @endforeach
                            </select> 
                        </div>
                    </div>
            </div>
            
            <table id="basicTable" class="table table-striped  table-hover">
                <thead>
                <tr>
                    <th>ক্রমিক নং</th>
                    <th>বিভাগের নাম </th>
                    <th>জেলার নাম</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                    @php
                        $key=0;
                    @endphp
                @foreach($data as $item)
                    <tr>
                        <td><span style="font-family:SutonnyMJ; font-size: 18px;">{{ ++$key }}</span></td>

                        <td>{{ $item->division->name_ban }}</td>
                        <td>{{ $item->name }}</td>
                        
                        <td>
                            <a class="btn btn-primary btn-sm mr-3" href="{{ route('admin.zila.edit', $item->id) }}"><i class="fa fa-edit"></i></a>


                            <a type="button" onclick="return confirm('Are you sure')" class="btn btn-danger btn-sm mr-3" href="{{ route('admin.zila.delete', $item->id) }}"><i class="icon ion-compose tx-28"></i>Delete</a>

                        </td>
                    </tr>


                    {{-- <div id="deleteModal{{$item->id}}" class="modal fade">
                        <div class="modal-dialog modal-confirm">
                            <form action="{{route('admin.zila.delete',$item->id)}}" method="post">
                                <div class="modal-content">
                                    <div class="modal-header flex-column">
                                        <div class="icon-box">
                                            <i class="fas fa-trash"></i>
                                        </div>
                                        <h4 class="modal-title w-100">Are you sure?</h4>
                                        <h4 class="modal-title w-100 d-none" id="deleteId"></h4>
                                        <a class="close" data-bs-dismiss="modal" aria-hidden="true"><i class="mdi mdi-close"></i></a>
                                    </div>
                                    <div class="modal-body">
                                        <p>Do you really want to delete these records? This process cannot be undone.</p>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <a href="" data-id="12" class="btn btn-danger" id="deleteConfirmBtn">Delete</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> --}}

                @endforeach

                </tbody>
            </table>
        </div><!-- panel -->
    </div><!-- mainwrapper -->
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#basicTable').dataTable();
           // $("#search_division_id").select2();

            $('#search_division_id').change(function() {
                var division_id = $('#search_division_id').val();
                $.ajax({
                    url: '/filter-zila',
                    method: 'POST',
                    data: {
                        division_id: division_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                       var response_data = response.data;
                       //console.log(response);

                        $('#basicTable tbody').empty();

                        
                        response_data.forEach(function(data) {

                            //create edit link
                            var editUrl = '{{ route("admin.zila.edit", ":id") }}';
                            editUrl = editUrl.replace(':id', data.id);

                            //create delete link
                            var deleteUrl = '{{ route("admin.zila.delete", ":id") }}';
                            deleteUrl = deleteUrl.replace(':id', data.id);

                            var row = '<tr>' +
                            '<td>' + data.id + '</td>' +
                            '<td>' + data.division.name_ban + '</td>' +
                            '<td>' + data.name + '</td>' +
                            '<td>' +
                                '<a class="btn btn-primary btn-sm mr-3 fillter_edit_button" href="' + editUrl + '" style="margin-right:5px"><i class="fa fa-edit"></i></a>' +
                                '<a type="button" onclick="return confirm(\'Are you sure\')" class="btn btn-danger btn-sm mr-3" href="'+deleteUrl+'"><i class="icon ion-compose tx-28"></i>Delete</a>'
                            '</td>' +
                            '</tr>';

                        $('#basicTable tbody').append(row);
                        });
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });
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

