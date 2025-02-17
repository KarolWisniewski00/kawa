<form action="{!! $url !!}" {!! $attributes !!} class=" w-100">
    @csrf
    <button type="submit" class="btn btn-primary w-100">
        <span class="{!! $basename !!}__label">{{ $label }}</span>
    </button>
</form>
