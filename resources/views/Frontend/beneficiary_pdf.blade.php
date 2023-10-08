<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>তালিকা প্রিন্ট করুন</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://vgd.melandahbhata.gov.bd/public/asset/backend/css/envelope.css" rel="stylesheet">
    <style type="text/css">

        body {
            margin: 20px auto;
            width: 100%;
        }

        img {
            width: 50px;
            height: 50px;
        }


        .card-div {
            border: 1px solid #000;
            padding: 5px;

        }
        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: inherit;
            border-style: solid;
            border-width: 3px;
            /* border-top: 3px; */


        }

        .pic {
            line-height: 9rem;
            width: 88%;
            height: 88%;
            border: 2px solid black;
            text-align: center;
        }
        .p-parent{
            width: 10rem;
            height: 10rem;
            margin-left: 10px;
        }

    
    </style>
</head>
<body>
    
    <div class="container-fluid">
        <div class="">
            <div class="row">
                <div class="col-3 text-left m-auto">
                    {{-- <img src="{{ asset('images/qr_code.png') }}" width="250" height="250" alt=""> --}}
                    {{-- <img src="{{ asset('images/qr_code.png') }}" width="250" height="250" alt=""> --}}
                    @php
                        $url = route('public.qr_code.show', [$beneficiary->id]);
                    @endphp
                    <div>{!! QrCode::size(130)->generate($url) !!}</div>

                </div>
                <div class="col-6 text-center m-auto">
                    গণপ্রজাতন্ত্রী বাংলাদেশ সরকার <br/>
                        @foreach ($unions as $union)
                            @if ($union->id == $beneficiary->union_id)
                                {{ $union->union_name }} কার্যালয়<br/>
                            @endif
                        @endforeach
                        পরিবার পরিচিতি কার্ড
                    <div> <strong> কার্ড নং: {{ $beneficiary->card_no }}</strong></div>

                </div>
                <div class="col-3 text-right m-0">
                    <div class="p-parent">
                        <div class="pic">ছবি</div>
                    </div>

                    {{-- <img src="{{ asset('images/no_user.png') }}" width="120" height=120" alt=""> --}}
                </div>
            </div>
            <hr>
            
            

            <div class="row mb-2">
                <div class="col-6">
                    <strong>উপকারভোগী নাম: </strong> <span> {{ $beneficiary->name }} </span>
                </div>
                
                <div class="col-6">
                    <strong>পিতা/স্বামীর নাম: </strong> <span>{{ $beneficiary->fh_name }}</span>
                </div>
            </div>
            
            <div class="row mb-2">
                
                <div class="col-6">
                    <strong>মোবাইল: </strong><span> {{ $beneficiary->mobile }} </span>
                </div>
                
                <div class="col-6">
                    <strong>আইডি নং: </strong> <span> {{ $beneficiary->nid }} </span>
                </div>

            </div>
            
            <div class="row mb-3">
                <div class="col-6">
                        <strong>ওয়ার্ড নং: </strong><span> {{$beneficiary->ward }} </span>
                </div>
                
                <div class="col-6">
                    <strong>গ্রাম: </strong><span> {{$beneficiary->village }} </span>
                </div>
            
            </div>


           <table class="table table-striped table-bordered border-dark align-middle">
                <thead class="text-center border-dark">
                    <tr>
                        <th style="width: 130px;">সেবা প্রদানের তারিখ</th>
                        <th class="align-middle">সেবার বিবরণ</th>
                        <th class="align-middle">পরিমাণ</th>
                        <th class="align-middle">স্বাক্ষর</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="align-middle" style="height: 50px"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                    </tr>
                    <tr>
                        <td class="align-middle" style="height: 50px"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                    </tr>
                     <tr>
                        <td class="align-middle" style="height: 50px"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                    </tr>
                     <tr>
                        <td class="align-middle" style="height: 50px"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                    </tr>
                     <tr>
                        <td class="align-middle" style="height: 50px"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                    </tr>
                     <tr>
                        <td class="align-middle" style="height: 50px"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                    </tr>
                     <tr>
                        <td class="align-middle" style="height: 50px"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                    </tr>
                    
                     <tr>
                        <td class="align-middle" style="height: 50px"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                    </tr>
                    
                     <tr>
                        <td class="align-middle" style="height: 50px"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                    </tr>
                    
                     <tr>
                        <td class="align-middle" style="height: 50px"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                    </tr>
                    
                     <tr>
                        <td class="align-middle" style="height: 50px"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                    </tr>
                    
                     <tr>
                        <td class="align-middle" style="height: 50px"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                    </tr>
                    
                </tbody>
            </table>
            
            <div class="d-block text-center mt-4 mb-3">
               <strong>বাস্তবায়নেঃ উপজেলা প্রশাসন মেলান্দহ, জামালপুর </strong>
            </div>
        </div>
        {{-- <hr> --}}

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>
