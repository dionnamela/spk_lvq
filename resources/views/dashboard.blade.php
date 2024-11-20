<x-layout-user>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-4 col-sm-12 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Data Pasien</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $pasiensCount }}
                                    </h5>
                                    <p class="mb-0">
                                        <a href="/data-pasien" class="hover:underline">
                                            <span class="text-sm font-weight-bolder">Lihat Detail</span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-sm-12 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Data Pelatihan</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $datalatihCount }}
                                    </h5>
                                    <p class="mb-0">
                                        <a href="/data-pelatihan" class="hover:underline">
                                            <span class="text-sm font-weight-bolder">Lihat Detail</span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-sm-12 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Akurasi Model LVQ</p>
                                    <h5 class="font-weight-bolder">
                                        @if ($akurasi !== null)
                                            {{ number_format($akurasi, 2) }}%
                                        @else
                                            Tidak Tersedia
                                        @endif
                                    </h5>
                                    <p class="mb-0">
                                        <a href="/data-pelatihan" class="hover:underline">
                                            <span class="text-sm font-weight-bolder">Lihat Detail</span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-chart-bar-32 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout-user>
