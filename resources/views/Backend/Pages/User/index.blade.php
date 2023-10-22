@extends('Backend.Layout.App')
@section('title','সকল ব্যাবহারকারিদের তালিকা')
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">

                    <h4>ইউজার যুক্ত করুন</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader --> 
        <div class="contentpanel">

            <form action="{{route('admin.stock.store')}}" method="post">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">সম্পূর্ণ নাম </label>
                                    <input type="text" name="name" class="form-control" required placeholder="এইখানে নাম লিখুন"/>

                                </div> 
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">ব্যাবহারকারির নাম  (ইংরেজিতে লিখুন)</label>
                                    <input type="text" name="username" class="form-control" required placeholder="এইখানে  লিখুন"/>

                                </div> 
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input type="email" name="email" class="form-control" required placeholder="Enter Email"/>

                                </div> 
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Phone Number</label>
                                    <input type="number" name="phone" class="form-control" required placeholder="Enter Phone Number"/>

                                </div> 
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Password</label>
                                    <input type="password" name="password" class="form-control" required placeholder="Enter Password"/>

                                </div> 
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Confirm Password</label>
                                    <input type="password" name="c_password" class="form-control" required placeholder="Enter Confirm Password"/>

                                </div> 
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">বিভাগ</label>

                                    <select name="division_id" onchange="loadZilas();" value="{{old('division_id')}}" id="division_id" style="width: 100%;"
                                        required>
                                        <option value="">---নির্বাচন করুন---</option>
                                        @foreach ($division as $division)
                                            <option value="{{ $division->id }}">{{ $division->name }}</option>
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
            <h2 class="control-label text-center text-danger">সকল ব্যাবহারকারিদের তালিকা</h2>
            <h3></h3>
            <table id="basicTable" class="table table-striped  table-hover">
                <thead>
                <tr>
                    <th>ক্রমিক নং</th>
                    <th>ইমেইল</th>
                    <th>মোবাইল নং</th>
                    <th>স্ট্যাটাস</th>  
                    <th>ইউজার রোল</th> 
                    <th></th>
                </tr>
                </thead>

                <tbody>

                @foreach($users as $key=> $item)
                    <tr>
                        <td><span style="font-family:SutonnyMJ; font-size: 18px;">{{ ++$key }}</span></td>
                        <td>{{ $item->email }}</td>
                        <td>{{$item->phone_number}}</td>
                        <td>{{$item->status}}</td>
                        <td>
                        @if ($item->user_type==1)
                            admin
                        @endif    
                        
                        
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
@endsection

