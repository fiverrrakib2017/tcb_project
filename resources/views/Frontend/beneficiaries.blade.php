@extends('public.app')
@section('title', 'ভিজিডি ম্যানেজমেন্ট সিস্টেম - VGD Management System')
@section('content')

    <div class="container bg-white">

        <div class="row">
            <div class="col-md-9">
                <div class="table-wrapper">
                    <table class="fl-table">
                        <thead>
                        <tr>
                            <th>ইউনিয়নের নাম</th>
                            <th>ভিজিডি উপকারভোগির সংখ্যা</th>
                            <th>ভিউ</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($beneficiaries as $beneficiary)
                            <tr>
                                <td>{{ $beneficiary->union_name }}</td>
                                <td>{{ $beneficiary->total }}</td>
                                <td><a href="{{ url('vgd-beneficiaries-view/'.$beneficiary->id) }}">দেখুন</a></td>
                            </tr>

                        @endforeach

                        <tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-3 text-center">


                <div class="porikolpona-head mb-2 mt-5 animated fadeInDown" data-wow-duration="2s" data-wow-delay="5s">
                    <h5>পরিকল্পনায়</h5>
                    <img src="{{asset('/images/chairman.jpg')}}" alt="ইন্জিঃ মোঃ কামরুজ্জামান {{ url('/') }}">
                </div>
                <div class="single-team-item animated fadeInDown" data-wow-duration="2s" data-wow-delay="5s">
                    <p>ইন্জিঃ মোঃ কামরুজ্জামান <br> উপজেলা চেয়ারম্যান <br> মেলান্দহ জামালপুর </p>
                </div>

                <div class="porikolpona-head mb-2 mt-5 animated fadeInUp" data-wow-duration="2s" data-wow-delay="5s">
                    <h5>বাস্তবায়নে</h5>
                    <img src="{{asset('/images/uno.jpg')}}" alt="তামিম আল ইয়ামীন {{ url('/') }}">
                </div>
                <div class="single-team-item animated fadeInUp" data-wow-duration="2s" data-wow-delay="5s">
                    <p>তামিম আল ইয়ামীন <br> উপজেলা নির্বাহী অফিসার <br> মেলান্দহ জামালপুর </p>
                </div>

                <div class="single-team-item animated fadeInUp" data-wow-duration="2s" data-wow-delay="5s">
                    <img src="{{asset('/images/ap.jpg')}}" alt="মোঃ মোবারক হোসেন {{ url('/') }}">
                    <p>মোঃ মোবারক হোসেন <span> <br/> সহকারী প্রোগ্রামার <br/> তথ্য ও যোগাযোগ প্রযুক্তি অধিদপ্তর <br/> মেলান্দহ, জামালপুর।</span>
                    </p>
                </div>

                <div class="single-team-item animated fadeInUp" data-wow-duration="2s" data-wow-delay="5s">
                    <img src="{{asset('/images/zohurul.jpg')}}" alt="মোঃ জহুরুল ইসলাম {{ url('/') }}">
                    <p>মোঃ জহুরুল ইসলাম <span> <br/> উদ্যোক্তা ও ডেভেলপার <br/> ৪ নং নাংলা ইউপি <br/> মেলান্দহ, জামালপুর।</span>
                    </p>
                </div>

                <!--<div class="single-team-item animated fadeInUp" data-wow-duration="2s" data-wow-delay="5s">-->
                <!--    <img src="{{asset('/images/ariful-islam.jpg')}}" alt="Ariful Islam - {{ url('/') }}">-->
                <!--    <p>আরিফুল ইসলাম <span>-->
                <!--            <br/> সফটওয়্যার ইঞ্জিনিয়ার-->
                <!--            <br>-->
                <!--            কালিহাতি, টাংগাইল।</span>-->
                <!--    </p>-->
                <!--</div>-->
            </div>
        </div>


    </div>
@endsection

