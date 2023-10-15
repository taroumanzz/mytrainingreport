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
        <button class="addBtn">追加</button>
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
            <div class="btn-container">
            <form method="get" action="{{ route('posts.editPost', $post) }}" class="updateBtn">
                <button>編集</button>
            </form>
            <form method="post" action="{{ route('posts.destroy', $post) }}" class="updateBtn" id="delete-btn">
                @method('DELETE')
                @csrf

                <button>削除</button>
            </form>
            </div>
        @empty
            <li>まだ投稿はありません。</li>
        @endforelse
    </ul>

    <script>
        'use strict';

        {
            document.querySelectorAll('#delete-btn').forEach(form => {
                form.addEventListener('submit', e => {
                    e.preventDefault();

                    if (!confirm('削除しますか？')) {
                        return;
                    }

                    form.submit();
                });
            });
        }
    </script>
</x-layout>
