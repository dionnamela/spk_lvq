<x-layout-user>
    <x-slot:title>{{ $title }}</x-slot:title>
    <!-- Button dan Modal untuk Tambah Data -->
    <div class="card-header pb-0">
        <h6>Data Pasien</h6>
        <!-- Button untuk membuka modal -->
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
            Tambah Data
        </button>

        <!-- Menampilkan pesan sukses atau error -->
        @if (session('message'))
            <div class="alert alert-{{ session('type') }} text-sm text-white">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Pasien</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form untuk menambah data pasien -->
                    <form action="/simpan-data-pasien" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">Nomor Handphone</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Data Pasien -->
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th style="width: 20px" class="text-center text-uppercase text-xs font-weight-bolder opacity-7">
                            No</th>
                        <th class="text-uppercase text-xs font-weight-bolder opacity-7">Nama</th>
                        <th class="text-uppercase text-xs font-weight-bolder opacity-7">Email</th>
                        <th class="text-uppercase text-xs font-weight-bolder opacity-7">Nomor Handphone</th>
                        <th class="text-uppercase text-xs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasiens as $index => $p)
                        <tr>
                            <th class="text-center text-xs font-weight-bolder opacity-7">{{ $index + 1 }}.</th>
                            <td class="text-xs font-weight-bold">{{ $p->name }}</td>
                            <td class="text-xs font-weight-bold">{{ $p->email }}</td>
                            <td class="text-xs font-weight-bold">{{ $p->no_hp }}</td>
                            <td class="text-xs font-weight-bold">
                                <a href="/edit-data-pasien" class="btn btn-success btn-sm mt-2">Edit</a>

                                <!-- Tombol Hapus dengan konfirmasi -->
                                <form id="delete-form-{{ $p->id }}"
                                    action="{{ route('pasiens.destroy', $p->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm mt-2"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data pasien ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout-user>
