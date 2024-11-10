<x-header-user></x-header-user>
<x-sidebar-user>{{ $title }}</x-sidebar-user>
<x-sweet-alert></x-sweet-alert>
<div class="container-fluid py-4">
    <div class="row">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">

                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
<x-footer-user></x-footer-user>
