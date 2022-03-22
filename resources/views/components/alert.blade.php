@if ($errors->any())
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
@if (session('success'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success">
                <p>{{ session('success') }}</p>
            </div>
        </div>
    </div>
@endif