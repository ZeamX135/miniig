@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <h3>Feed</h3>
                        @foreach ($posts as $post)
                            <div>
                                <img src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->caption }}"
                                    style="object-fit: cover;width: 200px; height: 200px"
                                    ondblclick="like({{ $post->id }})" />

                                <a href="/{{ '@' . $post->user->username }}">{{ '@' . $post->user->username }}</a>

                                <button class="btn btn-primary" onclick="like({{ $post->id }})"
                                    id="post-btn-{{ $post->id }}">
                                    {{ $post->is_liked() ? 'unlike' : 'like' }}
                                </button>

                                <script>
                                    function like(id) {
                                        const el = document.getElementById('post-btn-' + id);
                                        fetch('/like/' + id)
                                            .then(response => response.json())
                                            .then(data => {
                                                el.innerText = (data.status == 'LIKE') ? 'unlike' : 'like'
                                            });
                                    }
                                </script>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
