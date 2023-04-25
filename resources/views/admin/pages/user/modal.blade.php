    <!-- Modal Tambah-->
    <div class="modal fade" id="add-user" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Nama User</label>
                                <input type="text" name="name" class="form-control"
                                    placeholder="Masukkan Nama User" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control"
                                    placeholder="Masukkan Username" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="form-password-toggle">
                                    <label class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" name="password" class="form-control"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                            </div>
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

    @foreach ($users as $user)
        @isset($user->id)
            <!-- Modal Edit-->
            <div class="modal fade" id="edit-modal-{{ $user->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Edit User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('user.update', $user->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label class="form-label">Nama User</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $user->name }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" name="username" class="form-control"
                                            value="{{ $user->username }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <div class="form-password-toggle">
                                            <label class="form-label" for="multicol-password">Password</label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="multicol-password" class="form-control"
                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                    aria-describedby="multicol-password2" />
                                                <span class="input-group-text cursor-pointer" id="multicol-password2"><i
                                                        class="bx bx-hide"></i></span>
                                            </div>
                                        </div>
                                    </div>
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
            <div class="modal fade" id="delete-modal-{{ $user->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <form action="{{ route('user.destroy', $user->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                            <div class="modal-body">
                                Anda yakin ingin menghapus User <b>{{ $user->name }}</b>
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
