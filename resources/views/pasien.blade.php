<x-layout-user>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Data Pasien</h6>
                        <div class="d-flex justify-content-between">
                            <div>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#tambahDataModal">
                                    Tambah Data
                                </button>
                            </div>
                            <div>
                                {{ $pasiens->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Pelatihan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/simpan-data-pasien" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="glukosa_darah_sewaktu" class="form-label">Glukosa Darah
                                                Sewaktu (mg/dl)</label>
                                            <input type="number" class="form-control" id="glukosa_darah_sewaktu"
                                                name="glukosa_darah_sewaktu" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="glukosa_darah_puasa" class="form-label">Glukosa Darah
                                                Puasa (mg/dl)</label>
                                            <input type="number" class="form-control" id="glukosa_darah_puasa"
                                                name="glukosa_darah_puasa" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="glukosa_dua_jam" class="form-label">Glukosa Darah Dua
                                                Jam (mg/dl)</label>
                                            <input type="number" class="form-control" id="glukosa_dua_jam"
                                                name="glukosa_dua_jam" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="hba1c" class="form-label">HBA1C (%)</label>
                                            <input type="text" class="form-control" id="hba1c" name="hba1c"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="usia" class="form-label">Usia</label>
                                            <input type="number" class="form-control" id="usia" name="usia"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="kecepatan_gejala" class="form-label">Kecepatan Gejala</label>
                                            <select class="form-control" name="kecepatan_gejala" id="kecepatan_gejala">
                                                <option value="">Pilih Kecepatan Gejala</option>
                                                <option value="0">Lambat</option>
                                                <option value="1">Cepat</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="riwayat_keluarga" class="form-label">Riwayat Keluarga</label>
                                            <select class="form-control" name="riwayat_keluarga" id="riwayat_keluarga">
                                                <option value="">Pilih Riwayat Gejala</option>
                                                <option value="0">Tidak</option>
                                                <option value="1">Ya</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="berat_badan" class="form-label">Berat Badan</label>
                                            <input type="number" class="form-control" id="berat_badan"
                                                name="berat_badan" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="0">Laki-laki</option>
                                                <option value="1">Perempuan</option>
                                            </select>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table table-striped align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 20px"
                                            class="text-center text-uppercase text-xs font-weight-bolder opacity-7">
                                            No</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-7">Nama</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-7">Glukosa Darah
                                            Sewaktu</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-7">Glukosa Darah
                                            Puasa</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-7">Glukosa Dua Jam
                                        </th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-7">HBA1C</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-7">Usia</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-7">Kecepatan
                                            Gejala</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-7">Riwayat
                                            Keluarga</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-7">Berat Badan
                                        </th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-7">Jenis Kelamin
                                        </th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-7">Tipe Diabetes
                                        </th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-7">Ditambahkan
                                            pada</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-7">Diubah pada
                                        </th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-7">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tbody>
                                    @foreach ($pasiens->items() as $index => $pasien)
                                        <div class="modal fade" id="editModal-{{ $pasien->id }}" tabindex="-1"
                                            aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Edit Data Pasien
                                                        </h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('pasiens.update', $pasien->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <input type="hidden" name="id"
                                                                value="{{ $pasien->id }}">
                                                            <div class="form-group">
                                                                <label for="name">Nama</label>
                                                                <input type="text" name="name"
                                                                    class="form-control" id="name"
                                                                    value="{{ $pasien->name }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="glukosa_darah_sewaktu">Glukosa Darah
                                                                    Sewaktu (mg/dl)</label>
                                                                <input type="number" name="glukosa_darah_sewaktu"
                                                                    class="form-control" id="glukosa_darah_sewaktu"
                                                                    value="{{ $pasien->glukosa_darah_sewaktu }}"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="glukosa_darah_puasa">Glukosa Darah
                                                                    Puasa (mg/dl)</label>
                                                                <input type="number" name="glukosa_darah_puasa"
                                                                    class="form-control" id="glukosa_darah_puasa"
                                                                    value="{{ $pasien->glukosa_darah_puasa }}"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="glukosa_dua_jam">Glukosa Dua Jam
                                                                    (mg/dl)
                                                                </label>
                                                                <input type="number" name="glukosa_dua_jam"
                                                                    class="form-control" id="glukosa_dua_jam"
                                                                    value="{{ $pasien->glukosa_dua_jam }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="hba1c">HBA1C (%)</label>
                                                                <input type="text" name="hba1c"
                                                                    class="form-control" id="hba1c"
                                                                    value="{{ $pasien->hba1c }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="usia">Usia</label>
                                                                <input type="number" name="usia"
                                                                    class="form-control" id="usia"
                                                                    value="{{ $pasien->usia }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="kecepatan_gejala">Kecepatan Gejala</label>
                                                                <select name="kecepatan_gejala" id="kecepatan_gejala"
                                                                    class="form-control">
                                                                    <option value="0"
                                                                        {{ $pasien->kecepatan_gejala == '0' ? 'selected' : '' }}>
                                                                        Lambat</option>
                                                                    <option value="1"
                                                                        {{ $pasien->kecepatan_gejala == '1' ? 'selected' : '' }}>
                                                                        Cepat</option>
                                                                </select>

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="riwayat_keluarga">Riwayat Keluarga</label>
                                                                <select name="riwayat_keluarga" id="riwayat_keluarga"
                                                                    class="form-control">
                                                                    <option value="0"
                                                                        {{ $pasien->riwayat_keluarga == '0' ? 'selected' : '' }}>
                                                                        Tidak</option>
                                                                    <option value="1"
                                                                        {{ $pasien->riwayat_keluarga == '1' ? 'selected' : '' }}>
                                                                        Ya</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="berat_badan">Berat Badan</label>
                                                                <input type="number" name="berat_badan"
                                                                    class="form-control" id="berat_badan"
                                                                    value="{{ $pasien->berat_badan }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                                <select name="jenis_kelamin" id="jenis_kelamin"
                                                                    class="form-control">
                                                                    <option value="0"
                                                                        {{ $pasien->jenis_kelamin == '0' ? 'selected' : '' }}>
                                                                        Laki-laki</option>
                                                                    <option value="1"
                                                                        {{ $pasien->jenis_kelamin == '1' ? 'selected' : '' }}>
                                                                        Perempuan</option>
                                                                </select>
                                                            </div>


                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan
                                                                Perubahan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                        <tr>
                                            <th class="text-center text-xs font-weight-bolder opacity-7">
                                                {{ $index + 1 }}</th>
                                            <td class="text-xs text-center font-weight-bold">{{ $pasien->name }}</td>
                                            <td class="text-xs text-center font-weight-bold">
                                                {{ $pasien->glukosa_darah_sewaktu }} mg/dl
                                            </td>
                                            <td class="text-xs text-center font-weight-bold">
                                                {{ $pasien->glukosa_darah_puasa }} mg/dl
                                            </td>
                                            <td class="text-xs text-center font-weight-bold">
                                                {{ $pasien->glukosa_dua_jam }} mg/dl</td>
                                            <td class="text-xs text-center font-weight-bold">{{ $pasien->hba1c }} %
                                            </td>
                                            <td class="text-xs text-center font-weight-bold">{{ $pasien->usia }} Tahun
                                            </td>
                                            <td class="text-xs text-center font-weight-bold">
                                                @if ($pasien->kecepatan_gejala == 0)
                                                    {{ 'Lambat' }}
                                                @else
                                                    {{ 'Cepat' }}
                                                @endif

                                            </td>
                                            <td class="text-xs text-center font-weight-bold">
                                                @if ($pasien->riwayat_keluarga == '0')
                                                    {{ 'Tidak' }}
                                                @else
                                                    {{ 'Ya' }}
                                                @endif
                                            </td>
                                            <td class="text-xs text-center font-weight-bold">
                                                {{ $pasien->berat_badan }} Kg</td>
                                            <td class="text-xs text-center font-weight-bold">
                                                @if ($pasien->jenis_kelamin == '0')
                                                    {{ 'Laki-laki' }}
                                                @else
                                                    {{ 'Perempuan' }}
                                                @endif
                                            </td>
                                            <td class="text-xs text-center font-weight-bold">
                                                @php
                                                    if ($pasien->tipe_diabetes == 0) {
                                                        echo 'Tipe 1';
                                                    } else {
                                                        echo 'Tipe 2';
                                                    }
                                                @endphp
                                            </td>
                                            <td class="text-xs text-center font-weight-bold">{{ $pasien->created_at }}
                                            </td>
                                            <td class="text-xs text-center font-weight-bold">{{ $pasien->updated_at }}
                                            </td>
                                            <td class="text-xs font-weight-bold">
                                                <a href="#" class="btn btn-success btn-sm mt-2"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal-{{ $pasien->id }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <a href="{{ route('pasiens.destroy', $pasien->id) }}"
                                                    class="btn btn-danger btn-sm mt-2" data-confirm-delete="true"> <i
                                                        class="fa fa-trash"></i></a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



</x-layout-user>
