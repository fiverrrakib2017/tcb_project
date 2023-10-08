@extends('public.app')
@section('title', 'টিসিবি ম্যানেজমেন্ট সিস্টেম - VGD Management System')
@section('content')

    <div class="container bg-white">
        <div class="row">
            <div class="col-md-9 mt-1">
                <div class="pm">
                    <a href="https://www.youtube.com/watch?v=v1R-CB3e-pw" target="_blank" title="শেখ হাসিনা">
                        <img src="{{asset('images/National-Portal-Card-PM.jpeg')}}" alt="National-Portal-Card-PM">
                    </a>
                </div>

                <div class="scroll">
                    <h3>
{{--                        <marquee direction="left" scrollamount="4" onmouseover="this.stop()" onmouseout="this.start()">--}}
{{--                            নো মাস্ক নো সার্ভিস। করোনাভাইরাসের বিস্তার রোধে এখনই ডাউনলোড করুন Corona Tracer BD অ্যাপ।--}}
{{--                            ডাউনলোড করতে ক্লিক করুন <a href="https://bit.ly/coronatracerbd" target="_blank"--}}
{{--                                                       style="color: blue;" title="https://bit.ly/coronatracerbd">https://bit.ly/coronatracerbd</a>।--}}
{{--                            নিজে সুরক্ষিত থাকুন অন্যকেও নিরাপদ রাখুন। দেশের প্রথম ক্রাউডফান্ডিং প্ল্যাটফর্ম 'একদেশ'- এর--}}
{{--                            মাধ্যমে আর্থিক অনুদান পৌঁছে দিন নির্বাচিত সরকারি-বেসরকারি প্রতিষ্ঠানসমূহে। ভিজিট করুন <a--}}
{{--                                href="//ekdesh.ekpay.gov.bd" target="_blank" style="color: blue;"--}}
{{--                                title="ekdesh.ekpay.gov.bd">ekdesh.ekpay.gov.bd</a> অথবা <a--}}
{{--                                href="//play.google.com/store/apps/details?id=com.synesis.donationapp" target="_blank"--}}
{{--                                style="color: blue;" title="“Ek Desh”">“Ek Desh”</a> অ্যাপ ডাউনলোড করুন। করোনার লক্ষণ--}}
{{--                            দেখা দিলে গোপন না করে ডাক্তারের পরামর্শের জন্য ফ্রি কল করুন ৩৩৩ ও ১৬২৬৩ নম্বরে। করোনাভাইরাস--}}
{{--                            প্রতিরোধে নিয়ম মেনে মাস্ক ব্যবহার করুন। আতঙ্কিত না হয়ে বরং সচেতন থাকুন। ভিজিট করুন <a--}}
{{--                                href="//corona.gov.bd" target="_blank" style="color: blue;" title="corona.gov.bd">corona.gov.bd</a>--}}
{{--                        </marquee>--}}
                        <marquee direction="left" scrollamount="4" onmouseover="this.stop()" onmouseout="this.start()">
                            <p><span style="font-size:22px"><strong style="color: black;">  জামালপুর জেলা টিসিবি উপকারভোগী অনলাইন সফটওয়্যার এর মাধ্যমে পন্য বিতরণ কার্যক্রম শুরু হয়েছে।</strong></span></p></marquee>
                    </h3>
                </div>
            </div>

            <div class="col-md-3 text-center">
                <div class="porikolpona-head mb-2 mt-2 animated fadeInDown" data-wow-duration="2s" data-wow-delay="5s">
                    <img src="{{asset('/images/dc.jpeg')}}" alt="কামরুজ্জামান {{ url('/') }}">
                </div>
                <div class="single-team-item animated fadeInDown" data-wow-duration="2s" data-wow-delay="5s">
                    <p>শ্রাবস্তী রায় <br> জেলা প্রশাসক ও জেলা ম্যাজিস্ট্রেট <br> জামালপুর </p>
                </div>
                
               <div class="porikolpona-head mb-2 mt-5 animated fadeInDown" data-wow-duration="2s" data-wow-delay="5s">
                    <h5>পরিকল্পনায়</h5>
                    <img src="{{asset('/images/chairman.jpg')}}" alt="ইন্জিঃ মোঃ কামরুজ্জামান {{ url('/') }}">
                </div>
                <div class="single-team-item animated fadeInDown" data-wow-duration="2s" data-wow-delay="5s">
                    <p>ইন্জিঃ মোঃ কামরুজ্জামান <br> উপজেলা চেয়ারম্যান <br> মেলান্দহ জামালপুর </p>
                </div>

                <div class="porikolpona-head mb-2 mt-5 animated fadeInUp" data-wow-duration="2s" data-wow-delay="5s">
                   
                    <img src="{{asset('/images/uno.png')}}" alt="তামিম আল ইয়ামীন {{ url('/') }}">
                </div>
                <div class="single-team-item animated fadeInUp" data-wow-duration="2s" data-wow-delay="5s">
                    <p>মোঃ সেলিম মিঞা <br> উপজেলা নির্বাহী অফিসার <br> মেলান্দহ জামালপুর </p>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-9">
                <h2 class="animated fadeInUp">জামালপুর জেলা মেলান্দহ উপজেলা টিসিবি উপকারভোগী</h2>
                <div class="table-wrapper">
                    <table class="fl-table">
                        <thead>
                        <tr>
                            <th>ইউনিয়নের নাম</th>
                            <th>টিসিবি</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td>দুরমুঠ</td>
                            <td>1640</td>
                        </tr>
                        <tr>
                            <td>কুলিয়া</td>
                            <td>1830</td>
                        </tr>
                        <tr>
                            <td>মাহমুদপুর</td>
                            <td>2730</td>
                        </tr>
                        <tr>
                            <td>নাংলা</td>
                            <td>1740</td>
                        </tr>
                        <tr>
                            <td>নয়ানগর</td>
                            <td>1720</td>
                        </tr>
                        <tr>
                            <td>আদ্রা</td>
                            <td>1680</td>
                        </tr>
                        <tr>
                            <td>চরবানিপাকুরিয়া</td>
                            <td>2380</td>
                        </tr>
                        <tr>
                            <td>ফুলকোচা</td>
                            <td>1900</td>
                        </tr>
                        <tr>
                            <td>ঘোষেরপাড়া</td>
                            <td>2600</td>
                        </tr>
                        <tr>
                            <td>ঝাউগড়া</td>
                            <td>2230</td>
                        </tr>
                        <tr>
                            <td>শ্যামপুর</td>
                            <td>1120</td>
                        </tr>
                        
                        <tr>
                            <td>মেলান্দহ পৌরসভা</td>
                            <td>2119</td>
                        </tr>
                        
                        <tr>
                            <td>হাজরাবাড়ী পৌরসভা</td>
                            <td>1927</td>
                        </tr>
                        <tr>
                            <td>মোট</td>
                            <td>25616</td>
                        </tr>
                        <tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-3 text-center">
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

               
            </div>
        </div>


    </div>
@endsection

