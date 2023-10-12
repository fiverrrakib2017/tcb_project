@extends('Backend.Layout.App')
@section('title','সকল উনিয়নের তালিকা')
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">

                    <h4>উনিয়ন যুক্ত করুন</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">

            <form action="{{route('admin.union.store')}}" method="post">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">বিভাগ</label>

                                    <select onchange="loadZilas();" name="division_id" id="division_id" style="width: 100%;" required>
                                        <option value="" >---নির্বাচন করুন---</option>
                                        @foreach($division as $division)

                                        <option value="{{$division->id}}">{{$division->name}}</option>

                                        @endforeach
                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col-sm-2 -->
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">জেলা</label>

                                    <select onchange="loadUpZilas();" name="zila_id" id="zila_id" style="width: 100%;" required>
                                        <option value="" >---নির্বাচন করুন---</option>

                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col-sm-2 -->
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">উপজেলা</label>

                                    <select name="upzila_id" id="upzila_id" style="width: 100%;" required>
                                        <option value="" >---নির্বাচন করুন---</option>

                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col-sm-2 -->
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">উনিয়নের নাম</label>
                                        <input type="text" name="name"  class="form-control" placeholder="উনিয়নের নাম লিখুন" />
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
            <h2 class="control-label text-center text-danger"> সকল উনিয়নের তালিকা </h2>
            <h3></h3>
            <table id="basicTable" class="table table-striped  table-hover">
                <thead>
                <tr>
                    <th>ক্রমিক নং</th>
                    <th>বিভাগের নাম</th>
                    <th>জেলার নাম</th>
                    <th>উপজেলার নাম</th>
                    <th>উনিয়নের নাম</th>
                    {{-- <th>সংযোজন তারিখ</th> --}}
                    <th></th>
                </tr>
                </thead>

                <tbody>
                    @php
                        $key=0;
                    @endphp
                @foreach($union as $item)
                    <tr>
                        <td><span style="font-family:SutonnyMJ; font-size: 18px;">{{ ++$key }}</span></td>
                        <td>{{ $item->division->name }}</td>
                        <td>{{ $item->zila->name }}</td>
                        <td>{{ $item->upzila->name }}</td>
                        <td>{{ $item->name }}</td>
                        {{-- <td><span
                                style="font-family:SutonnyMJ; font-size: 18px;">{{ date('d-m-Y',strtotime($item->created_at)) }}</span>
                        </td> --}}
                        <td>
                            <a class="btn btn-primary btn-sm mr-3" href="{{ route('admin.union.edit', $item->id) }}"><i class="fa fa-edit"></i></a>


                            <a type="button" onclick="return confirm('Are you sure')" class="btn btn-danger btn-sm mr-3" href="{{ route('admin.union.delete', $item->id) }}"><i class="icon ion-compose tx-28"></i>Delete</a>

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
            $("#zila_id").select2();
            $("#division_id").select2();
            $("#upzila_id").select2();
        });


var selectedZila = null;

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

