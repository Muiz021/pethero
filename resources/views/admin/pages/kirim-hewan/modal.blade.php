    @foreach ($kirim_hewan as $data)
        @isset($data->id)
            <!-- Modal Edit-->
            <div class="modal fade" id="edit-modal-{{ $data->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Konfirmasi Status</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('kirim-hewan.update', $data->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select  @error('status') is-invalid @enderror" name="status" value="{{$data->status}}">
                                        <option value="" selected>Silahkan Pilih</option>
                                        <option value="false" {{ old('status') == false ? 'selected' : '' }}>Proses</option>
                                        <option value="true" {{ old('status') == true ? 'selected' : '' }}>Berhasil</option>
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
                                <button type="button" class="btn btn-label-secondary"
                                    data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Delete -->
            <div class="modal fade" id="delete-modal-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Kirim Hewan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <form action="{{ route('kirim-hewan.destroy', $data->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $data->id }}">
                            <div class="modal-body">
                                Anda yakin ingin menghapus data kirim hewan atas nama <b>{{ $data->nama_pengirim }}</b>
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
