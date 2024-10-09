<div class="card">
						<div class="card-body">
					
                             <div class="profile-edit">
                              <img src="{{ asset('/images/admin.png')}}"  alt="Admin" class="rounded-circle p-2 " width="50">
                               <h4>{{Auth::user()->name}}</h4>
                                 </div>
                              <ul class="profile-info">
                                <li>
                          <div class="accordion ms-1 " id="accordionExample">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="btn-ac accordion-button bg-white" style="box-shadow: none; " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class='bx bx-user px-2'></i> Akun Saya
                                </button>
                            </h2>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <ul class="profile">
                                            <li class="">
                                                <a href="{{route('user.edit')}}">Profile</a>
                                            </li>
                                            <li class="mt-3">
                                                <a href="{{route('user.password')}}">Password</a>
                                            </li>
                                            <li class="mt-3 mb-4">
                                                <a href="{{ route('user.address')}}">Alamat</a>
                                            </li>
                                        </ul>
                                    </div>
                                        </div>

										</li>

										<li class="ms-4 mb-2">
											<a href="{{route('history')}}"><i class='bx bx-shopping-bag px-2'></i>Pembelian</a>
										</li>

										<li class="ms-4 mb-2">
											<a href="{{route('history')}}"><i class='bx bx-support px-2'></i>Customer Service</a>
										</li>

									</ul>
									
								</div>
							</div>
				