<x-layout-user>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="card-header pb-0">
        <h6>Data Pasien</h6>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th style="width: 20px" class=" text-center text-uppercase  text-xs font-weight-bolder opacity-7">
                            No</th>
                        <th class="text-uppercase  text-xs font-weight-bolder opacity-7">Nama</th>
                        <th class="text-uppercase  text-xs font-weight-bolder opacity-7">Email</th>
                        <th class="text-uppercase  text-xs font-weight-bolder opacity-7">Nomor Handphone
                        </th>
                        <th class="text-uppercase  text-xs font-weight-bolder opacity-7">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasiens as $index => $p)
                        <tr>
                            <th class="text-center text-xs font-weight-bolder opacity-7">
                                {{ $index + 1 }}.
                            </th>
                            <td class="text-xs font-weight-bold">{{ $p->name }}</td>
                            <td class="text-xs font-weight-bold">{{ $p->email }}</td>
                            <td class="text-xs font-weight-bold">{{ $p->no_hp }}</td>
                            <td class="text-xs font-weight-bold">
                                <a href="/edit-data-pasien" class="btn btn-success btn-sm mt-2">Edit</a>
                                <a href="/edit-data-pasien" class="btn btn-danger btn-sm mt-2">Hapus</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</x-layout-user>
