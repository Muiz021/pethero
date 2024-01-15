@php
    use Carbon\Carbon;
    use App\Models\User;
@endphp
@foreach ($kirim_hewan as $data)
    @isset($data->id)
        @php
            $user = User::where('id', $data->id_user)->first();
        @endphp
        <!-- Modal Delete -->
        <div class="modal fade" id="show-modal-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Show Data Kirim Hewan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Bukti Transafer</label>
                                    <a href="{{ $data->gambar }}" class="form-control btn btn-primary" target="_blank"
                                        rel="noopener noreferrer">Gambar</a>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Pengirim</label>
                                    <input type="text" class="form-control" value="{{ $data->nama_pengirim }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Tanggal Pengirim</label>
                                    <input type="text" class="form-control"
                                        value="{{ Carbon::parse($data->tanggal)->isoFormat('dddd, DD MMMM YYYY') }}"
                                        readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Pelanggan</label>
                                    <input type="text" class="form-control" value="{{ $user->nama }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Metode Pembayaran</label>
                                    <input type="text" class="form-control" value="{{ $data->metode_pembayaran }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Status Pembayaran</label>
                                    <input type="text" class="form-control" value="{{ $data->status_pembayaran == 'true' ? 'berhasil' : 'proses' }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Status Pengiriman</label>
                                    <input type="text" class="form-control" value="{{ $data->status_pengiriman == 'true' ? 'berhasil' : 'proses'}}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                                   <textarea class="form-control" cols="30" rows="8" readonly>{{$data->deskripsi_hewan}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Tutup</span>
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        @endisset
@endforeach

{{-- delete --}}

@foreach ($kirim_hewan as $data)
    @isset($data->id)
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
                    <form action="{{ route('berhasil.destroy', $data->id) }}" method="post">
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
{{-- end delete --}}
