<h3>partents dashboard</h3>
<p>Hello Mr {{ Auth::guard('partent')->user()->name }}</p>

<form action="{{ route("logout_partent") }}" method="post">
    @csrf
    <button type="submit" class="btn btn-primary">Log out</button>
</form>