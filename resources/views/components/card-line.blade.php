@props(['name', 'slot' => '-'])

<div class="card-line">
    <label class="text-muted">{{ __("messages.label.{$name}") }}<x-slot name="suppText"></x-slot></label>
    <span>{{ $slot }}</span>
</div>
