<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投稿一覧</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        h1 { color: #333; }
        .post { border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 5px; }
        .post h2 { margin: 0 0 10px 0; }
        .post h2 a { text-decoration: none; color: #007bff; }
        .meta { color: #666; font-size: 14px; margin-bottom: 10px; }
        .tags { margin-top: 10px; }
        .tag { display: inline-block; background: #e9ecef; padding: 3px 8px; border-radius: 3px; margin-right: 5px; font-size: 12px; text-decoration: none; color: #333; }
        .tag:hover { background: #dee2e6; }
        .filter { margin-bottom: 20px; padding: 10px; background: #f8f9fa; border-radius: 5px; }
        .filter a { margin-left: 10px; }
    </style>
</head>
<body>
    <h1>投稿一覧</h1>

    @if(request('tag'))
        <div class="filter">
            タグ「{{ request('tag') }}」で絞り込み中
            <a href="/posts">絞り込み解除</a>
        </div>
    @endif

    <p>全{{ count($posts) }}件の投稿があります。</p>

    @foreach ($posts as $post)
        <div class="post">
            <h2><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
            <div class="meta">
                コメント: {{ $post->comments_count }}件
            </div>
            <div class="tags">
                @foreach ($post->tags as $tag)
                    <a href="/posts?tag={{ $tag->name }}" class="tag">{{ $tag->name }}</a>
                @endforeach
            </div>
        </div>
    @endforeach
</body>
</html>
