@extends('Backend.Layout.App')
@section('title','সকল গ্রামের তালিকা') 
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">

                    <h4>গ্রাম যুক্ত করুন</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">

            <form action="{{route('admin.village.store')}}" method="post">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label">বিভাগ</label>

                                    <select onchange="loadZilas();" name="division_id" id="division_id" class="form-control" required>
                                        <option value="" >---নির্বাচন করুন---</option>
                                        @foreach($division as $division)

                                        <option value="{{$division->id}}">{{$division->name_ban}}</option>

                                        @endforeach
                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col-sm-3 -->
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label">জেলা</label>

                                    <select onchange="loadUpZilas();" name="zila_id" id="zila_id" class="form-control" required>
                                        <option value="" >---নির্বাচন করুন---</option>

                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col-sm-3 -->
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label">উপজেলা</label>

                                    <select onchange="loadUnion();" name="upzila_id" id="upzila_id" class="form-control" required>
                                        <option value="" >---নির্বাচন করুন---</option>

                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col-sm-3 -->
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label">উনিয়নের নাম</label>
                                    <select name="union_id" id="union_id" class="form-control" required>
                                        <option value="" >---নির্বাচন করুন---</option>

                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col-sm-3 -->
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label">গ্রামের নাম</label>
                                    <input name="name" class="form-control" placeholder="গ্রামের নাম লিখুন" required >
                                </div><!-- form-group -->
                            </div><!-- col-sm-3 -->
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
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">বিভাগ</label>
                            <select  onchange="searchloadZilas();"  id="search_division_id" class="form-control"
                                        required>
                                <option value="">---নির্বাচন করুন---</option>
                                    @foreach ($filter_div as $division)
                                        <option value="{{ $division->id }}">{{ $division->name_ban }}</option>
                                    @endforeach
                            </select> 
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">জেলা</label>

                            <select onchange="searchloadUpZilas();"   id="search_zila_id" class="form-control" required>
                                <option value="">---নির্বাচন করুন---</option>



                            </select>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">উপজেলা</label>

                            <select   onchange="searchLoadUnion();"  id="search_upzila_id" class="form-control" required>
                                <option value="">---নির্বাচন করুন---</option>

                            </select>

                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label">উনিয়নের নাম</label>
                            <select  id="search_union_id" class="form-control" required>
                                <option value="" >---নির্বাচন করুন---</option>

                            </select>
                        </div><!-- form-group -->
                    </div><!-- col-sm-3 -->
            </div>
            <table id="basicTable" class="table table-striped  table-hover">
                <thead>
                <tr>
                    <th>ক্রমিক নং</th>
                    <th>বিভাগের নাম</th>
                    <th>জেলার নাম</th>
                    <th>উপজেলার নাম</th>
                    <th>উনিয়নের নাম</th>
                    <th>গ্রামের নাম</th> 
                    <th></th>
                </tr>
                </thead>

                <tbody>
                    @php
                        $key=0;
                    @endphp
                @foreach($village as $item)
                    <tr>
                        <td><span style="font-family:SutonnyMJ; font-size: 18px;">{{ ++$key }}</span></td>
                        <td>{{ $item->division->name_ban }}</td>
                        <td>{{ $item->zila->name }}</td>
                        <td>{{ $item->upzila->name }}</td>
                        <td>{{ $item->union->name }}</td>
                        <td>{{ $item->name }}</td>
                        {{-- <td><span
                                style="font-family:SutonnyMJ; font-size: 18px;">{{ date('d-m-Y',strtotime($item->created_at)) }}</span>
                        </td> --}}
                        <td>
                            <a class="btn btn-primary btn-sm mr-3" href="{{ route('admin.village.edit', $item->id) }}"><i class="fa fa-edit"></i></a>


                            <a type="button" onclick="return confirm('Are you sure')" class="btn btn-danger btn-sm mr-3" href="{{ route('admin.village.delete', $item->id) }}"><i class="icon ion-compose tx-28"></i>Delete</a>

                        </td>
                    </tr>



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
            // $("#zila_id").select2();
            // $("#upzila_id").select2();
            // $("#union_id").select2();

            // $("#search_division_id").select2();
            // $("#search_zila_id").select2();
            // $("#search_upzila_id").select2(); 
            // $("#search_union_id").select2();
            
        });


var selectedZila = null;

function searchloadZilas() {
    var divisionId = $("#search_division_id").val();

    var zilaDropdown = $("#search_zila_id");
    zilaDropdown.empty(); // Clear previous options

    var upzilaDropdown = $("#search_upzila_id");
    upzilaDropdown.empty(); // Clear upzila options

    if (divisionId) {
        fetch('/get-zilas/' + divisionId)
            .then(response => response.json())
            .then(data => {
                var defaultOption = new Option('--- জেলা নির্বাচন করুন ---', '');
                zilaDropdown.append(defaultOption).trigger('change');

                var defaultOption2 = new Option('--- উপজেলা নির্বাচন করুন ---', '');
                upzilaDropdown.append(defaultOption2).trigger('change');

                data.forEach(zila => {
                    var option = new Option(zila.name, zila.id, false, false);
                    zilaDropdown.append(option).trigger('change');
                });

                // Restore selected zila if it exists in the new zilas list
                if (selectedZila && data.some(zila => zila.id === selectedZila)) {
                    zilaDropdown.val(selectedZila).trigger('change');
                }
            })
            .catch(error => console.error('Error:', error));
    }
}
function loadZilas() {
    var divisionId = $("#division_id").val();

    var zilaDropdown = $("#zila_id");
    zilaDropdown.empty(); // Clear previous options

    var upzilaDropdown = $("#upzila_id");
    upzilaDropdown.empty(); // Clear upzila options

    if (divisionId) {
        fetch('/get-zilas/' + divisionId)
            .then(response => response.json())
            .then(data => {
                var defaultOption = new Option('--- জেলা নির্বাচন করুন ---', '');
                zilaDropdown.append(defaultOption).trigger('change');

                var defaultOption2 = new Option('--- উপজেলা নির্বাচন করুন ---', '');
                upzilaDropdown.append(defaultOption2).trigger('change');

                data.forEach(zila => {
                    var option = new Option(zila.name, zila.id, false, false);
                    zilaDropdown.append(option).trigger('change');
                });

                // Restore selected zila if it exists in the new zilas list
                if (selectedZila && data.some(zila => zila.id === selectedZila)) {
                    zilaDropdown.val(selectedZila).trigger('change');
                }
            })
            .catch(error => console.error('Error:', error));
    }
}

