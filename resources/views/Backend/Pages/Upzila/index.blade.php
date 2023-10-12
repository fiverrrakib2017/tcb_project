@extends('Backend.Layout.App')
@section('title','সকল উপজেলার তালিকা')
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">

                    <h4>উপজেলা যুক্ত করুন</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">

            <form action="{{route('admin.upzila.store')}}" method="post">
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

                                    <select name="zila_id" id="zila_id" style="width: 100%;" required>
                                        <option value="" >---নির্বাচন করুন---</option>

                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col-sm-2 -->

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">উপজেলার নাম</label>
                                        <input type="text" name="name"  class="form-control" placeholder="উপজেলার নাম লিখুন" />
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
            <h2 class="control-label text-center text-danger"> সকল উপজেলার তালিকা </h2>
            <h3></h3>
            <table id="basicTable" class="table table-striped  table-hover">
                <thead>
                <tr>
                    <th>ক্রমিক নং</th>
                    <th>বিভাগের নাম </th>
                    <th>জেলার নাম </th>
                    <th>উপজেলার নাম</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                    @php
                        $key=0;
                    @endphp
                @foreach($data as $item)
                    <tr>
                        <td><span style="font-family:SutonnyMJ; font-size: 18px;">{{ ++$key }}</span></td>

                        <td>{{ $item->division->name }}</td>
                        <td>{{ $item->zila->name }}</td>

                        {{-- উপজেলার নাম --}}
                        <td>{{ $item->name }}</td>

                        <td>
                            <a class="btn btn-primary btn-sm mr-3" href="{{ route('admin.upzila.edit', $item->id) }}"><i class="fa fa-edit"></i></a>


                            <a type="button" onclick="return confirm('Are you sure')" class="btn btn-danger btn-sm mr-3" href="{{ route('admin.upzila.delete', $item->id) }}"><i class="icon ion-compose tx-28"></i>Delete</a>

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

 <script type="text/javascript">

    function loadZilas() {
        var divisionId = document.getElementById('division_id').value;

        var zilaDropdown = document.getElementById('zila_id');
        zilaDropdown.innerHTML = ''; // Clear previous options

        if (divisionId) {
            // Send an AJAX request to get the zilas for the selected division
            fetch('/get-zilas/' + divisionId)
                .then(response => response.json())
                .then(data => {
                    data.forEach(zila => {
                        var option = document.createElement('option');
                        option.value = zila.id;
                        option.text = zila.name;
                        zilaDropdown.add(option);
                    });
                })
                .catch(error => console.error('Error:', error));
        }
    }

</script>

@endsection

