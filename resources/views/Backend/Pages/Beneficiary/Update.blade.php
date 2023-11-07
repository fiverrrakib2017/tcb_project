@extends('Backend.Layout.App')
@section('title', 'টিসিবি উপকারভোগী যুক্ত করুন')
@section('content')

    <div class="mainpanel">
        <div class="contentpanel">

            <form method="post" action="{{ route('admin.beneficiries.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">কার্ড নং</label>

                            <input type="text" name="card_no" value="{{$item->card_no}}" class="form-control"/>

                            <input type="hidden" name="id" value="{{$item->id}}" class="form-control d-none" required />

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">ভোটার আইডি নং</label>

                            <input type="text" name="nid" value="{{$item->nid}}" class="form-control" placeholder="ভোটার আইডি লিখুন"
                                required />


                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">উপকারভোগী নাম</label>

                            <input type="text" name="name" value="{{$item->name}}" class="form-control"
                                placeholder="উপকারভোগী নাম লিখুন" required />

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">উপকারভোগী পিতা/স্বামীর নাম</label>

                            <input type="text" name="fh_name" value="{{$item->father_name}}" class="form-control"
                                placeholder="উপকারভোগী পিতা/স্বামীর  নাম লিখুন" required />


                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">মাতার নাম</label>

                            <input type="text" name="mother_name" value="{{$item->mother_name}}" class="form-control" placeholder="মাতার নাম লিখুন"
                                required />


                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">বিভাগ</label>

                            <select name="division_id" onchange="loadZilas();" value="{{$item->division_id}}" id="division_id" style="width: 100%;"
                                required>
                                <option value="">---নির্বাচন করুন---</option>
                                @foreach ($division as $division)
                                        <option value="{{ $division->id }}"
                                        {{ $item->division_id == $division->id ? 'selected' : '' }}>
                                        {{ $division->name_ban }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">জেলা</label>

                            <select onchange="loadUpZilas();" name="zila_id"  id="zila_id" style="width: 100%;" required>
                                <option value="">---নির্বাচন করুন---</option>
                                @foreach ($zila as $zila)
                                <option value="{{ $zila->id }}"
                                    {{ $item->zila_id == $zila->id ? 'selected' : '' }}>{{ $zila->name }}
                                </option>
                            @endforeach


                            </select>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">উপজেলা</label>

                            <select onchange="loadUnion();" name="upzila_id" id="upzila_id" style="width: 100%;" required>
                                <option value="">---নির্বাচন করুন---</option>
                                @foreach ($upzila as $upzila)
                                    <option value="{{ $upzila->id }}"
                                        {{ $item->upozila_id == $upzila->id ? 'selected' : '' }}>{{ $upzila->name }}
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
                                    {{ $item->union_id == $union->id ? 'selected' : '' }}>{{ $union->name }}
                                </option>
                                @endforeach

                            </select>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">গ্রাম</label>
                            <select name="village_id"  id="village_id" style="width: 100%;" required>
                                <option value="">---নির্বাচন করুন---</option>
                                @foreach ($village as $village)
                                <option value="{{ $village->id }}"
                                    {{ $item->village_id == $village->id ? 'selected' : '' }}>{{ $village->name }}
                                </option>
                                @endforeach


                            </select>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">ওয়ার্ড নং </label>
                            <select name="ward_id"  id="ward_id" style="width: 100%;" required>
                                <option value="">---নির্বাচন করুন---</option>
                                <option value="1" {{ $item->ward_id == 1 ? 'selected' : '' }}>1</option>
                                <option value="2" {{ $item->ward_id ==2 ? 'selected' : '' }}>2</option>
                                <option value="3" {{ $item->ward_id ==3 ? 'selected' : '' }}>3</option>
                                <option value="4" {{ $item->ward_id == 4 ? 'selected' : '' }}>4</option>
                                <option value="5" {{ $item->ward_id == 5 ? 'selected' : '' }}>5</option>
                                <option value="6" {{ $item->ward_id == 6 ? 'selected' : '' }}>6</option>
                                <option value="7" {{ $item->ward_id == 7 ? 'selected' : '' }}>7</option>
                                <option value="8" {{ $item->ward_id == 8 ? 'selected' : '' }}>8</option>
                                <option value="9" {{ $item->ward_id == 9 ? 'selected' : '' }}>9</option>
                            </select>
                        </div>
                    </div>



                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">মোবাইল</label>

                            <input type="text" name="mobile" value="{{$item->phone_number}}" id="mobile" class="form-control"
                                placeholder="মোবাইল নং লিখুন" required />

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">ছবি (সর্বচ্চ ২ এম.বি)</label>
                            <input type="file" name="photo" id="photo" class="form-control"
                                onchange="previewImage(event)" />
                                @if ($item->photo)
                                <img height="50px" src="{{ asset('images/' . $item->photo) }}" alt="Photo">
                                @else

                                @endif

                            <div id="imageContainer"></div>
                        </div><!-- form-group -->
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">সংরক্ষন রাখুন</button>

            </form><!-- panel-wizard -->

        </div><!-- contentpanel -->
    </div><!-- mainpanel -->


    <!-- Input Image Show javascript -->



@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#basicTable').dataTable();
            $("#zila_id").select2();
            $("#division_id").select2();
            $("#upzila_id").select2();
            $("#union_id").select2();
            $("#village_id").select2();
            $("#ward_id").select2();
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
    @if (session('success'))
        <script>
            toastr.success('{{ session('success') }}');
        </script>
    @elseif(session('error'))
        <script>
            toastr.error('{{ session('error') }}');
        </script>
    @endif

    @if (session('errors'))
        <script>
            var errors = @json(session('errors'));
            errors.forEach(function(error) {
                toastr.error(error);
            });
        </script>
    @endif


@endsection
