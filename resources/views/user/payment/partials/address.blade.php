<div class="card shipping-address ms-5 mb-4">
    <div class="card-body">
        <h5 class="card-title"><i class='{{$address->address_type == 'Rumah' ?  'bx bxs-home' :
                                         ($address->address_type == 'Kantor' ? 'bx bxs-business' : 
                                         ($address->address_type == 'Toko' ? 'bx bxs-store-alt' : ''))}}
                                         px-1'></i>{{$address->address_type}}</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary ms-2">{{$address->name}}</h6>
        <h5 class="card-text ms-2 mb-4">{{$address->street}}, {{$address->kota}}, {{$address->postal_code}}, {{$address->provinsi}}, {{$address->negara}}</h5>
        <a class="btn btn-dark btn-square rounded-3" data-toggle="modal" data-target="#addressModal" style="width:25%;">Ganti Alamat</a>
        


    </div>
</div>