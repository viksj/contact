<x-mail::message>
# Introduction

There is new query from {{ __($customer_name) }}
Message:
{{ __($message) }}

<x-mail::button :url="config('app.url')">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
