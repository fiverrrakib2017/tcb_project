<div class="leftpanel">
    <div class="media profile-left">
        <a class="pull-left profile-thumb" href="{{route('admin.dashboard')}}">
            <img class="img-circle" src="{{asset('asset/backend/images/photos/profile.png')}}" height="50" alt="Profile Image">
        </a>
        <div class="media-body">
           <h4 class="media-heading">{{Auth::user()->name}}</h4>

           @if (Auth::user()->user_type==1)
                <small class="text-muted">অ্যাডমিন</small>
            @elseif(Auth::user()->user_type==2)
            <small class="text-muted">BDDD</small>
           @endif
           


        </div>
    </div><!-- media -->


    <ul class="custom-menu">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> <span>ড্যাশবোর্ড</span></a></li>
        <li><a href="{{route('admin.division.list')}}" class="active-button"><i class="fa fa-list"></i> <span>বিভাগ তালিকা</span></a></li>
        <li><a href="{{route('admin.zila.list')}}"><i class="fa fa-list"></i> <span>জেলা তালিকা</span></a></li>
        <li><a href="{{route('admin.upzila.list')}}"><i class="fa fa-list"></i> <span>উপজেলা তালিকা</span></a></li>
        <li><a href="{{route('admin.union.list')}}"><i class="fa fa-list"></i> <span>ইউনিয়ন তালিকা</span></a></li>
        <li><a href="{{route('admin.village.list')}}"><i class="fa fa-list"></i> <span>গ্রাম তালিকা</span></a></li>
        <li><a href="{{route('admin.vatar.list')}}"><i class="fa fa-list"></i> <span>ভাতার তালিকা</span></a></li>
        <li><a href="{{route('admin.dealer.list')}}"> <i class="fa fa-list"></i> ডিলার তালিকা</a></li>
        <li><a href="{{route('admin.beneficiries.add')}}"> <i class="fa fa-plus"></i> টিসিবি উপকারভোগী যুক্ত করুন</a></li>
        <li><a href="#"> <i class="fa fa-upload"></i> উপকারভোগী আপলোড</a></li>
        <li><a href="#"> <i class="fa fa-share-square-o"></i> উপকারভোগী পণ্য প্রদান করুন</a></li>
        <li><a href="{{route('admin.beneficiries.list')}}"> <i class="fa fa-list"></i> উপকারভোগী তালিকা</a></li>
      


        <li><a href="{{route('admin.stock.list')}}"><i class="fa fa-pencil"></i> গুদামে পণ্য মজুদ করুন</a></li>
        <li><a href="{{route('admin.users.list')}}"> <i class="fa fa-users"></i> ইউজার তালিকা</a></li>
        <li><a href="#"> <i class="fa fa-folder-open"></i> প্রতিবেদন দেখুন</a></li>
       <li><a href="#"> <i class="fa fa-envelope"></i> ফ্যামিলি কার্ড অপশন</a></li>
    </ul>

</div><!-- leftpanel -->
