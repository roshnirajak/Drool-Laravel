@include('layouts.header')

<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                {{ $error }}
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
            <h3>Edit Profile</h3><br>
            @csrf
            @method('PATCH') <!-- Use PATCH method for updating records -->

            <div class="mb-3">
                <label for="fname" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fname" name="fname" value="{{ $user->fname }}">
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $user->phone_number }}">
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
            </div>

            <div class="mb-3">
                <label for="profile_pic" class="form-label">Profile Picture</label>
                <input type="file" class="form-control" id="profile_pic" name="profile_pic" onchange="previewImage(this)">
                <img id="profile_pic_preview" class="img-fluid mt-2" style="display: none;" height="200px" alt="Profile Preview">
            </div>

            <button type="submit" class="btn1 btn-success">Save Changes</button>
        </form>
    </div>
</div>
<script>
    function previewImage(input) {
        var preview = document.getElementById('profile_pic_preview');
        var file = input.files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
@include('layouts.footer')