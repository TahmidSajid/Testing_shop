<div>
    @if ($variant_sec->variant == 'enable')
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Variants</h4>
                    </div>
                    <div class="card-body">
                        <form wire:submit="save">
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 mb-3">
                                    <div class="example">
                                        <p class="mb-1">Variant</p>
                                        <input type="text" class="form-control" wire:model="variant">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" id="btn-loading" type="submit">
                                <Span id="text-loading">
                                    Add variant
                                </Span>
                                <div class="spinner-border text-light d-none" id="spin-loading" role="status">

                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Variant </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-responsive-sm text-center">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Variant</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($variants as $variant)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <td>{{ $variant->variant }}</td>
                                            <td>

                                                {{--*************** PHP Start ***************--}}
                                                <?php
                                                $status = false;
                                                foreach ($variant_used as $key => $value) {
                                                    if($value == $variant->id){
                                                        $status = true;
                                                        break;
                                                    }
                                                }
                                                if($status===false){
                                                ?>
                                                {{--*************** PHP end ***************--}}
                                                <button type="button" wire:click = "delete({{ $variant->id }})"
                                                    class="btn btn-sm btn-danger" style="border-radius: 50%">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                                {{--*************** PHP Start ***************--}}
                                                <?php
                                                }else{
                                                ?>
                                                    <h5>Its in use</h5>
                                                <?php
                                                }
                                                ?>

                                                {{-- <button type="button" wire:click= "editColor({{ $variant->id }})"
                                                class="btn btn-sm btn-info" style="border-radius: 50%"
                                                data-toggle="modal" data-target="#editColor">
                                                <i class="fa-solid fa-pen-fancy"></i>
                                            </button> --}}
                                                <!-- Button trigger modal -->
                                                <!-- Modal -->
                                                {{-- <div wire:ignore.self class="modal fade" id="editColor" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal
                                                                title</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <input type="color" wire:model = "code">
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
