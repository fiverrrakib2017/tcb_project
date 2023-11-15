@extends('Backend.Layout.App')
@section('title', 'টিসিবি উপকারভোগী যুক্ত করুন')
@section('content')

    <div class="mainpanel">
    <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">

                    <h4>টিসিবি উপকারভোগী যুক্ত করুন</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">

            <form method="post" action="{{ route('admin.beneficiries.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">বিভাগ</label>

                            <select name="division_id" onchange="loadZilas();" value="{{old('division_id')}}" id="division_id" class="form-control"
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

                            <select onchange="loadUpZilas();" name="zila_id" value="{{old('zila_id')}}" id="zila_id" class="form-control" required>
                                <option value="">---নির্বাচন করুন---</option>



                            </select>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">উপজেলা</label>

                            <select onchange="loadUnion();" name="upzila_id" value="{{old('upzila_id')}}" id="upzila_id" class="form-control" required>
                                <option value="">---নির্বাচন করুন---</option>

                            </select>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">ইউনিয়ন</label>

                            <select onchange="loadVillage();" name="union_id" value="{{old('union_id')}}" id="union_id" class="form-control" required>
                                <option value="">---নির্বাচন করুন---</option>



                            </select>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">ডিলার নাম</label>

                            <select name="dealer_id" value="{{old('dealer_id')}}" id="dealer_id" class="form-control" required>
                                <option value="">---নির্বাচন করুন---</option>
                                @foreach ($dealer as $dealer)
                                    <option value="{{ $dealer->id }}">{{ $dealer->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">ভাতার নাম</label>

                            <select name="vatar_id" value="{{old('vatar_id')}}" id="vatar_id" class="form-control" required>
                                <option value="">---নির্বাচন করুন---</option>
                                @foreach ($vatar as $vatar)
                                    <option value="{{ $vatar->id }}">{{ $vatar->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">উপকারভোগী নাম</label>

                            <input type="text" name="name" value="{{old('name')}}" class="form-control"
                                placeholder="উপকারভোগী নাম লিখুন" required />

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">উপকারভোগী পিতা/স্বামীর নাম</label>

                            <input type="text" name="fh_name" value="{{old('fh_name')}}" class="form-control"
                                placeholder="উপকারভোগী পিতা/স্বামীর  নাম লিখুন" required />


                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">মাতার নাম</label>

                            <input type="text" name="mother_name" value="{{old('mother_name')}}" class="form-control" placeholder="মাতার নাম লিখুন"
                                required />


                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">গ্রাম</label>
                            <select name="village_id"  id="village_id" class="form-control" required>
                                <option value="">---নির্বাচন করুন---</option>



                            </select>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">ওয়ার্ড নং</label>
                            <select name="ward_id" value="{{old('ward_id')}}" id="ward_id" class="form-control" required>
                                <option value="">---নির্বাচন করুন---</option>
                                <option value="1">1</option>
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

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">ভোটার আইডি নং</label>

                            <input type="number" name="nid" value="{{old('nid')}}" class="form-control" placeholder="ভোটার আইডি লিখুন"
                                required />


                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">মোবাইল</label>

                            <input type="text" name="mobile" value="{{old('mobile')}}" id="mobile" class="form-control"
                                placeholder="মোবাইল নং লিখুন" required />

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">কার্ড নং</label>

                            <input type="text" name="card_no" value="{{old('card_no')}}" class="form-control"
                                placeholder="কার্ড নং লিখুন" required />

                        </div>
                    </div>

                    <!-- <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">ছবি (সর্বচ্চ ২ এম.বি)</label>
                            <input type="file" name="photo" id="photo" class="form-control"
                                onchange="previewImage(event)" />
                            <div id="imageContainer"></div>
                        </div>
                    </div> -->

                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> সংরক্ষন রাখুন</button>

            </form><!-- panel-wizard -->

        </div><!-- contentpanel -->
    </div><!-- mainpanel -->


    <!-- Input Image Show javascript -->



@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#basicTable').dataTable();
            // $("#zila_id").select2();
            // $("#division_id").select2();
            // $("#upzila_id").select2();
            // $("#union_id").select2();
            // $("#ward_id").select2();
            // $("#village_id").select2();
            // $("#vatar_id").select2();
            // $("#dealer_id").select2();
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

            var villageDropdown = $("#village_id");
            villageDropdown.empty(); // Clear Union options

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
        function loadVillage() {
            selectedUnion = $("#union_id").val();
            var unionId = selectedUnion;

            var villageDropdown = $("#village_id");
            villageDropdown.empty(); // Clear previous options

            if (unionId) {
                // Send an AJAX request to get the upzilas for the selected zila
                fetch('/get-village/' + unionId)
                    .then(response => response.json())
                    .then(data => {
                        var defaultOption = new Option('------- গ্রাম নির্বাচন করুন -------', '');
                        villageDropdown.append(defaultOption).trigger('change');

                        data.forEach(final_data => {
                            var option = new Option(final_data.name, final_data.id, false, false);
                            villageDropdown.append(option).trigger('change');
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
