@extends('Backend.Layout.App')
@section('title', 'মজুদ পণ্য পরিবর্তন পেজ ')
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">

                    <h4>মজুদ পণ্য পরিবর্তন করুন</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">

        <form action="{{route('admin.stock.update')}}" method="post">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-3">

                                <div class="form-group">
                                    <label class="control-label">বিভাগ</label>
                                        <input type="hidden" value="{{$stocks->id}}">
                                    <select name="division_id" onchange="loadZilas();" value="{{old('division_id')}}" id="division_id" style="width: 100%;"
                                        required>
                                        <option value="">---নির্বাচন করুন---</option>
                                        

                                        @foreach ($division as $division)
                                            <option value="{{ $division->id }}"
                                                {{ $stocks->division_id == $division->id ? 'selected' : '' }}>
                                                {{ $division->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">জেলা</label>

                                    <select onchange="loadUpZilas();" name="zila_id" value="{{old('zila_id')}}" id="zila_id" style="width: 100%;" required>
                                        <option value="">---নির্বাচন করুন---</option>

                                        @foreach ($zila as $zila)
                                            <option value="{{ $zila->id }}"
                                                {{ $stocks->zila_id == $zila->id ? 'selected' : '' }}>{{ $zila->name }}
                                            </option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">উপজেলা</label>

                                    <select onchange="loadUnion();" name="upzila_id" value="{{old('upzila_id')}}" id="upzila_id" style="width: 100%;" required>
                                        <option value="">---নির্বাচন করুন---</option>
                                        @foreach ($upzila as $upzila)
                                            <option value="{{ $upzila->id }}"
                                                {{ $stocks->upzila_id == $upzila->id ? 'selected' : '' }}>{{ $upzila->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">ইউনিয়ন</label>

                                    <select name="union_id" value="{{old('union_id')}}" id="union_id" style="width: 100%;" required>
                                        <option value="">---নির্বাচন করুন---</option>
                                        @foreach ($union as $union)
                                            <option value="{{ $union->id }}"
                                                {{ $stocks->union_id == $union->id ? 'selected' : '' }}>{{ $union->name }}
                                            </option>
                                        @endforeach
                                       
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">ওয়ার্ড নং</label>
                                    <select name="ward_id"  id="ward_id" style="width: 100%;" required>
                                        <option value="{{$stocks->month}}">2</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">মাস</label>

                                    <select data-placeholder="Choose One" name="month" id="month" class="form-select" style="width: 100%;" required>
                                            <option value="{{$stocks->month}}">
                                            @if($stocks->month == 'january')
                                                জানুয়ারি
                                            @elseif($stocks->month == 'february')
                                                ফেব্রুয়ারি
                                            @elseif($stocks->month == 'march')
                                                মার্চ
                                            
                                            @elseif($stocks->month == 'april')
                                            এপ্রিল
                                            
                                            @elseif($stocks->month == 'may')
                                            মে
                                            
                                            @elseif($stocks->month == 'june')
                                            জুন
                                            
                                            @elseif($stocks->month == 'july')
                                            জুলাই
                                            
                                            @elseif($stocks->month == 'august')
                                            আগস্ট
                                            
                                            @elseif($stocks->month == 'september')
                                            সেপ্টেম্বর
                                            
                                            @elseif($stocks->month == 'october')
                                            অক্টোবর
                                            
                                            @elseif($stocks->month == 'november')
                                            নভেম্বর
                                            @elseif($stocks->month == 'december')
                                            ডিসেম্বর
                                            
                                            @endif
                                            </option>
                                            <option value="january">জানুয়ারি</option>
                                            <option value="february">ফেব্রুয়ারি</option>
                                            <option value="march">মার্চ</option>
                                            <option value="april">এপ্রিল</option>
                                            <option value="may">মে</option>
                                            <option value="june">জুন</option>
                                            <option value="july">জুলাই</option>
                                            <option value="august">আগস্ট</option>
                                            <option value="september">সেপ্টেম্বর</option>
                                            <option value="october">অক্টোবর</option>
                                            <option value="november">নভেম্বর</option>
                                            <option value="december">ডিসেম্বর</option>
                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">অর্থ বছর</label>
                                    <select data-placeholder="Choose One" name="year" class="form-control" required>
                                        <option value="{{$stocks->year}}">

                                            @if ($stocks->year==2022)
                                            ২০২১-২০২২
                                            @endif

                                        </option>
                                        
                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">পরিমাণ (ইংরেজিতে লিখুন)</label>
                                    <input type="number" name="amount" class="form-control" value="{{$stocks->amount}}" required/>

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


    </div><!-- mainwrapper -->
@endsection

@section('script')
<script type="text/javascript">
        $(document).ready(function() {
            $('#basicTable').dataTable();
            $("#zila_id").select2();
            $("#division_id").select2();
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