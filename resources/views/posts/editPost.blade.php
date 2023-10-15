<x-layout>
    <x-slot name="title">
        編集 - {{ $post->created_at }} {{ $post->part }}
    </x-slot>

    <div class="back-link">
        &laquo; <a href="{{ route('posts.index') }}">Back</a>
    </div>

    <p>トレーニング部位・種目を再入力してください。</p>
    <form method="post" action="{{ route('posts.update', $post) }}" class="input-form" enctype="multipart/form-data">
        @METHOD('PATCH')
        @csrf

        <input type="text" name="part" value="{{ old('part', $post->part) }}" placeholder="部位">
        <input type="text" name="event" value="{{ old('event', $post->event) }}" placeholder="種目">
        <button>変更</button>
        @error('part')
            <div class="error">{{ $message }}</div>
        @enderror
        @error('event')
            <div class="error">{{ $message }}</div>
        @enderror
    </form>
</x-layout>
