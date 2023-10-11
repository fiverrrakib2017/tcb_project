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

                    <h4>বিভাগ যুক্ত করুন</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">

            <form action="{{url('admin/add/stock')}}" method="post">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="row">

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">ইউনিয়ন</label>
                                    <select data-placeholder="Choose One" name="union_id" class="form-control" required>
                                        <option value="">---নির্বাচন করুন---</option>
                                        {{-- @foreach($unions as $key=> $union)
                                            <option value="{{ $union->id }}">{{ $union->union_name }}</option>
                                        @endforeach --}}

                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">মাস</label>

                                    <select data-placeholder="Choose One" name="month" class="form-control" required>
                                        <option value="">---নির্বাচন করুন---</option>
                                        {{-- @foreach($months as $key=> $month)
                                            <option value="{{ $key }}">{{ $month }}</option>
                                        @endforeach --}}
                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">অর্থ বছর</label>
                                    <select data-placeholder="Choose One" name="year" class="form-control" required>
                                        <option value="">---নির্বাচন করুন---</option>
                                        {{-- <option value="2021" @if(date('Y') == 2021) selected @endif >২০২১-২০২২</option>
                                        <option value="2022">২০২২-২০২৩</option> --}}
                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col-sm-6 -->

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label">পরিমাণ (ইংরেজিতে লিখুন)</label>
                                    <input type="number" name="amount" class="form-control" required/>

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

      
    </div><!-- mainwrapper -->
@endsection



