@extends('Backend.Layout.App')
@section('title','সকল উপকারভোগীর  তালিকা')
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                     <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">
                    <h4>সকল উপকারভোগীর  তালিকা</h4>

                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">
                <div class="panel panel-default">

                    {{-- <div class="panel-footer">
                        <button type="submit" class="btn btn-primary "><i class="fa fa-check-circle"></i> নতুন উপকারভোগী তৈরি করুন</button>
                        <button type="submit" class="btn btn-primary "><i class="fa fa-file-excel"></i> Export</button>

                        <button type="submit" class="btn btn-primary "><i class="fa fa-solid fa-database"></i> Import</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>Reset</button>
                    </div><!-- panel-footer --> --}}
                </div><!-- panel -->
        </div><!-- panel -->

        <div class="contentpanel">
            <h2 class="control-label text-center text-danger"> সকল উপকারভোগী তালিকা </h2>
            <h3></h3>
            <table id="basicTable" class="table table-striped  table-hover">
                <thead>
                <tr>
                    <th>ক্রমিক নং</th>
                    <th>নাম</th>
                    <th>পিতার নাম</th>
                    <th>মাতার নাম</th>
                    <th>আইডি কার্ড নং</th>
                    <th>মোবাইল নাম্ভার</th>
                    <th>ছবি</th>
                    <th>কার্ড </th>
                    <th>বিভাগের নাম</th>
                    <th>জেলা</th>
                    <th>উপজেলা</th>
                    <th>ইউনিয়ন</th>
                    <th>ওয়ার্ড নং</th>
                    <th>গ্রামের নাম</th>
                    <th>সংযোজন তারিখ</th>
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
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->father_name }}</td>
                        <td>{{ $item->mother_name }}</td>
                        <td>{{ $item->card_no }}</td>
                        <td>{{ $item->phone_number }}</td>
                        <td>
                            @if($item->photo)
                            <img class="img-circle" height="50px"  src="{{ asset('images/' . $item->photo) }}" alt="Photo">

                            @else
                                <img src="{{ asset('images/no_image.png') }}" height="50px" alt="Default Photo">
                            @endif
                        </td>
                        <td>{{ $item->card_no }}</td>
                        <td>{{ $item->division->name_ban }}</td>
                        <td>{{ $item->zila->name }}</td>
                        <td>{{ $item->upozila->name }}</td>
                        <td>{{ $item->union->name }}</td>
                        <td>{{ $item->ward_id }}</td>
                        <td>{{ $item->village->name }}</td>
                        <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                        <td>
                            <!-- Add your action buttons here -->
                            <a class="btn btn-primary btn-sm mr-3" href="{{ route('admin.beneficiries.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
                            <a type="button" onclick="return confirm('Are you sure')" class="btn btn-danger btn-sm mr-3" href="{{ route('admin.beneficiries.delete', $item->id) }}"><i class="icon ion-compose tx-28"></i>Delete</a>
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

