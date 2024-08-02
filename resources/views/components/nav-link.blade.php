<a
{{ $attributes }}
href="/" class="{{ $active ? 'btn btn-light text-black ':'nav-link active'}}" aria-current="{{ $active ?'page':false}}">
 {{ $slot }}
</a>