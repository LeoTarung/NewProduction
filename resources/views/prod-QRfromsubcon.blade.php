<script>
    //    window.print();
    </script>
        <style>
            .KertasPrint{
                margin-left: 1px;
                width: 320px;
                height: 200px;
                background-color: aqua;

            }
            .KertasPrint > .printarea{
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
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
            <div class="KertasPrint">
                <div class="printarea">
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
                                <div class="col-7 nopadding">NECRCS-FK59JLAH02</div>
                                <div class="col-3 nopadding">PN. Cust</div>
                                <div class="col-1 nopadding"> :</div>
                                <div class="col-7 nopadding">84100K59 A70000A1</div>
                                <div class="col-3 nopadding">Part Name</div>
                                <div class="col-1 nopadding"> :</div>
                                <div class="col-7 nopadding">RAIL GRAB K07ANH-B12M AFFINITY BK MT(FG)</div>
                            </div>
                        </div>
                        <div class="col-4 nopadding pe-1 text-center">
                            <div class="row">
                                <div class="col-12 nopadding">
                                    {!! QrCode::errorCorrection('L')->size(95)->generate(Request::url()); !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-6 nopadding">
                            <div class="row ms-1" style="font-size: 11px; font-weight: 550;">
                                <div class="col-4 nopadding">QTY / Pack</div>
                                <div class="col-1 nopadding"> :</div>
                                <div class="col-7 nopadding">100 PCS</div>
                                <div class="col-4 nopadding">Date</div>
                                <div class="col-1 nopadding"> :</div>
                                <div class="col-7 nopadding">14-03-2023</div>
                            </div>
                        </div>
                        <div class="col-6 nopadding">
                            <div class="row " style="font-size: 11px; width: 172px;">
                                <div class="col-12 text-end" style="font-size: 8px;" > NM130114032003 </div>
                                <div class="col-6 nopadding border border-dark text-center">PRODUCTION</div>
                                <div class="col-6 nopadding border border-dark text-center">QC</div>
                                <div class="col-6 nopadding border border-dark" style="height: 50px;"> </div>
                                <div class="col-6 nopadding border border-dark"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
