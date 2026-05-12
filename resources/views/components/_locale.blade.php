<form action="{{route('setLocale', $lang)}}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn border-0 w-100 bg-black shadow-none btn-flag">
        <img src="{{asset('vendor/blade-flags/language-' . $lang . '.svg')}}" width="32" height="32" class="d-block mx-auto my-2">
    </button>
</form>