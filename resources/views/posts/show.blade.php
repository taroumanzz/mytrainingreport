<x-layout>
    <x-slot name="title">
        {{ $post->created_at }} {{ $post->part }}
    </x-slot>

    <div class="back-link">
        &laquo; <a href="{{ route('posts.index') }}">Back</a>
    </div>

    <h1>{{ $post->created_at }} {{ $post->part }}</h1>
    <section>
        <h2>内容</h2>
        <form method="post" action="{{ route('contents.store', $post) }}" class="input-form" enctype="multipart/form-data">
            @csrf

            <input type="text" name="weight" placeholder="重量"> kg x
            <input type="text" name="freq" placeholder="回数"> 回
            <button>追加</button>
            @error('weight')
            <div class="error">{{ $message }}</div>
            @enderror
            @error('freq')
            <div class="error">{{ $message }}</div>
            @enderror
        </form>
        <ul>
            @forelse ($post->contents as $content)
            <li>
                {{ $content->weight }} kg x {{ $content->freq }} 回
                <form method="post" action="{{ route('contents.destroy', $content) }}" class="delete-btn">
                    @method('DELETE')
                    @csrf

                    <button class="btn">削除</button>
                </form>
            </li>
            @empty
            <li>まだ記録はありません。</li>
            @endforelse
        </ul>
    </section>

    <script>
        'use strict';

        {
            document.querySelectorAll('.delete-btn').forEach(form => {
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
