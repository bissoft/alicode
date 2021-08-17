<div id="preloader">
    <div class="preload-content">
        <div id="dream-load"></div>
    </div>
</div>

<!-- ##### Welcome Area Start ##### -->
<section class="top-bar container-fluid">
    <div class="row ">
    <div class="col-12 col-md-6 ">
        <h5 class="text-white pl-md-3">
        Powerd By SWL(Lets Lead)
    </h5>
    </div>
     <div class="col-12 col-md-6 text-center text-md-right">
        <a href="#" class="text-white mr-3"><i class="fa fa-user-plus"></i> join</a>
        @if(empty(Auth::check()))

            <a href="{{url('/login-register')}}" class="text-white mr-3"> <i class="fas fa-sign-in-alt"></i> Login</a>
        @else
        <a href="{{url('/user-logout')}}" class="text-white mr-3"> <i class="fas fa-sign-in-alt"></i> LogOut</a>
        @endif
     </div>
    </div>
</section>