function searchloadUpZilas() {
    selectedZila = $("#search_zila_id").val();
    var zilaId = selectedZila;

    var upzilaDropdown = $("#search_upzila_id");
    upzilaDropdown.empty(); // Clear previous options

    if (zilaId) {
        // Send an AJAX request to get the upzilas for the selected zila
        fetch('/get-upzila/' + zilaId)
            .then(response => response.json())
            .then(data => {
                var defaultOption = new Option('--- উপজেলা নির্বাচন করুন ---', '');
                upzilaDropdown.append(defaultOption).trigger('change');

                data.forEach(upzila => {
                    var option = new Option(upzila.name, upzila.id, false, false);
                    upzilaDropdown.append(option).trigger('change');
                });
            })
            .catch(error => console.error('Error:', error));
    }
}
function loadUpZilas() {
    selectedZila = $("#zila_id").val();
    var zilaId = selectedZila;

    var upzilaDropdown = $("#upzila_id");
    upzilaDropdown.empty(); // Clear previous options

    if (zilaId) {
        // Send an AJAX request to get the upzilas for the selected zila
        fetch('/get-upzila/' + zilaId)
            .then(response => response.json())
            .then(data => {
                var defaultOption = new Option('--- উপজেলা নির্বাচন করুন ---', '');
                upzilaDropdown.append(defaultOption).trigger('change');

                data.forEach(upzila => {
                    var option = new Option(upzila.name, upzila.id, false, false);
                    upzilaDropdown.append(option).trigger('change');
                });
            })
            .catch(error => console.error('Error:', error));
    }
}
function loadUnion() {
    selectedUpZila = $("#upzila_id").val();
    var UpzilaId = selectedUpZila;

    var unionDropdown = $("#union_id");
    unionDropdown.empty(); // Clear previous options

    if (UpzilaId) {
        // Send an AJAX request to get the upzilas for the selected zila
        fetch('/get-union/' + UpzilaId)
            .then(response => response.json())
            .then(data => {
                var defaultOption = new Option('--- উপজেলা নির্বাচন করুন ---', '');
                unionDropdown.append(defaultOption).trigger('change');

                data.forEach(data => {
                    var option = new Option(data.name, data.id, false, false);
                    unionDropdown.append(option).trigger('change');
                });
            })
            .catch(error => console.error('Error:', error));
    }
}

function searchLoadUnion() {
    selectedUpZila = $("#search_upzila_id").val();
    var UpzilaId = selectedUpZila;

    var unionDropdown = $("#search_union_id");
    unionDropdown.empty(); // Clear previous options

    if (UpzilaId) {
        // Send an AJAX request to get the upzilas for the selected zila
        fetch('/get-union/' + UpzilaId)
            .then(response => response.json())
            .then(data => {
                var defaultOption = new Option('--- ইউনিয়ন  নির্বাচন করুন ---', '');
                unionDropdown.append(defaultOption).trigger('change');

                data.forEach(data => {
                    var option = new Option(data.name, data.id, false, false);
                    unionDropdown.append(option).trigger('change');
                });
            })
            .catch(error => console.error('Error:', error));
    }
}




$(document).ready(function() {
            $('#search_division_id, #search_zila_id, #search_upzila_id,#search_union_id').change(function() {
                var division_id = $('#search_division_id').val();
                var zila_id = $('#search_zila_id').val();
                var upzila_id = $('#search_upzila_id').val();
                var union_id = $('#search_union_id').val();
                $.ajax({
                    url: '/filter_village',
                    method: 'POST',
                    data: {
                        division_id: division_id,
                        zila_id: zila_id,
                        upzila_id: upzila_id,
                        union_id: union_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                       var response_data = response.data;

                        $('#basicTable tbody').empty();

                        
                        response_data.forEach(function(data) {

                            //create edit link
                            var editUrl = '{{ route("admin.village.edit", ":id") }}';
                            editUrl = editUrl.replace(':id', data.id);

                            //create delete link
                            var deleteUrl = '{{ route("admin.village.delete", ":id") }}';
                            deleteUrl = deleteUrl.replace(':id', data.id);

                            var row = '<tr>' +
                            '<td>' + data.id + '</td>' +
                            '<td>' + data.division.name_ban + '</td>' +
                            '<td>' + data.zila.name + '</td>' +
                            '<td>' + data.upzila.name + '</td>' +
                            '<td>' + data.union.name + '</td>' +
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

