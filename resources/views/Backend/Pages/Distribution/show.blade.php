@extends('Backend.Layout.App')
@section('title','টিসিবি উপকারভোগী পণ্য প্রদান করুন')
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                     <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">
                    <h4>টিসিবি উপকারভোগী পণ্য প্রদান করুন</h4>

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
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <h2 class="control-label text-center">মাসের নাম নির্বাচন করুন</h2>
                                <hr>
                                <a class="btn btn-primary" href="{{url('admin/january/distribution')}}">জানুয়ারি</a>
                                <a class="btn btn-success" href="{{url('admin/february/distribution')}}">ফেব্রুয়ারি</a>
                                <a class="btn btn-info" href="">মার্চ</a>
                                <a class="btn btn-danger" href="">এপ্রিল</a>
                                <a class="btn btn-primary" href="">মে</a>
                                <a class="btn btn-success" href="">জুন </a>
                                <a class="btn btn-info" href="">জুলাই</a>
                                <a class="btn btn-danger" href="">আগস্ট</a>
                                <a class="btn btn-primary" href="">সেপ্টেম্বর</a>
                                <a class="btn btn-success" href="">অক্টোবর</a>
                                <a class="btn btn-info" href="">নভেম্বর </a>
                                <a class="btn btn-danger" href="">ডিসেম্বর</a>
                            </div>
                        </div>

                    </div>
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div><!-- panel -->

        <div class="contentpanel">
           
            <table id="basicTable" class="table table-striped  table-hover">
                <thead>
                <tr>
                    <th>নাম</th>
                    <th>কার্ড নং</th>
                    <th>এনআইডি নম্বর</th>
                    <th>পিতার/স্বামীর নাম</th>
                    <th>বিভাগের নাম</th>
                    <th>জেলা</th>
                    <th>উপজেলা</th>
                    <th>ইউনিয়ন</th>
                    <th>গ্রাম</th>
                    <th>ওয়ার্ড নং</th>
                    <th>মোবাইল নম্বর</th>
                    <th>Date</th>
                    <th>একশন</th>
                </tr>
                </thead>

                <tbody>

                </tbody>
            </table>
        </div><!-- panel -->
    </div><!-- mainwrapper -->
@endsection

@section('script')
    <script>
    $(document).ready(function(){
     
     var table=$("#basicTable").DataTable({
        "processing":true,
       "responsive": true,
       "serverSide":true,
       beforeSend: function () {
       },
       ajax: "{{ route('admin.distribution.get_all_data') }}",
       language: {
         searchPlaceholder: 'Search...',
         sSearch: '',
         lengthMenu: '_MENU_ items/page',
       },
       "columns":[
        
         {
           "data":"beneficiary.name",
         },
         {
           "data":"beneficiary.card_no",
         },
         {
           "data":"beneficiary.nid",
         },
         {
           "data":"beneficiary.father_name"
         },
         {
           "data":"division.name"
         },
         {
           "data":"zila.name"
         },
         {
           "data":"upozila.name"
         },
         {
           "data":"union.name"
         },
         {
           "data":"village.name"
         },
         {
           "data":"ward_id"
         },
         {
           "data":"beneficiary.phone_number"
         },
         {
           "data":"created_at"
         },
         {
           render: function (data, type, row) {
            return '<button onclick="editRow(' + row.id + ')">Edit</button>';
           } 

         },
       ],
       order:[
         [0, "desc"]
       ],

     });
     $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
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

