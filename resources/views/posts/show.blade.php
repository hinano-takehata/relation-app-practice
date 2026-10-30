<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>{{ $post->title }}</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        h1 { color: #333; }
        .content { margin: 20px 0; line-height: 1.8; }
        .tags { margin: 20px 0; }
        .tag { display: inline-block; background: #e9ecef; padding: 3px 8px; border-radius: 3px; margin-right: 5px; font-size: 12px; }
        .comments { margin-top: 30px; }
        .comment { border: 1px solid #ddd; padding: 10px; margin-bottom: 10px; border-radius: 5px; background: #f8f9fa; }
        .comment-date { color: #666; font-size: 12px; }
        .back { margin-top: 20px; }
        .back a { color: #007bff; }
    </style>
</head>
<body>
    <h1>{{ $post->title }}</h1>

    <div class="tags">
        @foreach ($post->tags as $tag)
            <span class="tag">{{ $tag->name }}</span>
        @endforeach
    </div>

    <div class="content">
        {{ $post->content }}
    </div>

    <div class="comments">
        <h2>コメント（{{ $post->comments->count() }}件）</h2>
        @forelse ($post->comments as $comment)
            <div class="comment">
                <p>{{ $comment->body }}</p>
                <div class="comment-date">{{ $comment->created_at->format('Y/m/d H:i') }}</div>
            </div>
        @empty
            <p>コメントはまだありません。</p>
        @endforelse
    </div>

    <div class="back">
        <a href="/posts">← 一覧に戻る</a>
    </div>
</body>
</html>
