

        <div class="card-header bg-white py-3 ">
            <h5 class="mt-1">Alamat Saya</h5>
            <a class="btn btn-dark " data-toggle="modal" data-target="#addresssModal" >+ Tambah Alamat Baru</a>
            @include('user.profile.partials.modal-address')
            </div>
        <div class="card-body">   
            
        @if($address->isEmpty())
        <h5 class="ms-5 ">Rupanya kita belum mencantumkan alamat. Ayo lengkapi!"</h5>
            <div class="lottie">
                <dotlottie-player src="https://lottie.host/7ac12197-94d8-4d7e-9f10-f8c869f7a6e0/PNpnSSkYSW.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
                </div>      
           
            @else
      @foreach($address  as $alamat)
           @if($alamat->status === 1 )
        <div class="card mb-4" style="border: 2px solid #650f2c;">
                <div class="card-body">
                <h5 class="card-title">{{$alamat->address_type}} <span class="fw-bold text-success fs-6">Utama</span></h5>
            <h6 class="card-subtitle mb-2 ">{{$alamat->name}}</h6>
            <p class="card-text">{{$alamat->street}}, {{$alamat->kota}}, {{$alamat->postal_code}}, {{$alamat->provinsi}}, {{$alamat->negara}}</p>
                </div>
            </div>
            @else
            <div class="card mb-4">
                <div class="card-body">
                <h5 class="card-title">{{$alamat->address_type}}</h5>
            <h6 class="card-subtitle mb-2 ">{{$alamat->name}}</h6>
            <p class="card-text">{{$alamat->street}}, {{$alamat->kota}}, {{$alamat->postal_code}}, {{$alamat->provinsi}}, {{$alamat->negara}}</p>
                </div>
            </div>
        
            @endif
        
            @endforeach
            @endif
        
           
        </div>
        