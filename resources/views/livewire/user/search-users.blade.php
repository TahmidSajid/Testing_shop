<div class="row">
    <div class="col-xl-4 col-lg-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Label Size</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form wire:submit ="addCupon">
                        <div class="form-group row align-items-center">
                            <label class="col-sm-2 col-lg-4 col-form-label">Cupon Name</label>
                            <div class="col-sm-10 col-lg-8">
                                <input type="text" class="form-control" placeholder="Cupon Name" wire:model="cuponName">
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label class="col-sm-2 col-lg-4 col-form-label">Discount</label>
                            <div class="col-sm-10 col-lg-8">
                                <input type="number" class="form-control" placeholder="Discount Percentage" wire:model="discount">
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label class="col-sm-2 col-lg-4 col-form-label">Validity</label>
                            <div class="col-sm-10 col-lg-8">
                                <input type="number" class="form-control" placeholder="in days" wire:model="validity">
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label class="col-sm-2 col-lg-4 col-form-label">Search</label>
                            <div class="col-sm-10 col-lg-8">
                                <input type="email" class="form-control" wire:model.live='search'
                                    placeholder="enter user email">
                            </div>
                            @if ($search != '')
                                @forelse ($user as $user)
                                    <button class="btn btn-sm btn-primary mx-auto my-1" type="button" wire:click ='addUsers({{ $user->id }})' >{{ $user->email }}</button>
                                @empty
                                @endforelse
                            @else

                            @endif
                        </div>
                        <div class="form-group row align-items-center">
                            <label class="col-lg-12 col-form-label text-center">Selected Users</label>
                            @forelse ($selectUsers as $users)
                            <div class="row">
                                <div class="col-lg-8">
                                    {{ $loop->iteration }} . {{ \App\Models\User::where('id',$users)->first()->name }}
                                </div>
                                <div class="col-lg-4">
                                    <button class="btn btn-sm btn-danger mx-auto my-1" type="button" wire:click ='deleteUser({{ $users }})' ><i class="fa-solid fa-xmark"></i></button>
                                </div>
                            </div>
                            @empty

                            @endforelse
                        </div>
                        <div class="form-group row align-items-center">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Recent Payments Queue</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md text-center">
                        <thead>
                            <tr>
                                <th class="width80">#</th>
                                <th>Cupon Name</th>
                                <th>Validity</th>
                                <th>Status</th>
                                <th>Discount</th>
                                <th>Eligible Users</th>
                                <th>Action</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cupons as $cupon)
                            <tr>
                                <td><strong>01</strong></td>
                                <td>{{ $cupon->cupon_name }}</td>
                                <td>{{ $cupon->cupon_validity }} days</td>
                                @if ($cupon->cupon_validity != null)
                                    <td><span class="badge light badge-success">Active</span></td>
                                @else

                                @endif
                                <td>{{ $cupon->cupon_discount }}%</td>
                                <td>{{ $cupon->getUsers->name }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                            <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty

                            @endforelse
                            {{-- <tr>
                                <td><strong>02</strong></td>
                                <td>Mr. Bobby</td>
                                <td>Dr. Jackson</td>
                                <td>01 August 2020</td>
                                <td><span class="badge light badge-danger">Canceled</span></td>
                                <td>$21.56</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-danger light sharp" data-toggle="dropdown">
                                            <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>03</strong></td>
                                <td>Mr. Bobby</td>
                                <td>Dr. Jackson</td>
                                <td>01 August 2020</td>
                                <td><span class="badge light badge-warning">Pending</span></td>
                                <td>$21.56</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-warning light sharp" data-toggle="dropdown">
                                            <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
