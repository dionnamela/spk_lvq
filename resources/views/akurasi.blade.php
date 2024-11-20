<x-layout-user>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Akurasi</h6>
                    </div>
                    <div class="card-body">
                        {{-- @if ($akurasi < 60)
                        @else
                            {{ $akurasi }} %
                            @endif --}}
                        {{ $akurasi }} %
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout-user>
