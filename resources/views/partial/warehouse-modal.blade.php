@switch(Route::current()->getName())
    @case('Warehouse.setupstockingot')
            <div class="table-responsive">
                    {{-- <button class="btn btn-success mb-2 float-end" onclick="AddMachine()"><i class="fa-solid fa-plus"></i> MACHINE CASTING</button> --}}
                <table id="Table_stockingot" class="table table-striped-columns table-hover table-bordered display" style="overflow-x: scroll">
                    <thead>
                        <tr>
                            <th nowrap="nowrap" class="text-center">MATERIAL</th>
                            <th nowrap="nowrap" class="text-center">SLOC</th>
                            <th nowrap="nowrap" class="text-center">MRP</th>
                            <th nowrap="nowrap" class="text-center">DAILY</th>
                            <th nowrap="nowrap" class="text-center">MIN STOCK</th>
                            <th nowrap="nowrap" class="text-center">MAX STOCK</th>
                            <th nowrap="nowrap" class="text-center">ACTUAL STOCK</th>
                            <th nowrap="nowrap" class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-center"><i class="badge {{  $item->DB_Material->warna }} fs-6">{{ $item->DB_Material->initial }}</i></td>
                                <td class="text-center">{{ $item->sloc }}</td>
                                <td class="text-center">{{ $item->kebutuhan_mrp }}</td>
                                <td class="text-center">{{ $item->kebutuhan_daily }}</td>
                                <td class="text-center">{{ $item->min_stock }}</td>
                                <td class="text-center">{{ $item->max_stock }}</td>
                                <td class="text-center">{{ $item->actual_stock }}</td>
                                <td class="text-center"><a class="btn fa-solid fa-pen-to-square fa-lg text-warning" onclick="editstockingot('{{ $item->id }}')"></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="font-size: 12px"><sup>*</sup>Daily = MRP : 20 HariKerja. <br>
                Minimal Stock = 0.3 x 20 HariKerja x Daily. <br>
                Maximal Stock = 0.5 x 20 HariKerja x Daily.
                </div>
            </div>
            <script>
                $(document).ready(function () {
                    $("#Table_stockingot").DataTable({
                        "order": [ 1, 'asc' ]
                    });
                });
            </script>
        @break
    @case('Warehouse.editstockingot')
            <form action="{{ url('/modal/editstockingot/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
                @csrf
                <div class="row">
                    <div class="col-6 mb-3">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="material" class="">MATERIAL <sup>*</sup></label>
                                <select class="form-select fw-bold" id="material" name="material" required>
                                    <option value="">Open this select menu</option>
                                    @foreach (App\Models\DB_Material::all(); as $item)
                                        <option value="{{ $item->id }}">{{ $item->initial }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="sloc">S.LOC <sup>*</sup></label>
                                <input type="number" class="form-select fw-bold" name="sloc" id="sloc" value="0" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="actual_stock">ACTUAL STOCK <sup>*</sup></label>
                                <input type="number" class="form-select fw-bold" name="actual_stock" id="actual_stock" value="0" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="kebutuhan_mrp">KEBUTUHAN MRP <sup>*</sup></label>
                                <input type="number" class="form-select fw-bold" name="kebutuhan_mrp" id="kebutuhan_mrp" value="0" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="kebutuhan_daily">KEBUTUHAN DAILY <sup>*</sup></label>
                                <input type="number" class="form-select fw-bold" name="kebutuhan_daily" id="kebutuhan_daily" value="0" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="min_stock">MIN STOCK <sup>*</sup></label>
                                <input type="number" class="form-select fw-bold" name="min_stock" id="min_stock" value="0" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="max_stock">MAX STOCK <sup>*</sup></label>
                                <input type="number" class="form-select fw-bold" name="max_stock" id="max_stock" value="0" required>
                            </div>
                        </div>
                    </div>
                    <div class="tambahaninputan" id="tambahaninputan"></div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" id="submit" class="btn btn-primary float-end"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                    </div>
                </div>
            </form>
        @break
    @case('Warehouse.tpingot')
        @break
    @default

@endswitch
