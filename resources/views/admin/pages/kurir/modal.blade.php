    @foreach ($kurir as $data)
        @isset($data->id)
            <!-- Modal Edit-->
            <div class="modal fade" id="edit-modal-{{ $data->id }}" tabindex="-1">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Konfirmasi Status</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Foto Profil</label>
                                        <a href="{{ $data->gambar }}" class="btn btn-primary w-100"
                                            target="_BLANK">Profil</a>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="text" class="form-control bg-light" value="{{ $data->email }}"
                                            readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                                        <input type="text" class="form-control bg-light" value="{{ $data->nama }}"
                                            readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                                        <input type="text" class="form-control bg-light"
                                            value="{{ $data->jenis_kelamin }}" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="defaultFormControlInput" class="form-label">Foto Sim C</label>
                                        <a href="{{ $data->foto_sim_c }}" class="btn btn-primary w-100" target="_BLANK">Sim
                                            C</a>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Tempat Lahir</label>
                                        <input type="text" class="form-control bg-light"
                                            value="{{ $data->tempat_lahir }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                                        <input type="text" class="form-control bg-light"
                                            value="{{ $data->tanggal_lahir }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nomor Ponsel</label>
                                        <input type="text" class="form-control bg-light"
                                            value="{{ $data->nomor_ponsel }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <form action="{{route('kurir.update',$data->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select  @error('status') is-invalid @enderror" name="status"
                                        value="{{ $data->status }}">
                                        <option value="" selected>Silahkan Pilih</option>
                                        <option value="proses" {{ $data->status == "proses" ? 'selected' : '' }}>Proses
                                        </option>
                                        <option value="diterima" {{ $data->status == "diterima" ? 'selected' : '' }}>Diterima
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">
                                            <i class="bi bi-exclamation-circle-fill"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Delete -->
            <div class="modal fade" id="delete-modal-{{ $data->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Kurir</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <form action="{{route('kurir.destroy',$data->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $data->id }}">
                            <div class="modal-body">
                                Anda yakin ingin menghapus kurir atas nama <b>{{ $data->nama }}</b>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Tutup</span>
                                </button>
                                <button type="submit" class="btn btn-outline-danger ml-1" id="btn-save">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Yakin</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endisset
    @endforeach
