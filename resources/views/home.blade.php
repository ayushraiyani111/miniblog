<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Blog</title>
</head>
<body style="margin: 0; font-family: Arial, sans-serif; background-color: #1a1a2e; color: #ffffff;">

    <!-- Header -->
    <div style="background-color: #b33030; padding: 20px;">
        <h1 style="margin: 0; color: #ffffff;">Mini Blog</h1>
        <div style="float: right;">
            @if (Auth::check())
                
                    @csrf
                    
                    <button type="submit" style="background: none; border: none; color: #ffffff; cursor: pointer; padding: 0; margin-right: 15px;">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" style="color: #ffffff; margin-right: 15px;">Log in</a>
                <a href="{{ route('register') }}" style="color: #ffffff;">Register</a>
            @endif
        </div>
    </div>

    <!-- Blog Content -->
    <div style="padding: 20px;">
        @foreach($posts as $post)
            <div style="background-color: #2a2a4e; padding: 15px; margin-bottom: 10px;">
                <h2 style="margin: 0;">{{ $post->title }}</h2>
                <p style="margin: 5px 0;">{{ $post->body }}</p>
                <small style="color: #cccccc;">by {{ $post->author }}</small>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div style="text-align: center; padding: 10px;">
        <span style="color: #999;">Showing {{ $posts->firstItem() }} to {{ $posts->lastItem() }} of {{ $posts->total() }} results</span>
        <br>
        {{ $posts->links() }}
    </div>

</body>
</html>
