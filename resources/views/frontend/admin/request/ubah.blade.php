@extends('layouts.sidebar')

@section('content')
@livewireStyles

<body class="app">
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                @livewire('admin.request.edit', ['reqorder_id' => $request->id])
            </div>
            <!--//container-fluid-->
        </div>
        <!--//app-content-->

        <footer class="app-footer">
            <div class="container text-center py-3">
                <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
                <small class="copyright">copyright Marahobina &copy; {{ date('Y') }}</small>

            </div>
        </footer>
        <!--//app-footer-->

    </div>
    @livewireScripts
</body>
@endsection