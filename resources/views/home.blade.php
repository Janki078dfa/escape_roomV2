@include('layout.header')
<div class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            @if(isset($user->name))
                <h1 class="display-4 fw-bolder">Welcome back, {{ $user->name }}</h1>
            @else
                <h1 class="display-4 fw-bolder"><a href="/login">LogIn here!</a></h1>
            @endif

            <p class="lead fw-normal text-white-50 mb-0">Book your escape room here!</p>
        </div>
    </div>
</div>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <!-- Games foreach -->
            @forelse($games as $g)
                <div class="col mb-5 w-75 h-50">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img style="object-fit: cover; height: 500px" class="card-img-top"
                             src="/storage/images/{{ $g->image }}" alt="Game image"/>
                        <!-- Product details-->
                        <div class="card-body p-5" style="height: 250px">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{ $g->name }}</h5>
                                <!-- Product price-->
                                Total players: {{ $g->players }}
                                <br>
                                Available:
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h1>No games available!</h1>
            @endforelse
        </div>
    </div>
</section>
@include('layout.footer')