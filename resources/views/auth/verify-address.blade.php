<x-guest-layout>
    @section('title', 'Alamat')
        @section('form')
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 py-2">
        <form action="{{route('user.verify.address')}}" method="POST">
        @csrf
        <H3 style="text-align:center; margin-bottom:40px; font-weight:bold; color: #650f2c; font-style:italic; font-size:35px;">Tambahkan Alamat</H3>
        <div class="container">
  <div class="row">
   
    <div class="col-12 mb-3">
      <label for="inputStreet" class="form-label">Alamat Jalan</label>
      <input type="text" class="form-control form-control-lg" id="inputStreet" placeholder="Jalan" name="street">
    </div>
    <div class="col-6 mb-3">
      <label for="inputCity" class="form-label">Kota</label>
      <input type="text" class="form-control form-control-lg" id="inputCity" placeholder="Kota" name="kota">
    </div>
    <div class="col-6 mb-3">
      <label for="inputState" class="form-label">Provinsi</label>
      <input type="text" class="form-control form-control-lg" id="inputState" placeholder="Provinsi" name="provinsi">
    </div>
    
    <div class="col-6 mb-3">
      <label for="inputCounty" class="form-label">Negara</label>
      <input type="text" class="form-control form-control-lg" id="inputCounty" placeholder="Negara" name="negara">
    </div>
    <div class="col-6 mb-3">
      <label for="inputCountry" class="form-label">Kode Pos</label>
      <input type="text" class="form-control form-control-lg" id="inputPostalCode" placeholder="Kode Pos" name="postal_code">
    </div>
    <div class="col-12 mb-3">
      <label for="inputPhone" class="form-label">Nomor Telepon</label>
      <input type="text" class="form-control form-control-lg" id="inputPhone" placeholder="Nomor Telepon" name="nomor_telp">
    </div>
   
    <div class="text-center text-lg-start d-flex justify-content-between mb-4">
            <a href="/" data-mdb-button-init data-mdb-ripple-init class="btn btn-lg "
              style="padding-left: 2.5rem; padding-right: 2.5rem; background-color:#650f2c; color:white; width:48%;" >Skip</a>
              <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-lg "
              style="padding-left: 2.5rem; padding-right: 2.5rem; background-color:#650f2c; color:white; width:48%;" >Tambah</button>
          
          </div>    
  </div>
  
</div>


        </form>
        </div>
    
    @endsection
</x-guest-layout>