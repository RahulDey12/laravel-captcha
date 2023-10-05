<button {{ $attributes->merge([
    'class' => $containerClass,
    'data-sitekey' => $site_key,
    'data-callback' => $callback
]) }}>
    {{ $slot }}
</button>

@if(! $attributes->has('data-callback') && ! $has_custom_callback )
    <script>
        function onCaptchaSubmit_{{$nonce}}() {
            document.querySelector('#{{$formId}}').submit();
        }
    </script>
@endif
