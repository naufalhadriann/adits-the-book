<div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content rounded-lg shadow-lg">
      <div class="card-addresss">
        <div class="card-header rounded-lg text-center py-4" >
          <h5 class="mt-1" id="addressModalLabel" style="font-family: 'Arial', sans-serif; font-weight: bold;"> 
            <i class="fas fa-map-marker-alt" style="margin-right: 8px;"></i>Alamat Saya
          </h5>
          <a class="btn btn-dark mt-3" href="#" role="button" data-toggle="modal" data-target="#addresssModal">+ Tambah Alamat Baru</a>
          @include('user.profile.partials.modal-address')
        </div>
        <div class="card-body">

          <div class="address-list">
            <div class="card mb-4 border-success shadow-sm animated fadeIn shipping-address">
              <div class="card-body shipping">
                <h5 class="card-title">Rumah</h5>
                <h6 class="card-subtitle mb-2 text-muted">Admin Komedi</h6>
                <p class="card-text">Jl. Contoh No. 123, Kota Contoh, Provinsi Contoh, 12345.</p>
              </div>
            </div>

            <div class="card mb-4 shadow-sm animated fadeIn shipping-address">
              <div class="card-body">
                <h5 class="card-title">Kantor</h5>
                <h6 class="card-subtitle mb-2 text-muted">Admin Komedi</h6>
                <p class="card-text">Jl. Bisnis No. 456, Kota Contoh, Provinsi Contoh, 12345.</p>
              </div>
            </div>
          </div>

          <div class="text-center mt-4">
            <p class="text-muted">Anda dapat menambahkan alamat baru atau mengelola alamat yang sudah ada.</p>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
