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
                        <div class="col-md-3" style="display: none;">
                                <div class="form-group">
                                    <label class="control-label">Update Id </label>
                                    <input type="text" name="id" value="{{$stocks->id}}" class="form-control" placeholder="ডিলার নাম লিখুন " required/>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">বিভাগ</label>
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

                                    <select onchange="loadDealer();" name="union_id" value="{{old('union_id')}}" id="union_id" style="width: 100%;" required>
                                        <option value="">---নির্বাচন করুন---</option>
                                        @foreach ($union as $union)
                                            <option value="{{ $union->id }}"
                                                {{ $stocks->union_id == $union->id ? 'selected' : '' }}>{{ $union->name }}
                                            </option>
                                        @endforeach
                                       
                                    </select>

                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label">ডিলার নাম </label>
                                    <select name="dealer_id" value="{{old('dealer_id')}}" id="dealer_id" style="width: 100%;" required>
                                        <option value="">---নির্বাচন করুন---</option>
                                        @foreach ($dealer as $dealer)
                                            <option value="{{ $dealer->id }}"
                                                {{ $stocks->dealer_id == $dealer->id ? 'selected' : '' }}>{{ $dealer->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->
                            
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label">মাস</label>

                                    <select  name="month" id="month" class="form-select" style="width: 100%;" required>
                                        <option value="">Select a month</option>
                                        @foreach([
                                            'january' => 'জানুয়ারি',
                                            'february' => 'ফেব্রুয়ারি',
                                            'march' => 'মার্চ',
                                            'april' => 'এপ্রিল',
                                            'may' => 'মে',
                                            'june' => 'জুন',
                                            'july' => 'জুলাই',
                                            'august' => 'আগস্ট',
                                            'september' => 'সেপ্টেম্বর',
                                            'october' => 'অক্টোবর',
                                            'november' => 'নভেম্বর',
                                            'december' => 'ডিসেম্বর',
                                        ] as $value => $label)
                                            <option value="{{ $value }}" @if($value === $stocks->month) selected @endif>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label">অর্থ বছর</label>
                                    <select data-placeholder="Choose One" name="year" class="form-control" required>
                                        <option value="">---নির্বাচন করুন---</option>
                                        <option value="2021" @if(old('year', $stocks->year) == '2021') selected @endif >২০২১-২০২২</option>
                                        <option value="2022" @if(old('year', $stocks->year) == '2022') selected @endif >২০২২-২০২৩</option> 
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
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> পরিবর্তন করুন
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
            $("#dealer_id").select2();
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
        function loadDealer() {
            selectedUnion = $("#union_id").val();
            var unionId = selectedUnion;

            var dealerDropdown = $("#dealer_id");
            dealerDropdown.empty(); // Clear previous options

            if (unionId) {
                // Send an AJAX request to get the upzilas for the selected zila
                fetch('/get-dealer/' + unionId)
                    .then(response => response.json())
                    .then(data => {
                        var defaultOption = new Option('------- ডিলার নির্বাচন করুন -------', '');
                        dealerDropdown.append(defaultOption).trigger('change');

                        data.forEach(final_data => {
                            var option = new Option(final_data.name, final_data.id, false, false);
                            dealerDropdown.append(option).trigger('change');
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
