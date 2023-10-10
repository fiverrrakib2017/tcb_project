@extends('Backend.Layout.App')
@section('title','টিসিবি উপকারভোগী যুক্ত করুন')
@section('content')

    <div class="mainpanel">
        <div class="contentpanel">

            {{-- @if(session()->has('alert-error'))
                <p class="alert alert-error">{{ session()->get('alert-error') }}</p>
            @endif
            @if(session()->has('alert-success'))
                <p class="alert alert-success">{{ session()->get('alert-success') }}</p>
            @endif --}}



            {{-- @include('backend.include.flash') --}}
            <form method="post" action="" enctype="multipart/form-data">
                {{-- @csrf
                @method('post') --}}


                <form method="post" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">কার্ড নং</label>

                                <input type="text" name="card_no" value="" class="form-control"/>
                                {{-- @if($errors->has('card_no'))
                                    <div class="error">{{ $errors->first('card_no') }}</div>
                                @endif --}}

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">ভোটার আইডি নং</label>

                                <input type="text" value="" name="nid" class="form-control"/>
                                {{-- @if($errors->has('nid'))
                                    <div class="error">{{ $errors->first('nid') }}</div>
                                @endif --}}

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">উপকারভোগী নাম</label>

                                <input type="text" name="name" value="" class="form-control"/>
                                {{-- @if($errors->has('name'))
                                    <div class="error">{{ $errors->first('name') }}</div>
                                @endif --}}

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">উপকারভোগী পিতা/স্বামীর নাম</label>

                                <input type="text" name="fh_name" value="" class="form-control"/>
                                {{-- @if($errors->has('fh_name'))
                                    <div class="error">{{ $errors->first('fh_name') }}</div>
                                @endif --}}


                            </div>
                        </div>

                        {{-- <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">মাতার নাম</label>

                                <input type="text" value="{{ old('mother_name') }}" name="mother_name"
                                       class="form-control"/>
                                @if($errors->has('mother_name'))
                                    <div class="error">{{ $errors->first('mother_name') }}</div>
                                @endif

                            </div>
                        </div> --}}

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">ইউনিয়ন</label>

                                <select name="union_id" class="form-control">
                                    <option value="">---নির্বাচন করুন---</option>
                                    {{-- @foreach($unions as $union)
                                        <option
                                            @if(!empty(old('union_id')) && $union->id == old('union_id')) selected
                                            @endif value="{{ $union->id }}">{{ $union->union_name }}</option>
                                    @endforeach --}}


                                </select>
                                {{-- @if($errors->has('union_id'))
                                    <div class="error">{{ $errors->first('union_id') }}</div>
                                @endif --}}
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">গ্রাম</label>

                                <input type="text" name="village" value="" class="form-control"/>
                                {{-- @if($errors->has('village'))
                                    <div class="error">{{ $errors->first('village') }}</div>
                                @endif --}}
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">ওয়ার্ড নং</label>
                                <select name="ward" class="form-control">
                                    <option value="">---নির্বাচন করুন---</option>
                                    {{-- @for($i=1; $i<=9; $i++)
                                        <option
                                            @if(!empty(old('ward')) && old('ward') == $i) selected
                                            @endif  value="{{ $i }}">{{ $i }}
                                        </option>
                                    @endfor --}}
                                </select>
                                {{-- @if($errors->has('ward'))
                                    <div class="error">{{ $errors->first('ward') }}</div>
                                @endif --}}


                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">মোবাইল</label>

                                <input type="text" name="mobile" id="mobile" class="form-control"/>
                                {{-- @if($errors->has('mobile'))
                                    <div class="error">{{ $errors->first('mobile') }}</div>
                                @endif --}}

                            </div>
                        </div>

                        {{-- <div class="col-md-3">
                            <div class="form-group">

                                <label class="control-label">ছবি (সর্বচ্চ ৫০ কে.বি)</label>
                                <input type="file" name="photo" class="form-control"/>
                                @if($errors->has('photo'))
                                    <div class="error">{{ $errors->first('photo') }}</div>
                                @endif
                                <label class="control-label">ছবি (সর্বচ্চ ৫০ কে.বি)</label><br>


                            </div><!-- form-group -->
                        </div> --}}

                    </div>
                    <button type="submit" class="btn btn-primary">সংরক্ষন</button>

                </form><!-- panel-wizard -->

        </div><!-- contentpanel -->
    </div><!-- mainpanel -->


    <!-- Input Image Show javascript -->

    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).ready(function(){
          // $('#mobile').html();
        });
    </script>
    <!-- Input Image Show javascript -->

@endsection
