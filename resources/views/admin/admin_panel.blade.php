@include('layouts.header')
<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class="mb-3">
            <h3>Admin Panel</h3>
        </div>
        <div class="mb-3">
            <a href="{{route('addFoodForm')}}"><button class="btn btn-primary">Enter Food Details</button></a>
        </div>

        <div class="mb-3">
        <a href="{{route('showUserDetails')}}"><button class="btn btn-primary">View User Details</button></a>
        </div>
        <br>
        

    </div>
</div>

@include('layouts.footer')
