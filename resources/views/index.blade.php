<x-layout>
    <x-slot name="title">
        My Training Report
    </x-slot>

    <h1>My Training Report</h1>
    <p>トレーニング部位・種目を入力してください。</p>
    <form method="post" action="{{ route('posts.store') }}" class="input-form" enctype="multipart/form-data">
        @csrf

        <input type="text" name="part" value="{{ old('part') }}" placeholder="部位">
        <input type="text" name="event" value="{{ old('event') }}" placeholder="種目">
        <button>追加</button>
        @error('part')
            <div class="error">{{ $message }}</div>
        @enderror
        @error('event')
            <div class="error">{{ $message }}</div>
        @enderror
    </form>
    <ul>
        @forelse ($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post) }}">
                    {{ substr($post->created_at, 0, 10) }} {{ $post->part }} {{ $post->event }}
                </a>
            </li>
        @empty
            <li>まだ投稿はありません。</li>
        @endforelse
    </ul>
</x-layout>
