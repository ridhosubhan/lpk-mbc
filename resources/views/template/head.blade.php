<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>{{ $title }} - LKP Mulya Bhakti Computer.</title>
<!-- CSS files -->
<link href="{{ asset('assets/css/tabler.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/tabler-flags.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/tabler-payments.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/tabler-vendors.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/demo.min.css') }}" rel="stylesheet" />

<style>
    @import url('https://rsms.me/inter/inter.css');

    :root {
        --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }

    body {
        font-feature-settings: "cv03", "cv04", "cv11";
    }
</style>
