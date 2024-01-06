@include('layouts.header')
@if ($user)
    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">

        <div class="card p-4">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            &nbsp;
            <div class=" image d-flex flex-column justify-content-center align-items-center">
                <button class="btn">
                    <img src="../{{ $user->profile_pic }}" height="100" />
                </button>
                &nbsp;
                <span class="name mt-3"> {{ $user->fname }}</span>
                <span class="idd"> {{ $user->email }}</span>

                <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                    <span class="idd1">
                        &nbsp;
                    </span>
                    <span> {{ $user->phone_number }}</span>

                </div>
                <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                    <span> {{ $user->address }}</span>
                </div>
                <div class="d-flex flex-row justify-content-center align-items-center mt-3">
                    <span class="number">&nbsp;
                        <span class="follow">
                            @if ($user->email_verified_at == null)
                            <a href="{{ route('verification.notice') }}" class="btn "> <button class="btn1 btn-danger">Verify Email</button></a>
                            @else
                                Email Verified
                            @endif
                        </span>
                    </span>
                </div>

                <a href="{{ route('profile.edit') }}" class="btn "> <button class="btn1 btn-dark">Edit
                        Profile</button></a>

                {{-- <div class="text mt-3">
                <span>
                    Eleanor Pena is a creator of minimalistic x bold graphics and digital artwork.<br><br> Artist/ Creative Director by Day #NFT minting@ with FND night.
                </span>
            </div> --}}

                <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center">
                    <span>
                        <i class="fa fa-twitter"></i>
                    </span>
                    <span><i class="fa fa-facebook-f"></i>
                    </span> <span>
                        <i class="fa fa-instagram"></i>
                    </span>
                    <span>
                        <i class="fa fa-linkedin"></i>
                    </span>
                </div>

                &nbsp;
                <div class=" px-2 rounded mt-4 date ">
                    <span class="join">
                        Created At:
                        {{ $user->created_at }}
                    </span>
                </div>
            </div>
        </div>
    </div>
@else
    <p>No user data available.</p>
@endif
@include('layouts.footer')
