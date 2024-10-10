<div class="modal fade" id="addresssModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addressModalLabel">Tambah Alamat</h5>
            </div>
            <form action="{{ route('user.address.create') }}" method="POST">
                @csrf <!-- Add CSRF token -->
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="inputName" class="form-label">Nama</label>
                        <input type="text" class="form-control form-control-lg" id="inputName" placeholder="Nama Penerima" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="inputStreet" class="form-label">Alamat Jalan</label>
                        <input type="text" class="form-control form-control-lg" id="inputStreet" placeholder="Jalan" name="street" value="{{ old('street') }}">
                        @error('street')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2 d-flex">
                        <div class="flex-fill me-2">
                            <label for="inputCity" class="form-label">Kota</label>
                            <input type="text" class="form-control" id="inputCity" placeholder="Kota" name="kota" value="{{ old('kota') }}">
                            @error('kota')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-fill">
                            <label for="inputState" class="form-label">Provinsi</label>
                            <input type="text" class="form-control" id="inputState" placeholder="Provinsi" name="provinsi" value="{{ old('provinsi') }}">
                            @error('provinsi')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2 d-flex">
                        <div class="flex-fill me-2">
                            <label for="inputPostalCode" class="form-label">Kode Pos</label>
                            <input type="text" class="form-control" id="inputPostalCode" placeholder="Kode Pos" name="postal_code" value="{{ old('postal_code') }}" max="10">
                            @error('postal_code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-fill me-2">
                            <label for="inputCountry" class="form-label">Negara</label>
                            <input type="text" class="form-control" id="inputCountry" placeholder="Negara" name="negara" value="{{ old('negara') }}">
                            @error('negara')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                 <div class="mb-2">
                        <label for="inputAddressType" class="form-label">Jenis Alamat</label>
                        <select class="form-select" id="inputAddressType" name="address_type">
                            <option value="" disabled selected>Pilih Jenis Alamat</option>
                            <option value="Rumah">Rumah</option>
                            <option value="Toko">Toko</option>
                            <option value="Kantor">Kantor</option>
                        </select>
                        @error('address_type')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                    <div class="mb-3">
                        <label for="inputPhone" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control form-control-lg" id="inputPhone" placeholder="Nomor Telepon" name="nomor_telp" value="{{ old('nomor_telp') }}" max="15">
                        @error('nomor_telp')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
