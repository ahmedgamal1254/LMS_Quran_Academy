<h3>Teacher dashboard</h3>
<p>Hello Mr {{ Auth::guard('teacher')->user()->name }}</p>

<form action="{{ route("logout_teacher") }}" method="post">
    @csrf
    <button type="submit" class="btn btn-primary">Log out</button>
</form>