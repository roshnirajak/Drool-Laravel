@include('layouts.header')
<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class="mb-3">
            <h5>Admin Panel>> Add Food Details</h5>
        </div>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                {{ $error }}
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('addFood') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="fname" class="form-label">Food Name</label>
                <input type="text" class="form-control" id="fname" name="fname" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="text" class="form-control" id="quantity" name="quantity" required>
            </div>

            <div class="mb-3">
                <label for="about" class="form-label">About</label>
                <textarea class="form-control" id="about" name="about" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="animal" class="form-label">Animal</label>
                <input type="text" class="form-control" id="animal" name="animal" required>
            </div>

            <div class="mb-3">
                <label for="food_pic" class="form-label">Food Picture</label>
                <input type="file" class="form-control" id="food_pic" name="food_pic" onchange="previewImage(this)" required>
                <img id="food_pic_preview" class="img-fluid mt-2" style="display: none;" alt="Food Preview">
            </div>

            <div class="mb-3">
                <label for="seller" class="form-label">Seller</label>
                <input type="text" class="form-control" id="seller" name="seller" required>
            </div>

            <button type="submit" name="addFoodBtn" class="btn btn-primary">Submit</button>
        </form>

        <br>
    </div>
</div>

<script>
    function previewImage(input) {
        var preview = document.getElementById('food_pic_preview');
        var file = input.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }

</script>

@include('layouts.footer')
