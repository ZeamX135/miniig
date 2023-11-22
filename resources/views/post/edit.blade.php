@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Postingan</div>
                    <h2></h2>
                    <div class="card-body">
                        <form method="POST" action="/post/{{ $post->id }}">
                            @csrf
                            @method('PUT')

                            <img src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->caption }}"
                                style="object-fit: cover;width: 200px; height: 200px" />

                            <x-textarea name="caption" label="Caption Kamu" :object="$post" />

                            <x-submitbtn text="Update" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
