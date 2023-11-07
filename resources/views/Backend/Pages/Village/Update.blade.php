@extends('Backend.Layout.App')
@section('title', 'উনিয়নের পরিবর্তন পেজ ')
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">

                    <h4>গ্রাম  পরিবর্তন করুন</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">

            <form action="{{ route('admin.village.update') }}" method="post">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-sm-2" style="display: none;">
                                <div class="form-group">
                                    <label class="control-label">id</label>
                                    <input  name="id" value="{{$village->id}}" required>
                                </div><!-- form-group -->
                            </div><!-- col-sm-2 -->
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">বিভাগ</label>

                                    <select onchange="loadZilas();" name="division_id" id="division_id" style="width: 100%;" required>
                                        <option value="" >---নির্বাচন করুন---</option>
                                        @foreach ($division as $division)
                                            <option value="{{ $division->id }}"
                                                {{ $village->division_id == $division->id ? 'selected' : '' }}>
                                                {{ $division->name_ban }}</option>
                                        @endforeach
                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col-sm-2 -->
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">জেলা</label>

                                    <select onchange="loadUpZilas();" name="zila_id" id="zila_id" style="width: 100%;" required>
                                        <option value="" >---নির্বাচন করুন---</option>
                                        @foreach ($zila as $zila)
                                            <option value="{{ $zila->id }}"
                                                {{ $village->zila_id == $zila->id ? 'selected' : '' }}>{{ $zila->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col-sm-2 -->
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">উপজেলা</label>

                                    <select onchange="loadUnion();" name="upzila_id" id="upzila_id" style="width: 100%;" required>
                                        <option value="" >---নির্বাচন করুন---</option>
                                        @foreach ($upzila as $upzila)
                                            <option value="{{ $upzila->id }}"
                                                {{ $village->upozila_id == $upzila->id ? 'selected' : '' }}>{{ $upzila->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col-sm-2 -->
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">উনিয়নের নাম</label>
                                    <select name="union_id" id="union_id" style="width: 100%;" required>
                                        <option value="" >---নির্বাচন করুন---</option>
                                        @foreach ($union as $union)
                                            <option value="{{ $upzila->id }}"
                                                {{ $village->union_id == $union->id ? 'selected' : '' }}>{{ $union->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">গ্রামের নাম</label>
                                    <input name="name" class="form-control" placeholder="গ্রামের নাম লিখুন" value="{{$village->name}}" required >
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
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
            $("#zila_id").select2();
            $("#division_id").select2();
            $("#upzila_id").select2();
            $("#union_id").select2();

          
            
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
                var defaultOption = new Option('------- উপজেলা নির্বাচন করুন -------', '');
                unionDropdown.append(defaultOption).trigger('change');

                data.forEach(data => {
                    var option = new Option(data.name, data.id, false, false);
                    unionDropdown.append(option).trigger('change');
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

