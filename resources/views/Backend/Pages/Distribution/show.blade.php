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

                        <form action="https://www.tcb.melandahbhata.gov.bd/admin/january/distribution/february">
                            <div class="col-sm-8">
                                <div class="form-group">
                                <select id="selectedMonth" class="form-control">
                                    <option value="">Select Month</option>
                                    @for ($month = 1; $month <= 12; $month++)
                                        <option value="{{ sprintf('%02d', $month) }}">{{ date("F", mktime(0, 0, 0, $month, 1)) }}</option>
                                    @endfor
                                </select>
                                </div>
                            </div>
                        </form>
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
       ajax: {
            url: "{{ route('admin.distribution.get_all_data') }}",
            type: 'GET',
            data: function (d) {
                d.selectedMonth = $('#selectedMonth').val();
            }
        },
       language: {
         searchPlaceholder: 'Search...',
         sSearch: '',
         lengthMenu: '_MENU_ items/page',
       },
       "columns":[
        
         {
           "data":"name",
         },
         {
           "data":"card_no",
         },
         {
           "data":"nid",
         },
         {
           "data":"father_name"
         },
         {
           "data":"division"
         },
         {
           "data":"zila"
         },
         {
           "data":"upozila"
         },
         {
           "data":"union"
         },
         {
           "data":"village"
         },
         {
           "data":"ward_id"
         },
         {
           "data":"phone_number"
         },
         {
          "data":"status",
          "render": function (data, type, row) {
            if (data===1) {
              return `<button class="btn btn-success btn-sm mr-3 " disabled "><i class="fa fa-money"></i> প্রদান হয়েছে</button>`;
            }else{
               return `<button class="btn btn-danger btn-sm mr-3 confirm-btn" data-id="${row.id}"><i class="fa fa-hand-o-up"></i> প্রদান করুন</button>`;
            }
           
          }

         },
       ],
       order:[
         [10, "desc"]
       ],

     });
     //$('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
      $('#selectedMonth').change(function () {
        table.ajax.reload();
      });
   });
   $(document).on('click', '.confirm-btn', function () {
    var userId = $(this).data('id');
    $.ajax({
        url: '/admin/otp/generate/' + userId,
        method: 'GET',
        success: function (response) {
          if (response) {
            toastr.success("OTP মোবাইল এ পাঠানো হয়েছে"); 
          }
        },
        error: function () {
          toastr.error('Error generating OTP.');
        }
    });
  });

  </script>

    


@endsection

