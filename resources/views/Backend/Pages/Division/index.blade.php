@extends('Backend.Layout.App')
@section('title','সকল বিভাগ তালিকা')
@section('content')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">

                    <h4> সকল বিভাগ তালিকা</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->


        <div class="contentpanel">
            <h3></h3>
            <table id="basicTable" class="table table-striped  table-hover">
                <thead>
                <tr>
                    <th>ক্রমিক নং</th>
                    <th>বিভাগের নাম</th>
                    <th>সংযোজন তারিখ</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                    @php
                    $key = 0;
                    @endphp
                 @foreach($data as $item)
                    <tr>
                        <td><span style="font-family:SutonnyMJ; font-size: 18px;">{{ ++$key }}</span></td>
                        <td>{{ $item->name }}</td>
                        <td><span
                                style="font-family:SutonnyMJ; font-size: 18px;">{{ date('d-m-Y',strtotime($item->created_at)) }}</span>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div><!-- panel -->
    </div><!-- mainwrapper -->
@endsection


