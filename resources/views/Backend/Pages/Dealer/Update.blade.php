@extends('Backend.Layout.App')
@section('title','ডিলার পরিবর্তন করুন ')
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">

                    <h4>ডিলার পরিবর্তন করুন </h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">

        <form action="{{route('admin.dealer.update')}}" method="post">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-3" style="display: none;">
                                <div class="form-group">
                                    <label class="control-label">Update Id </label>
                                    <input type="text" name="id" value="{{$dealer->id}}"  required/>

                                </div>
                            </div>
                            <div class="col-md-3">

                                <div class="form-group">
                                    <label class="control-label">বিভাগ</label>
                                    <select name="division_id" onchange="loadZilas();" value="{{old('division_id')}}" id="division_id" class="form-control"
                                        required>

                                        <option value="">---নির্বাচন করুন---</option>
                                        

                                        @foreach ($division as $division)
                                            <option value="{{ $division->id }}"
                                                {{ $dealer->division_id == $division->id ? 'selected' : '' }}>
                                                {{ $division->name_ban }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">জেলা</label>

                                    <select onchange="loadUpZilas();" name="zila_id" value="{{old('zila_id')}}" id="zila_id" class="form-control" required>
                                    <option value="{{$dealer->zila_id}}">{{ $dealer->zila->name }}</option>

                                    </select>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">উপজেলা</label>

                                    <select onchange="loadUnion();" name="upzila_id" value="{{old('upzila_id')}}" id="upzila_id" class="form-control" required>
                                    <option value="{{$dealer->upzila_id}}">{{ $dealer->upzila->name }}</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">ইউনিয়ন</label>

                                    <select name="union_id" value="{{old('union_id')}}" id="union_id" class="form-control" required>
                                    <option value="{{$dealer->union_id}}">{{ $dealer->union->name }}</option>
                                       
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label"> ডিলার নাম </label>
                                    <input type="text" name="name" value="{{$dealer->name}}" class="form-control" placeholder="ডিলার নাম লিখুন " required/>

                                </div>
                            </div>
                           
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label"> মোবাইল নাম্বার </label>
                                    <input type="number" name="mobile" value="{{$dealer->phone_number}}" class="form-control" placeholder="ডিলার মোবাইল " required/>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">এনআইডি নাম্বার </label>
                                    <input type="text" name="nid_number" value="{{$dealer->nid_no}}" class="form-control" placeholder="ডিলার এনআইডি নাম্বার  লিখুন " required/>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">কার্ড নাম্বার শুরু</label>
                                    <input type="text" name="card_number_start" value="{{$dealer->card_no_start}}" class="form-control" placeholder="ডিলার কার্ড নাম্বার" required/>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">কার্ড নাম্বার শেষ </label>
                                    <input type="text" name="card_number_end" value="{{$dealer->card_no_end}}" class="form-control" placeholder="ডিলার কার্ড নাম্বার লিখুন " required/>

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
            // $("#zila_id").select2();
            // $("#division_id").select2();
            // $("#upzila_id").select2();
            // $("#union_id").select2();
            // $("#ward_id").select2();
            // $("#month").select2();
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
            selectedUpzila = $("#upzila_id").val();
            var upZilaId = selectedUpzila;

            var unionDropdown = $("#union_id");
            unionDropdown.empty(); // Clear previous options

            if (upZilaId) {
                // Send an AJAX request to get the upzilas for the selected zila
                fetch('/get-union/' + upZilaId)
                    .then(response => response.json())
                    .then(data => {
                        var defaultOption = new Option('--- ইউনিয়ন নির্বাচন করুন ---', '');
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
