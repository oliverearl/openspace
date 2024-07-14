<aside class="blog-preview col">
    <h4>Your latest blog entries [<a href="">New entry</a>]</h4>
    @forelse($posts as $post)
        <p>
            {{ Str::limit($post->title, 20) }}
            (<a href="">View more</a>)
        </p>
    @empty
        <p>
            <em>There are no blog entries yet.</em>
        </p>
    @endforelse
</aside>
