<link href="/UI/CSS/styles.css" rel="stylesheet" />

<style>
    .nopadding {
    padding: 0 !important;
    margin: 0 !important;
    }
    #PrintContent {
        background-color: ivory;
        width: 556px;
        /* width: 556px; */
        padding: 20px 10px;
        border: 2px solid black !important;
        padding-bottom: 150px;
    }
</style>
<div class="container-fluid ">
    <div class="btn btn-primary mb-4" id="btn">PRINT THIS</div>
    <div id="PrintContent" class="">
        <div class="row">
            <div class="col-8">
                <img src="/UI/IMG/nusametal-nobg.png" width="500" height="80" >
            </div>
            <div class="col-12">
                <div class="fw-bold text-center" style="font-size: 50px;">TAG - STO</div>
            </div>
            <div class="row">
                <div class="col-12 fw-bold">
                    <table width="533px" class="fw-bold" style="font-size: 25px;">
                        <tr>
                            <td class="pb-3"  width="150px">TANGGAL</td>
                            <td class="pb-3"  width="10px">:</td>
                            <td class="pb-3" >22-05-2023</td>
                        </tr>
                        <tr>
                            <td class="pb-3"  width="150px">S.LOC</td>
                            <td class="pb-3"  width="10px">:</td>
                            <td class="pb-3" >1031</td>
                        </tr>
                        <tr>
                            <td class="pb-3"  width="150px">MATERIAL</td>
                            <td class="pb-3"  width="10px">:</td>
                            <td class="pb-3" >NEOILP-SIMWCOAHMA</td>
                        </tr>
                        <tr>
                            <td class="pb-3"  width="150px">NAMA PART</td>
                            <td class="pb-3"  width="10px">:</td>
                            <td class="pb-3" >IMPELLER WATER PUMP KWCA ( SFG) IMPELLER WATER PUMP KWCA ( SFG)</td>
                        </tr>
                        <tr>
                            <td class="pb-3"  width="150px">JUMLAH</td>
                            <td class="pb-3"  width="10px">:</td>
                            <td class="pb-3" >10000 <span>PCS</span></td>
                        </tr>
                        <tr>
                            <td class="pb-3"  width="150px">AREA</td>
                            <td class="pb-3"  width="10px">:</td>
                            <td class="pb-3" >MACHINING DEKAT TANGGA LT.2</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-6 border border-dark">
                    <div class="row text-center">
                        <div class="col-12 ">
                            <div class="fw-bold mb-2" style="font-size: 20px;">STO2205202300000</div>
                        </div>
                        <div class="col-12 mb-3">
                            {!! QrCode::errorCorrection('L')->size(190)->generate("STO2205202300000"); !!}
                        </div>
                    </div>
                </div>
                <div class="col-6 border border-dark">
                    <div class="col-12 nopadding">
                        <div class="fw-bold text-center" style="font-size: 80px; margin-top: -20px; margin-bottom: -20px;">NG</div>
                    </div>
                    <div class="col-12">
                        <div class="fs-5">Verificator :</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/UI/JS/jquery363.js"></script>
<script src="/UI/JS/dom-to-image.js"></script>
<script src="/UI/JS/imin-printer.min.js"></script>
<script>
    var IminPrintInstance = new IminPrinter();
    IminPrintInstance.connect().then(async (isConnect) => {
      if (isConnect) {
        IminPrintInstance.initPrinter();
        document.querySelector("#btn").addEventListener("click", () => {
          var node = document.getElementById("PrintContent");
            domtoimage.toJpeg(node).then(function (dataUrl) {
              console.log(dataUrl);
              IminPrintInstance.printSingleBitmap(dataUrl);
              IminPrintInstance.printAndFeedPaper(0); //semakin gede semakin turun
          });
        });
      }
    });
  </script>
