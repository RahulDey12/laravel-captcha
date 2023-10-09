# Upgrade Guide

## Upgrading to 2.0 from 1.x

### Minimum Versions

The following requirement has been updated:

- The minimum PHP version is now `v8.0`
- The minimum Laravel version is now `v8.0.0`

### Updating Dependencies

You should update the following dependency in your application's `composer.json` file:

```diff
-   "rahul900day/laravel-captcha": "^1.2"
+   "rahul900day/laravel-captcha": "^2.0"
```

### Updating blade directives

From version 2 onwards we moved from blade directives to [laravel components](https://laravel.com/docs/10.x/blade#components),
so replace all of your blade directives with components.

```diff
-   @captcha_js
+   <x-captcha-js />
```

```diff
-   @captcha_container
+   <x-captcha-container />
```

### Updating captcha driver (optional)

So we have updated our diver resolution technique, so we encourage developers to update there captcha driver names.

> **[NOTE]** Previous diver names are fine, you can still use it as it is.

#### Previously supported divers

- turnstile
- hCaptcha
- reCaptcha

#### Currently supported drivers

- turnstile
- hcaptcha
- recaptcha
