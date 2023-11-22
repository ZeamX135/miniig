@php
    $avatar_url = $user->avatar ? asset('images/avatar/' . $user->avatar) : 'https://ui-avatars.com/api/?size=128&name=' . $user->username;
@endphp

<img src="{{ $avatar_url }}" class="rounded-circle" alt="Foto Profil {{ $user->username }}" width="128">
