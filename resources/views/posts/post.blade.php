<div class = "blog-post"> 
  <h2 class="blog-post-title"><a href="/posts/{{ $post->id }}"> {{ $post->title }}</h2> 
 
  <p class="blog-post-meta">{{ $post->user->name }} on {{ $post->created_at->toFormattedDateString() }}</p> 
 
  <!-- format date cari di carbon.nesbot.com --> 
 
  {{ $post->body }} 
 
</div> 