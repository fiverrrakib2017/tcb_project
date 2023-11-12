@extends('Backend.Layout.App')
@section('title','এডমিন ড্যাশবোর্ড')
@section('content')
    <div class="mainpanel">

        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-dashboard"></i>
                </div>
                <div class="media-body">

                    <h4>সকল ইউনিয়ন টিসিবি ড্যাশবোর্ড </h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">
            <div class="row">

                <div class="col-md-3 pull-right">
                    <form action="" method="get">
                        <select name="month" required class="form-control">
                            <option value="all">সকল মাস</option>
                        </select>
                        <br>
                        <button type="submit" class="btn-sm btn-primary">দেখুন</button>
                    </form>
                </div>
            </div>
            <br>
            <div class="row row-stat">
                <div class="col-md-3">

                    <div class="panel panel-info-alt noborder">
                        <div class="panel-heading noborder">
                            <div class="panel-btns">
                                <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i
                                        class="fa fa-times"></i></a>
                            </div><!-- panel-btns -->
                            <div class="media-body">

                                <h5 class="md-title nomargin">
                                    এপ্রিল <span
                                        style="font-family:SutonnyMJ; font-size: 18px;"></span>টিসিবি উপকারভোগী ১২ জন</h5>
                                {{-- <h5 style="font-family:SutonnyMJ;" class="mt5">{{ $stock->total_bosta }} জন</h5> --}}

                                <p style="18px;"> barapara ইউনিয়ন</p>
                            </div><!-- media-body -->
                            <hr>
                            <div class="clearfix mt20">
                                <div class="pull-left">
                                    <h5 class="md-title nomargin">পণ্য নিয়েছেন</h5>

                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">
                                        12 জন
                                    </h4>
                                </div>
                                <div class="pull-right">
                                    <h5 class="md-title nomargin">পণ্য নিতে আসে নাই</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">
                                        565 জন
                                </div>
                            </div>

                        </div><!-- panel-body -->
                    </div><!-- panel -->
                </div><!-- col-md-4 -->
                <div class="col-md-3">

                    <div class="panel panel-info-alt noborder">
                        <div class="panel-heading noborder">
                            <div class="panel-btns">
                                <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i
                                        class="fa fa-times"></i></a>
                            </div><!-- panel-btns -->
                            <div class="media-body">

                                <h5 class="md-title nomargin">
                                    এপ্রিল <span
                                        style="font-family:SutonnyMJ; font-size: 18px;"></span>টিসিবি উপকারভোগী ১২ জন</h5>
                                {{-- <h5 style="font-family:SutonnyMJ;" class="mt5">{{ $stock->total_bosta }} জন</h5> --}}

                                <p style="18px;"> barapara ইউনিয়ন</p>
                            </div><!-- media-body -->
                            <hr>
                            <div class="clearfix mt20">
                                <div class="pull-left">
                                    <h5 class="md-title nomargin">পণ্য নিয়েছেন</h5>

                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">
                                        12 জন
                                    </h4>
                                </div>
                                <div class="pull-right">
                                    <h5 class="md-title nomargin">পণ্য নিতে আসে নাই</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">
                                        565 জন
                                </div>
                            </div>

                        </div><!-- panel-body -->
                    </div><!-- panel -->
                </div><!-- col-md-4 -->
                <div class="col-md-3">

                    <div class="panel panel-info-alt noborder">
                        <div class="panel-heading noborder">
                            <div class="panel-btns">
                                <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i
                                        class="fa fa-times"></i></a>
                            </div><!-- panel-btns -->
                            <div class="media-body">

                                <h5 class="md-title nomargin">
                                    এপ্রিল <span
                                        style="font-family:SutonnyMJ; font-size: 18px;"></span>টিসিবি উপকারভোগী ১২ জন</h5>
                                {{-- <h5 style="font-family:SutonnyMJ;" class="mt5">{{ $stock->total_bosta }} জন</h5> --}}

                                <p style="18px;"> barapara ইউনিয়ন</p>
                            </div><!-- media-body -->
                            <hr>
                            <div class="clearfix mt20">
                                <div class="pull-left">
                                    <h5 class="md-title nomargin">পণ্য নিয়েছেন</h5>

                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">
                                        12 জন
                                    </h4>
                                </div>
                                <div class="pull-right">
                                    <h5 class="md-title nomargin">পণ্য নিতে আসে নাই</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">
                                        565 জন
                                </div>
                            </div>

                        </div><!-- panel-body -->
                    </div><!-- panel -->
                </div><!-- col-md-4 -->
                <div class="col-md-3">

                    <div class="panel panel-info-alt noborder">
                        <div class="panel-heading noborder">
                            <div class="panel-btns">
                                <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i
                                        class="fa fa-times"></i></a>
                            </div><!-- panel-btns -->
                            <div class="media-body">

                                <h5 class="md-title nomargin">
                                    এপ্রিল <span
                                        style="font-family:SutonnyMJ; font-size: 18px;"></span>টিসিবি উপকারভোগী ১২ জন</h5>
                                {{-- <h5 style="font-family:SutonnyMJ;" class="mt5">{{ $stock->total_bosta }} জন</h5> --}}

                                <p style="18px;"> barapara ইউনিয়ন</p>
                            </div><!-- media-body -->
                            <hr>
                            <div class="clearfix mt20">
                                <div class="pull-left">
                                    <h5 class="md-title nomargin">পণ্য নিয়েছেন</h5>

                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">
                                        12 জন
                                    </h4>
                                </div>
                                <div class="pull-right">
                                    <h5 class="md-title nomargin">পণ্য নিতে আসে নাই</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">
                                        565 জন
                                </div>
                            </div>

                        </div><!-- panel-body -->
                    </div><!-- panel -->
                </div><!-- col-md-4 -->
                <div class="col-md-3">

                    <div class="panel panel-info-alt noborder">
                        <div class="panel-heading noborder">
                            <div class="panel-btns">
                                <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i
                                        class="fa fa-times"></i></a>
                            </div><!-- panel-btns -->
                            <div class="media-body">

                                <h5 class="md-title nomargin">
                                    এপ্রিল <span
                                        style="font-family:SutonnyMJ; font-size: 18px;"></span>টিসিবি উপকারভোগী ১২ জন</h5>
                                {{-- <h5 style="font-family:SutonnyMJ;" class="mt5">{{ $stock->total_bosta }} জন</h5> --}}

                                <p style="18px;"> barapara ইউনিয়ন</p>
                            </div><!-- media-body -->
                            <hr>
                            <div class="clearfix mt20">
                                <div class="pull-left">
                                    <h5 class="md-title nomargin">পণ্য নিয়েছেন</h5>

                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">
                                        12 জন
                                    </h4>
                                </div>
                                <div class="pull-right">
                                    <h5 class="md-title nomargin">পণ্য নিতে আসে নাই</h5>
                                    <h4 style="font-family:SutonnyMJ;" class="nomargin">
                                        565 জন
                                </div>
                            </div>

                        </div><!-- panel-body -->
                    </div><!-- panel -->
                </div><!-- col-md-4 -->
            </div><!-- row -->


        </div><!-- contentpanel -->

    </div><!-- mainpanel -->
@endsection
