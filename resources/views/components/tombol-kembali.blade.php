<a {{ $attributes->merge(['class' => 'btn btn-outline-secondary']) }}>
    {{ $slot->isNotEmpty() ? $slot : 'Kembali' }}
</a>
