<button {{ $attributes->merge([
    'class' => $containerClass,
    'data-sitekey' => $sitekey,
    'data-callback' => $callback
]) }}>
    {{ $slot }}
</button>

<script>
    function onCaptchaSubmit_{{$nonce}}() {
        document.querySelector('#{{$formId}}').submit();
    }
</script>
