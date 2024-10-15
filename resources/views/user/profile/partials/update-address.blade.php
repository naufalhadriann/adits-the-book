<div class="card-header bg-white py-3">
    <h5 class="mt-1">Alamat Saya</h5>
    <a class="btn btn-dark" data-toggle="modal" data-target="#addresssModal">+ Tambah Alamat Baru</a>
    @include('user.profile.partials.modal-address')
</div>
<div class="card-body">   
    @if($address->isEmpty())
        <h5 class="ms-5">Rupanya kita belum mencantumkan alamat. Ayo lengkapi!</h5>
        <div class="lottie">
            <dotlottie-player src="https://lottie.host/7ac12197-94d8-4d7e-9f10-f8c869f7a6e0/PNpnSSkYSW.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
        </div>      
    @else
        @foreach($address as $alamat)
            <div class="address-list">
                <div class="card mb-4 {{ $alamat->status == 1 ? 'border-success' : '' }}">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{$alamat->address_type}} 
                            @if($alamat->status == 1)
                                <span class="fw-bold text-success fs-6">Utama</span>
                            @endif
                        </h5>
                        <h6 class="card-subtitle mb-2">{{$alamat->name}}</h6>
                        <p class="card-text">{{$alamat->street}}, {{$alamat->kota}}, {{$alamat->postal_code}}, {{$alamat->provinsi}}, {{$alamat->negara}}</p>
                        
                        @if($alamat->status == 0)
                        <div class="button-address">
                                <form id="useAddressForm{{ $alamat->id }}" action="{{ route('use.address', $alamat->id) }}" method="POST" >
                        @csrf
                        <a href="#" onclick="event.preventDefault(); document.getElementById('useAddressForm{{ $alamat->id }}').submit();">Pakai Alamat </a>

                    </form >

                    <form id="deleteAddressForm{{$alamat->id}}" action="{{route('delete.address', $alamat->id)}}" method="POST" >
                        @csrf
                        <a href="#" onclick="event.preventDefault(); document.getElementById('deleteAddressForm{{$alamat->id}}').submit();" >Hapus Alamat </a>
                    </form>

                    </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
