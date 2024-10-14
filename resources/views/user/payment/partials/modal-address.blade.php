<div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content rounded-lg shadow-lg">
      <div class="card-addresss">
        <div class="card-header rounded-lg text-center py-4" >
          <h5 class="mt-1" id="addressModalLabel" style="font-family: 'Arial', sans-serif; font-weight: bold;"> 
            <i class="fas fa-map-marker-alt" style="margin-right: 8px;"></i>Alamat Saya
          </h5>
          <a class="btn btn-dark mt-3 shipping-address" href="#" role="button" data-toggle="modal" data-target="#addresssModal">+ Tambah Alamat Baru</a>
          @include('user.profile.partials.modal-address')
        </div>
        <div class="card-body">

          @foreach($addresses as $address)
          <div class="address-list">
            <div class="card mb-4 {{ $address->status == 1 ? 'border-success' : ''}} shadow-sm animated fadeIn ">
              <div class="card-body shipping">
                <h5 class="card-title">{{$address->address_type}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$address->name}}</h6>
                <p class="card-text">{{$address->street}}, {{$address->kota}}, {{$address->postal_code}}, {{$address->provinsi}}, {{$address->negara}}</p>
                @if($address->status == 0)
                <form id="useAddressForm{{ $address->id }}" action="{{ route('use.address', $address->id) }}" method="POST" style="display:inline;">
                
                @csrf
                <a href="#" onclick="event.preventDefault(); document.getElementById('useAddressForm{{ $address->id }}').submit();" >Pakai Alamat Ini</a>
            </form>
                @endif
              </div>
            </div>
            </div>
              @endforeach
           
         

          <div class="text-center mt-4">
            <p class="text-muted">Anda dapat menambahkan alamat baru atau mengelola alamat yang sudah ada.</p>
          </div>
          </div> 
      </div>
    </div>
  </div>
</div>
