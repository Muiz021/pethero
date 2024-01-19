    @foreach ($kirim_hewan as $data)

            <!-- Modal Edit-->
            <div class="modal fade" id="edit-modal-{{ $data->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Konfirmasi Status</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('konfirmasi-pembayaran.update', $data->id) }}" method="post"
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
       
    @endforeach
