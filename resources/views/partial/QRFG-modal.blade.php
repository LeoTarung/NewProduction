<link href="/UI/CSS/bootstrap.css" rel="stylesheet" />
@switch(Route::current()->getName())
    @case('QR.addQRFG')
        <form action="{{ url('/qr/modal/finishgood/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="col-12 mb-3">
                        <label for="nama_part">NAMA PART <sup>*</sup></label>
                        <input type="text" class="form-control" name="nama_part" id="nama_part" aria-describedby="nama_partHelp" readonly>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="material">MATERIAL <sup>*</sup></label>
                        <input type="text" class="form-control" name="material" id="material" aria-describedby="materialHelp" readonly>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="pn_customer">PN. CUSTOMER <sup>*</sup></label>
                        <input type="text" class="form-control" name="pn_customer" id="pn_customer" aria-describedby="pn_customerHelp" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="col-12 mb-3">
                        <label for="qty">QTY <sup>*</sup></label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="qty" id="qty">
                            <span class="input-group-text">PCS</span>
                          </div>
                    </div>
                    <div class="tambahaninputan" id="tambahaninputan"></div>
                </div>
            </div>
            <div class="row">
                <div class="col" >
                    <button type="submit" id="submit" class="btn btn-primary float-end"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                </div>
            </div>
        </form>
    @break

    @case('QR.Abnormality')
        <div class="table-responsive">
            <table id="Table_abnormality" class="table table-striped-columns table-hover table-bordered nowrap display" style="overflow-x: scroll">
                <thead>
                    <tr>
                        <th class="text-center">NO</th>
                        <th class="text-center">TANGGAL</th>
                        <th class="text-center">NAMA PART</th>
                        <th class="text-center">PN.Customer</th>
                        <th class="text-center">KODE CUSTOMER</th>
                        <th class="text-center">MATERIAL</th>
                        <th class="text-center">QTY / PACK</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->nama_part }}</td>
                            <td>{{ $item->customer_material }}</td>
                            <td>{{ $item->kode_customer }}</td>
                            <td>{{ $item->material }}</td>
                            <td class="text-center">{{ $item->std_packaging }} PCS</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <script>
                $(function () {
                    var table = $('#Table_abnormality').DataTable({});
                });
            </script>
        </div>
    @break

    @case('QR.PrintTag')
        <script>
            window.print();
            setTimeout(() => {
                location.href = "{{ url('/qr/finishgood') }}";
            }, 1000);
        </script>
        <style>
            .KertasPrint{
            margin-left: 1px;
            width: 320px;
            height: 200px;
            background-color: aqua;
            margin-top: 80px;
            font-weight: 700;

            }
            p {
            font-size: 10px;

            }
            .nopadding {
            padding: 0 !important;
            margin: 0 !important;
            }
        </style>
        <div class="row">
            @for($i=0; $i < $copies; $i++)
                <div class="col-12">
                    <div class="KertasPrint ">
                    <div class="row border border-dark" style=" width: 320px; margin-left: -0.4px;">
                    <div class="col-8  nopadding">
                        <img src="/UI/IMG/nusametal-nobg.png" width="140" height="20" style="margin: 2px 10px 0px 10px;">
                    </div>
                    <div class="col-4 nopadding">
                        <p style="font-size: 8.8px; margin-bottom: -20px; margin-top: 10px">FO/PPC/PPC/001 Rev:0 &ensp;</p>
                    </div>
                    <div class="col-8 nopadding" >
                        <div class="row mt-2 ms-1" style="font-size: 11px; font-weight: 550;">
                            <div class="col-3 nopadding">Material</div>
                            <div class="col-1 nopadding"> :</div>
                            <div class="col-7 nopadding">{{ $data->material }}</div>
                            <div class="col-3 nopadding">PN. Cust</div>
                            <div class="col-1 nopadding"> :</div>
                            <div class="col-7 nopadding">{{ $data->customer_material }}</div>
                            <div class="col-3 nopadding">Part Name</div>
                            <div class="col-1 nopadding"> :</div>
                            <div class="col-7 nopadding">{{ $data->nama_part }}</div>
                        </div>
                    </div>
                    <div class="col-4 nopadding pe-1 text-center">
                        <div class="row">
                            <div class="col-12 nopadding">
                                @if ($status == 'normal')
                                {!! QrCode::errorCorrection('L')->size(95)->generate($gabungan_array[$i]); !!}
                                @else
                                {!! QrCode::errorCorrection('L')->size(95)->generate($gabungan); !!}
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-6 nopadding">
                        <div class="row ms-1" style="font-size: 11px; font-weight: 550;">
                            <div class="col-4 nopadding">QTY / Pack</div>
                            <div class="col-1 nopadding"> :</div>
                            <div class="col-7 nopadding">{{ $data->std_packaging }}</div>
                            <div class="col-4 nopadding">Date</div>
                            <div class="col-1 nopadding"> :</div>
                            <div class="col-7 nopadding">{{ date('d-m-Y') }}</div>
                        </div>
                    </div>
                    <div class="col-6 nopadding">
                        <div class="row " style="font-size: 11px; width: 172px;">
                            @if ($status == 'normal')
                                <div class="col-12 text-end" style="font-size: 8px;" > {{ $kode_array[$i] }} </div>
                            @else
                            <div class="col-12 text-end" style="font-size: 8px;" > {{ $data->qrtag }} </div>
                            @endif
                            <div class="col-6 nopadding border border-dark text-center">PRODUCTION</div>
                            <div class="col-6 nopadding border border-dark text-center">QC</div>
                            <div class="col-6 nopadding border border-dark" style="height: 50px;"> </div>
                            <div class="col-6 nopadding border border-dark"> </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            @endfor
        </div>
    @break
    @default
    {{-- <h1>KOSONG</h1> --}}
@endswitch
