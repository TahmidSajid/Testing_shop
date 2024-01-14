<div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Quantity</h4>
                </div>
                <div class="card-body">
                    <form wire:submit="save">
                        <div class="row">
                            {{-- Color Section --}}
                            @if ($product->color == 'enable')
                                <div class="col-xl-6 col-lg-6">
                                    <div class="col-auto my-1">
                                        <label class="mr-sm-2">Color :</label>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div class="col-auto my-1">
                                        <select class="mr-sm-2 default-select" id="inlineFormCustomSelect"
                                            wire:model ='color'>
                                            <option selected>Choose Color</option>
                                            @forelse ($color_select as $color)
                                                <option value= "{{ $color->id }}"
                                                    style="background-color: {{ $color->color_code }} ">
                                                    {{ $color->color_code }}
                                                </option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                            @endif
                            {{-- Size Section --}}
                            @if ($product->size == 'enable')
                                <div class="col-xl-6 col-lg-6">
                                    <div class="col-auto my-1">
                                        <label class="mr-sm-2">Size</label>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4">
                                    <div class="col-auto my-1">
                                        <select class="mr-sm-2 default-select" id="inlineFormCustomSelect"
                                            wire:model ='size'>
                                            <option selected>Choose Size</option>
                                            @forelse ($size_select as $size)
                                                <option value= "{{ $size->id }}">{{ $size->size }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                            @endif
                            {{-- Variant Section --}}
                            @if ($product->variant == 'enable')
                                <div class="col-xl-6 col-lg-6">
                                    <div class="col-auto my-1">
                                        <label class="mr-sm-2">Variant</label>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="col-auto my-1">
                                        <select class="mr-sm-2 default-select" id="inlineFormCustomSelect"
                                            wire:model ='variant'>
                                            <option selected>Choose Variant</option>
                                            @forelse ($varint_select as $variant)
                                                <option value= "{{ $variant->id }}">{{ $variant->variant }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                            @endif
                            {{-- Quantity Section --}}
                            <div class="col-xl-12 col-lg-12">
                                <div class="col-auto my-1">
                                    <input class="form-control form-control-sm" type="number"
                                        placeholder="Enter Quantity" wire:model ='quantity'>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-4" id="btn-loading" type="submit">
                            <Span id="text-loading">
                                Add Quantity
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
                    <h4 class="card-title"> Quantity </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-sm text-center">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    @if ($product->size == 'enable')
                                        <th>Size</th>
                                    @endif
                                    @if ($product->color == 'enable')
                                        <th>Color</th>
                                    @endif
                                    @if ($product->variant == 'enable')
                                        <th>Variant</th>
                                    @endif
                                    <th>Quantity</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($quantities as $quantity)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        @if ($product->size == 'enable')
                                            <td>{{ $quantity->getSize->size }}</td>
                                        @endif

                                        @if ($product->color == 'enable')
                                            <td style="background-color: {{ $quantity->getColor->color_code }}">
                                                {{ $quantity->getColor->color_code }}</td>
                                        @endif
                                        @if ($product->variant == 'enable')
                                            <td>{{ $quantity->getVariant->variant }}</td>
                                        @endif
                                        <td>{{ $quantity->quantity }}</td>
                                        <td>
                                            <button type="button" wire:click = "delete({{ $quantity->id }})"
                                                class="btn btn-sm btn-danger" style="border-radius: 50%">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
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
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
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
</div>
