@extends('Backend.Layout.App')
@section('title','টিসিবি উপকারভোগী যুক্ত করুন')
@section('content')

    <div class="mainpanel">
        <div class="contentpanel">

                <form method="post" action="{{route('admin.beneficiries.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">কার্ড নং</label>

                                <input type="text" name="card_no" value="" class="form-control" placeholder="কার্ড নং লিখুন" required/>

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">ভোটার আইডি নং</label>

                                <input type="text"  name="nid" class="form-control" placeholder="ভোটার আইডি লিখুন" required/>


                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">উপকারভোগী নাম</label>

                                <input type="text" name="name" value="" class="form-control" placeholder="উপকারভোগী নাম লিখুন" required/>

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">উপকারভোগী পিতা/স্বামীর নাম</label>

                                <input type="text" name="fh_name" value="" class="form-control" placeholder="উপকারভোগী পিতা/স্বামীর  নাম লিখুন" required/>


                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">মাতার নাম</label>

                                <input type="text"  name="mother_name" class="form-control" placeholder="মাতার নাম লিখুন" required/>


                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">বিভাগ</label>

                                <select name="division_id" id="division_id" style="width: 100%;" required>
                                    <option value="" >---নির্বাচন করুন---</option>
                                    @foreach($division as $division)

                                       <option value="{{$division->id}}">{{$division->name}}</option>

                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">জেলা</label>

                                <select name="zila_id" id="zila_id" style="width: 100%;" required>
                                    <option value="">---নির্বাচন করুন---</option>
                                        @foreach($zila as $item)

                                        <option value="{{$item->id}}">{{$item->name}}</option>

                                        @endforeach


                                </select>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">উপজেলা</label>

                                <select name="upzila_id" id="upzila_id" style="width: 100%;" required>
                                    <option value="">---নির্বাচন করুন---</option>
                                    @foreach($upzila as $item)

                                    <option value="{{$item->id}}">{{$item->name}}</option>

                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">ইউনিয়ন</label>

                                <select name="union_id" id="union_id"  style="width: 100%;" required>
                                    <option value="">---নির্বাচন করুন---</option>
                                    @foreach($union as $item)

                                    <option value="{{$item->id}}">{{$item->name}}</option>

                                    @endforeach


                                </select>

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">ওয়ার্ড নং</label>
                                <select name="ward_id" id="ward_id" style="width: 100%;" required>
                                    <option value="">---নির্বাচন করুন---</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">গ্রাম</label>

                                <input type="text" name="village" value="" class="form-control" placeholder="গ্রামের নাম লিখুন" required/>

                            </div>
                        </div>



                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">মোবাইল</label>

                                <input type="text" name="mobile" id="mobile" class="form-control" placeholder="মোবাইল নং লিখুন" required/>

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">ছবি (সর্বচ্চ ২ এম.বি)</label>
                                <input type="file" name="photo" id="photo" class="form-control" onchange="previewImage(event)" />
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

<script type="text/javascript">
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();

        reader.onload = function(){
            var imageContainer = document.getElementById('imageContainer');
            var img = document.createElement('img');
            img.src = reader.result;
            img.style.maxWidth = '100%';
            img.style.maxHeight = '100px';
            imageContainer.appendChild(img);
        };

        reader.readAsDataURL(input.files[0]);
    }
    $(document).ready(function(){
       $("#division_id").select2();
       $("#zila_id").select2();
       $("#upzila_id").select2();
       $("#union_id").select2();
       $("#ward_id").select2();
    });
</script>


@endsection
