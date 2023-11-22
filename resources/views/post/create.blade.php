@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload Postingan</div>
                    <h2></h2>
                    <div class="card-body">
                        <form method="POST" action="/post" enctype="multipart/form-data">
                            @csrf

                            <x-fileupload name="image" />
                            <x-textarea name="caption" label="Caption Kamu" />

                            <x-submitbtn text="Upload" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
