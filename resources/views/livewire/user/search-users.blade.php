<div class="row">
    <div class="col-xl-3 col-lg-4">
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
</div>
