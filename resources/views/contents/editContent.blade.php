<x-layout>
    <x-slot name="title">
        編集 - {{ $content->created_at }} {{ $content->part }}
    </x-slot>

    <div class="back-link">
        &laquo; <a href="{{ route('posts.show', $content->post) }}">Back</a>
    </div>

    <section>
        <h2>内容を再入力</h2>
        <form method="post" action="{{ route('contents.update', $content) }}" class="input-form" enctype="multipart/form-data">
            @METHOD('PATCH')
            @csrf

            <input type="text" name="weight" value="{{ old('weight', $content->weight) }}" placeholder="重量" inputmode="numeric"> kg x
            <input type="text" name="freq" value="{{ old('freq', $content->freq) }}" placeholder="回数" inputmode="numeric"> 回
            <button>変更</button>
            @error('weight')
            <div class="error">{{ $message }}</div>
            @enderror
            @error('freq')
            <div class="error">{{ $message }}</div>
            @enderror
        </form>
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
