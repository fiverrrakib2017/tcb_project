@extends('Backend.Layout.App')
@section('title','সকল ডিলার তালিকা')
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">

                    <h4>ডিলার যুক্ত করুন</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">

            <form action="{{route('admin.dealer.store')}}" method="post">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">বিভাগ</label>

                                    <select name="division_id" onchange="loadZilas();" value="{{old('division_id')}}" id="division_id" style="width: 100%;"
                                        required>
                                        <option value="">---নির্বাচন করুন---</option>
                                        @foreach ($division as $division)
                                            <option value="{{ $division->id }}">{{ $division->name_ban }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">জেলা</label>

                                    <select onchange="loadUpZilas();" name="zila_id" value="{{old('zila_id')}}" id="zila_id" style="width: 100%;" required>
                                        <option value="">---নির্বাচন করুন---</option>



                                    </select>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">উপজেলা</label>

                                    <select onchange="loadUnion();" name="upzila_id" value="{{old('upzila_id')}}" id="upzila_id" style="width: 100%;" required>
                                        <option value="">---নির্বাচন করুন---</option>

                                    </select>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">ইউনিয়ন</label>

                                    <select name="union_id" value="{{old('union_id')}}" id="union_id" style="width: 100%;" required>
                                        <option value="">---নির্বাচন করুন---</option>



                                    </select>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label"> ডিলার নাম </label>
                                    <input type="text" name="name" class="form-control" placeholder="ডিলার নাম লিখুন " required/>
                                </div>
                            </div>
                           
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label"> মোবাইল নাম্ভার </label>
                                    <input type="number" name="mobile" class="form-control" placeholder="ডিলার মোবাইল " required/>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">এনআইডি নাম্ভার </label>
                                    <input type="number" name="nid_number" class="form-control" placeholder="ডিলার এনআইডি নাম্ভার  লিখুন " required/>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">কার্ড নাম্ভার শুরু</label>
                                    <input type="number" name="card_number_start" class="form-control" placeholder="ডিলার কার্ড নাম্ভার" required/>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">কার্ড নাম্ভার শেষ </label>
                                    <input type="number" name="card_number_end" class="form-control" placeholder="ডিলার কার্ড নাম্ভার লিখুন " required/>

                                </div>
                            </div>
                            
                            
                           

                           
                            

                            


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
                            <select name="search_division_id" onchange="searchloadZilas();"  id="search_division_id" style="width: 100%;"
                                        required>
                                <option value="">---নির্বাচন করুন---</option>
                                    @foreach ($filter_div as $item)
                                    <option value="{{ $item->id }}">{{ $item->name_ban }}</option>
                                    @endforeach
                            </select> 
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">জেলা</label>

                            <select onchange="searchloadUpZilas();" name="search_zila_id"  id="search_zila_id" style="width: 100%;" required>
                                <option value="">---নির্বাচন করুন---</option>



                            </select>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">উপজেলা</label>

                            <select  name="search_upzila_id"  id="search_upzila_id" style="width: 100%;" required>
                                <option value="">---নির্বাচন করুন---</option>

                            </select>

                        </div>
                    </div>
            </div>
            <table id="basicTable" class="table table-striped  table-hover">
                <thead>
                <tr>
                    <th>ক্রমিক নং</th> 
                    <th>বিভাগের নাম</th>
                    <th>জেলার নাম</th>
                    <th>উপজেলার নাম</th>
                    <th>ইউনিয়নের নাম</th>
                    <th>নাম</th>
                    <th>মোবাইল নাম্ভার </th>
                    <th>এনআইডি নাম্ভার </th>
                   
                   
                    
                    <th></th>
                </tr>
                </thead>

                <tbody>
                    @php
                        $key=0;
                    @endphp

                @foreach($dealer as $item)
                <tr>
                    <td><span style="font-family:SutonnyMJ; font-size: 18px;">{{ ++$key }}</span></td>
                    <td>{{ $item->division->name_ban }}</td>
                    <td>{{ $item->zila->name }}</td>
                    <td>{{ $item->upzila->name }}</td>
                    <td>{{ $item->union->name }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->phone_number }}</td>
                    <td>{{ $item->nid_no }}</td>
                   
                    
                    <td>
                        <a class="btn btn-primary btn-sm mr-3" href="{{ route('admin.dealer.edit', $item->id) }}"><i class="fa fa-edit"></i></a>


                        <a type="button" onclick="return confirm('Are you sure')" class="btn btn-danger btn-sm mr-3" href="{{ route('admin.dealer.delete', $item->id) }}"><i class="icon ion-compose tx-28"></i>Delete</a>

                    </td>
                </tr>
                 

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
            $("#zila_id").select2();
            $("#division_id").select2();
            $("#search_division_id").select2();
            $("#search_zila_id").select2();
            $("#search_upzila_id").select2();
            $("#upzila_id").select2();
            $("#union_id").select2();
            $("#ward_id").select2();
            $("#month").select2();
        });


        var selectedZila = null;

        function loadZilas() {
            var divisionId = $("#division_id").val();

            var zilaDropdown = $("#zila_id");
            zilaDropdown.empty(); // Clear previous options

            var upzilaDropdown = $("#upzila_id");
            upzilaDropdown.empty(); // Clear upzila options


            var unionDropdown = $("#union_id");
            unionDropdown.empty(); // Clear Union options

            if (divisionId) {
                fetch('/get-zilas/' + divisionId)
                    .then(response => response.json())
                    .then(data => {
                        var defaultOption = new Option('------- জেলা নির্বাচন করুন -------', '');
                        zilaDropdown.append(defaultOption).trigger('change');

                        var defaultOption2 = new Option('------- উপজেলা নির্বাচন করুন -------', '');
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
        function searchloadZilas() {
            var selectedZila = null;
            var divisionId = $("#search_division_id").val();

            var zilaDropdown = $("#search_zila_id");
            zilaDropdown.empty(); // Clear previous options

            var upzilaDropdown = $("#search_upzila_id");
            upzilaDropdown.empty(); // Clear upzila options



            if (divisionId) {
                fetch('/get-zilas/' + divisionId)
                    .then(response => response.json())
                    .then(data => {
                        var defaultOption = new Option('------- জেলা নির্বাচন করুন -------', '');
                        zilaDropdown.append(defaultOption).trigger('change');

                        var defaultOption2 = new Option('------- উপজেলা নির্বাচন করুন -------', '');
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
                        var defaultOption = new Option('------- উপজেলা নির্বাচন করুন -------', '');
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
                        var defaultOption = new Option('------- উপজেলা নির্বাচন করুন -------', '');
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
            selectedUpzila = $("#upzila_id").val();
            var upZilaId = selectedUpzila;

            var unionDropdown = $("#union_id");
            unionDropdown.empty(); // Clear previous options

            if (upZilaId) {
                // Send an AJAX request to get the upzilas for the selected zila
                fetch('/get-union/' + upZilaId)
                    .then(response => response.json())
                    .then(data => {
                        var defaultOption = new Option('------- ইউনিয়ন নির্বাচন করুন -------', '');
                        unionDropdown.append(defaultOption).trigger('change');

                        data.forEach(final_data => {
                            var option = new Option(final_data.name, final_data.id, false, false);
                            unionDropdown.append(option).trigger('change');
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
        }

        $(document).ready(function() {
            $('#search_division_id, #search_zila_id, #search_upzila_id').change(function() {
                var division_id = $('#search_division_id').val();
                var zila_id = $('#search_zila_id').val();
                var upzila_id = $('#search_upzila_id').val();
                $.ajax({
                    url: '/filter-dealers',
                    method: 'POST',
                    data: {
                        division_id: division_id,
                        zila_id: zila_id,
                        upzila_id: upzila_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                       var response_data = response.data;

                        $('#basicTable tbody').empty();

                        
                        response_data.forEach(function(dealer) {

                            //create edit link
                            var editUrl = '{{ route("admin.dealer.edit", ":id") }}';
                            editUrl = editUrl.replace(':id', dealer.id);

                            //create delete link
                            var deleteUrl = '{{ route("admin.dealer.delete", ":id") }}';
                            deleteUrl = deleteUrl.replace(':id', dealer.id);

                            var row = '<tr>' +
                            '<td>' + dealer.id + '</td>' +
                            '<td>' + dealer.division.name_ban + '</td>' +
                            '<td>' + dealer.zila.name + '</td>' +
                            '<td>' + dealer.upzila.name + '</td>' +
                            '<td>' + dealer.union.name + '</td>' +
                            '<td>' + dealer.name + '</td>' +
                            '<td>' + dealer.phone_number + '</td>' +
                            '<td>' + dealer.nid_no + '</td>' +
                            '<td>' +
                                '<a class="btn btn-primary btn-sm mr-3 fillter_edit_button" href="' + editUrl + '"><i class="fa fa-edit"></i></a>' +
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

