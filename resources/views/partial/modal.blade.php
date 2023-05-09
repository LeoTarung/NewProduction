{{-- CALENDER OF EVENT  --}}
@if (Request::url() == url('/modal/calenderEvent'))
<form action="{{ url('/modal/calenderEvent/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
    @csrf
    <div class="row">
         <div class="col-6">
            <div class="col-12 mb-3">
                <label for="group" class="">Group <sup>*</sup></label>
                <select class="form-select fw-bold" id="group" name="group" required>
                    <option value="" selected disabled>Open this select menu</option>
                    <option value="pdca">PDCA</option>
                    <option value="quality">Quality</option>
                    <option value="plant">Plant</option>
                </select>
            </div>
            <div class="col-12 mb-3">
                <label for="judul">Agenda <sup>*</sup></label>
                <input type="text" class="form-control" name="judul" id="judul" aria-describedby="judulHelp">
            </div>
            <div class="col-12 mb-3">
                <label for="tanggal">Tanggal <sup>*</sup></label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" aria-describedby="tanggalHelp">
            </div>
            <div class="col-12 mb-3">
                <label for="mulai">Mulai <sup>*</sup></label>
                <input type="time" class="form-control" name="mulai" id="mulai" aria-describedby="mulaiHelp">
            </div>
            <div class="col-12 mb-3">
                <label for="selesai">Selesai <sup>*</sup></label>
                <input type="time" class="form-control" name="selesai" id="selesai" aria-describedby="selesaiHelp">
            </div>
         </div>
         <div class="col-6">
            <div class="col-12 mb-3">
                <label for="pic">PIC <sup>*</sup></label>
                <input type="text" class="form-control" name="pic" id="pic" aria-describedby="picHelp">
            </div>
            <div class="col-12 mb-3">
                <label for="location">Location <sup>*</sup></label>
                <input type="text" class="form-control" name="location" id="location" aria-describedby="locationHelp">
            </div>
            <div class="col-12 mb-3">
                <label for="type" class="">Type Meeting <sup>*</sup></label>
                <select class="form-select fw-bold" id="type" name="type" required>
                    <option value="" selected disabled>Open this select menu</option>
                    <option value="internal">Meeting Internal</option>
                    <option value="external">Meeting External</option>
                </select>
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
{{-- BAD NEWS FIRST  --}}
@elseif (Request::url() == url('/modal/bnfQuality'))
<form action="{{ url('/modal/bnfQuality/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
    @csrf
    <div class="row">
         <div class="col-8 bg-silver text-dark">
            <div class="row">
                <div class="col-3 mb-3">
                    <label for="tanggal" class="fw-bold">Tanggal <sup>*</sup></label>
                    <input type="date"  name="tanggal" id="tanggal" aria-describedby="tanggalHelp" required>
                </div>
                <div class="col-4 mb-3">
                    <label class="fw-bold" for="customer" class="">Customer <sup>*</sup></label>
                    <select class="form-select fw-bold" id="nama_customer" name="nama_customer" required>
                        <option value="ADM">ADM</option>
                        <option value="AHM P1">AHM P1</option>
                        <option value="AHM P2">AHM P2</option>
                        <option value="AHM P3">AHM P3</option>
                        <option value="AHM P4">AHM P4</option>
                        <option value="AHM P5">AHM P5</option>
                        <option value="AHM REM">AHM REM</option>
                        <option value="AISIN">AISIN</option>
                        <option value="ASPIRA">ASPIRA</option>
                        <option value="CAI">CAI</option>
                        <option value="DENSO">DENSO</option>
                        <option value="DNP">DNP</option>
                        <option value="HINO">HINO</option>
                        <option value="HPM">HPM</option>
                        <option value="IGP">IGP</option>
                        <option value="J-TEKT">J-TEKT</option>
                        <option value="KAWASAKI">KAWASAKI</option>
                        <option value="KUBOTA">KUBOTA</option>
                        <option value="KAYABA">KAYABA</option>
                        <option value="MHASK">MHASK</option>
                        <option value="MII">MII</option>
                        <option value="MKM">MKM</option>
                        <option value="NISSAN">NISSAN</option>
                        <option value="NKI">NKI</option>
                        <option value="OKAMOTO">OKAMOTO</option>
                        <option value="SUZUKI">SUZUKI</option>
                        <option value="SKC">SKC</option>
                        <option value="TMMIN">TMMIN</option>
                        <option value="TOYODA GOSAI">TOYODA GOSAI</option>
                        <option value="YAMAHA">YAMAHA</option>
                        <option value="YUTAKA">YUTAKA</option>
                    </select>
                    <script>
                        $(document).ready(function() {
                            $("#nama_customer").select2({
                                dropdownParent: $("#staticBackdrop")
                            });
                        });
                    </script>
                </div>
                <div class="col-5 mb-3">
                    <label class="fw-bold" for="nama_part" class="">Nama Part <sup>*</sup></label>
                    <select class="form-select fw-bold" id="nama_part" name="nama_part" required>
                        <option value="BASE STATOR ASSY K0WA (FG)">BASE STATOR ASSY K0WA (FG)</option>
                        <option value="BASE STATOR ASSY K1ZG (FG)">BASE STATOR ASSY K1ZG (FG)</option>
                        <option value="BASE STATOR ASSY K1ZG PACK.ONLY(FG)">BASE STATOR ASSY K1ZG PACK.ONLY(FG)</option>
                        <option value="BASE STATOR ASSY K59A (FG)">BASE STATOR ASSY K59A (FG)</option>
                        <option value="BASE STATOR ASSY K97A (FG)">BASE STATOR ASSY K97A (FG)</option>
                        <option value="BASE STATOR ASSY KZRA (FG)">BASE STATOR ASSY KZRA (FG)</option>
                        <option value="BODY WATER PUMP D01N (FG)">BODY WATER PUMP D01N (FG)</option>
                        <option value="BRACKET 366 L (FG)">BRACKET 366 L (FG)</option>
                        <option value="BRACKET COMPRESSOR MOUNTING 5222 (FG)">BRACKET COMPRESSOR MOUNTING 5222 (FG)</option>
                        <option value="BRACKET COMPRESSOR MOUNTING 6592 (FG)">BRACKET COMPRESSOR MOUNTING 6592 (FG)</option>
                        <option value="BRACKET COMPRESSOR MOUNTING 6611 (FG)">BRACKET COMPRESSOR MOUNTING 6611 (FG)</option>
                        <option value="BRACKET ENGINE MOUNTING D80N (FG)">BRACKET ENGINE MOUNTING D80N (FG)</option>
                        <option value="BRACKET OIL FILTER 0C070 (FG)">BRACKET OIL FILTER 0C070 (FG)</option>
                        <option value="BRACKET OIL FILTER OCO90 (FG)">BRACKET OIL FILTER OCO90 (FG)</option>
                        <option value="BRACKET PEDAL (FG)">BRACKET PEDAL (FG)</option>
                        <option value="BRACKET TORQUE ROD (CVT) (FG)">BRACKET TORQUE ROD (CVT) (FG)</option>
                        <option value="BRACKET TORQUE ROD (MT) (FG)">BRACKET TORQUE ROD (MT) (FG)</option>
                        <option value="BRACKET TORQUE ROD CVT (2CF-B) (FG)">BRACKET TORQUE ROD CVT (2CF-B) (FG)</option>
                        <option value="BRACKET TORQUE ROD CVT (2WK) (FG)">BRACKET TORQUE ROD CVT (2WK) (FG)</option>
                        <option value="BRACKET TORQUE ROD MT (2SJ) (FG)">BRACKET TORQUE ROD MT (2SJ) (FG)</option>
                        <option value="BRACKET TORQUE ROD MT (2WK) (FG)">BRACKET TORQUE ROD MT (2WK) (FG)</option>
                        <option value="BRACKET TRANS MTG CVT (2SJ) (FG)">BRACKET TRANS MTG CVT (2SJ) (FG)</option>
                        <option value="BRACKET TRANS MTG MT (2SJ) (FG)">BRACKET TRANS MTG MT (2SJ) (FG)</option>
                        <option value="BRACKET TRNS MTG (CVT) (FG)">BRACKET TRNS MTG (CVT) (FG)</option>
                        <option value="BRACKET TRNS MTG (MT) (FG)">BRACKET TRNS MTG (MT) (FG)</option>
                        <option value="BRACKET Y230 (FG)">BRACKET Y230 (FG)</option>
                        <option value="BRKT AIR/C (FG)">BRKT AIR/C (FG)</option>
                        <option value="BRKT PCS (FG)">BRKT PCS (FG)</option>
                        <option value="BRKT TORQUEROD LWR (CVT) (FG)">BRKT TORQUEROD LWR (CVT) (FG)</option>
                        <option value="CAP ASSY BEARING 2TQ (FG)">CAP ASSY BEARING 2TQ (FG)</option>
                        <option value="CAP TAIL ASSY HA9J (FG)">CAP TAIL ASSY HA9J (FG)</option>
                        <option value="CAP WATER OUTLET Y4L (FG)">CAP WATER OUTLET Y4L (FG)</option>
                        <option value="CASE COMP MISSION K2FA (FG)">CASE COMP MISSION K2FA (FG)</option>
                        <option value="CASE COMP THERMO (FG)">CASE COMP THERMO (FG)</option>
                        <option value="CASE COMP THERMO 2AG (FG)">CASE COMP THERMO 2AG (FG)</option>
                        <option value="CASE COMP THERMO 2CF (NON ANODIZ)(FG)">CASE COMP THERMO 2CF (NON ANODIZ)(FG)</option>
                        <option value="CASE COMP THERMO 2SJ (NON ANODIZ)(FG)">CASE COMP THERMO 2SJ (NON ANODIZ)(FG)</option>
                        <option value="COV COMP WTR OUTLET 2AG(NON ANODIZ)(FG)">COV COMP WTR OUTLET 2AG(NON ANODIZ)(FG)</option>
                        <option value="COV COMP WTR OUTLET 2MD(NON ANODIZ)(FG)">COV COMP WTR OUTLET 2MD(NON ANODIZ)(FG)</option>
                        <option value="COVER ASSY C/C R NH-GREY K15G (FG)">COVER ASSY C/C R NH-GREY K15G (FG)</option>
                        <option value="COVER ASSY C/C R YR-GOLD K15G (FG)">COVER ASSY C/C R YR-GOLD K15G (FG)</option>
                        <option value="COVER ASSY HEAD K1ZG (FG)">COVER ASSY HEAD K1ZG (FG)</option>
                        <option value="COVER ASSY HEAD K1ZG PACK.ONLY(FG)">COVER ASSY HEAD K1ZG PACK.ONLY(FG)</option>
                        <option value="COVER ASSY R C/C  BROWN METT K98G (FG)">COVER ASSY R C/C  BROWN METT K98G (FG)</option>
                        <option value="COVER ASSY R C/C  NH-GREY K45G (FG)">COVER ASSY R C/C  NH-GREY K45G (FG)</option>
                        <option value="COVER ASSY R C/C  YR-GOLD K15P (FG)">COVER ASSY R C/C  YR-GOLD K15P (FG)</option>
                        <option value="COVER ASSY R C/C  YR-GOLD K45G (FG)">COVER ASSY R C/C  YR-GOLD K45G (FG)</option>
                        <option value="COVER ASSY R C/C K56R NH-303 M GREY (FG)">COVER ASSY R C/C K56R NH-303 M GREY (FG)</option>
                        <option value="COVER ASSY R C/C NH-GREY K56A (FG)">COVER ASSY R C/C NH-GREY K56A (FG)</option>
                        <option value="COVER ASSY R C/C YR-GOLD K15M (FG)">COVER ASSY R C/C YR-GOLD K15M (FG)</option>
                        <option value="COVER ASSY R C/C YR-GOLD K56A (FG)">COVER ASSY R C/C YR-GOLD K56A (FG)</option>
                        <option value="COVER COMP HEAD K0JA (FG)">COVER COMP HEAD K0JA (FG)</option>
                        <option value="COVER COMP HEAD K1AA (FG)">COVER COMP HEAD K1AA (FG)</option>
                        <option value="COVER COMP HEAD K1AA (PACK. ONLY) (FG)">COVER COMP HEAD K1AA (PACK. ONLY) (FG)</option>
                        <option value="COVER COMP HEAD K59A (FG)">COVER COMP HEAD K59A (FG)</option>
                        <option value="COVER COMP HEAD K97A (FG)">COVER COMP HEAD K97A (FG)</option>
                        <option value="COVER COMP HEAD KZLN (FG)">COVER COMP HEAD KZLN (FG)</option>
                        <option value="COVER COMP SENSOR (FG)">COVER COMP SENSOR (FG)</option>
                        <option value="COVER COMP WATER OUTLET (FG)">COVER COMP WATER OUTLET (FG)</option>
                        <option value="COVER COMP WATER OUTLET 55AA 2MD (FG)">COVER COMP WATER OUTLET 55AA 2MD (FG)</option>
                        <option value="COVER CYL HEAD 4HG-1 (FG)">COVER CYL HEAD 4HG-1 (FG)</option>
                        <option value="COVER CYL. HEAD APV/Y9J (FG)">COVER CYL. HEAD APV/Y9J (FG)</option>
                        <option value="COVER CYL. HEAD APV2/YLO (FG)">COVER CYL. HEAD APV2/YLO (FG)</option>
                        <option value="COVER CYLINDER HEAD HINO 366L (FG)">COVER CYLINDER HEAD HINO 366L (FG)</option>
                        <option value="COVER GEAR SHIFT NO.2 (FG)">COVER GEAR SHIFT NO.2 (FG)</option>
                        <option value="COVER L C/C NH-GREY K56A (FG)">COVER L C/C NH-GREY K56A (FG)</option>
                        <option value="COVER L C/C YR-GOLD K56A (FG)">COVER L C/C YR-GOLD K56A (FG)</option>
                        <option value="COVER L CLOUD SILVER K1ZG PACK.ONLY(FG)">COVER L CLOUD SILVER K1ZG PACK.ONLY(FG)</option>
                        <option value="COVER L CRANK CASE K18A (FG)">COVER L CRANK CASE K18A (FG)</option>
                        <option value="COVER L CRANK CASE KYZ (FG)">COVER L CRANK CASE KYZ (FG)</option>
                        <option value="COVER L IRON NAIL K1ZG PACK.ONLY (FG)">COVER L IRON NAIL K1ZG PACK.ONLY (FG)</option>
                        <option value="COVER L K03S NH-1 BLACK (FG)">COVER L K03S NH-1 BLACK (FG)</option>
                        <option value="COVER L KWB BLACK (FG)">COVER L KWB BLACK (FG)</option>
                        <option value="COVER L KYEG GREY (FG)">COVER L KYEG GREY (FG)</option>
                        <option value="COVER L SIDE CLOUD SILVER K1ZG (FG)">COVER L SIDE CLOUD SILVER K1ZG (FG)</option>
                        <option value="COVER L SIDE CLOUD SILVER K2SA (FG)">COVER L SIDE CLOUD SILVER K2SA (FG)</option>
                        <option value="COVER L SIDE IRON NAIL K1ZG (FG)">COVER L SIDE IRON NAIL K1ZG (FG)</option>
                        <option value="COVER L SIDE K0JA NH-255 SHIM.SILVER(FG)">COVER L SIDE K0JA NH-255 SHIM.SILVER(FG)</option>
                        <option value="COVER L SIDE K0JA NH-303 MAT AX GREY(FG)">COVER L SIDE K0JA NH-303 MAT AX GREY(FG)</option>
                        <option value="COVER L SIDE K1AA NH-303 MAT AX GREY(FG)">COVER L SIDE K1AA NH-303 MAT AX GREY(FG)</option>
                        <option value="COVER L SIDE K2FA NH-255 SHIM.SILVER(FG)">COVER L SIDE K2FA NH-255 SHIM.SILVER(FG)</option>
                        <option value="COVER L SIDE K2FA NH-303 MAT AX GREY(FG)">COVER L SIDE K2FA NH-303 MAT AX GREY(FG)</option>
                        <option value="COVER L SIDE K2SA NH-303 MAT AX GREY(FG)">COVER L SIDE K2SA NH-303 MAT AX GREY(FG)</option>
                        <option value="COVER L SIDE K59J (FG)">COVER L SIDE K59J (FG)</option>
                        <option value="COVER L SIDE NH-35 CLOUD SILV K97F (FG)">COVER L SIDE NH-35 CLOUD SILV K97F (FG)</option>
                        <option value="COVER L SIDE SUB ASSY K1ZN NH-303 (FG)">COVER L SIDE SUB ASSY K1ZN NH-303 (FG)</option>
                        <option value="COVER OIL COOLER (FG)">COVER OIL COOLER (FG)</option>
                        <option value="COVER OIL PUMP 1SZ (FG)">COVER OIL PUMP 1SZ (FG)</option>
                        <option value="COVER R C/C KPH Silver (PACK.ONLY) (FG)">COVER R C/C KPH Silver (PACK.ONLY) (FG)</option>
                        <option value="COVER R C/C KVLP Grey (PACK.ONLY) (FG)">COVER R C/C KVLP Grey (PACK.ONLY) (FG)</option>
                        <option value="COVER R C/C NH-GREY K45G ASSY JOINT (FG)">COVER R C/C NH-GREY K45G ASSY JOINT (FG)</option>
                        <option value="COVER R C/C YR-GOLD K45G ASSY JOINT (FG)">COVER R C/C YR-GOLD K45G ASSY JOINT (FG)</option>
                        <option value="COVER R CRANK CASE KYEA (FG)">COVER R CRANK CASE KYEA (FG)</option>
                        <option value="COVER R CRANK CASE KYZ (FG)">COVER R CRANK CASE KYZ (FG)</option>
                        <option value="COVER R KWB BLACK (FG)">COVER R KWB BLACK (FG)</option>
                        <option value="COVER S/A THERMOSTAT 479 W (FG)">COVER S/A THERMOSTAT 479 W (FG)</option>
                        <option value="COVER THERMO 2AG (FG)">COVER THERMO 2AG (FG)</option>
                        <option value="COVER THERMO 2CF/2AG (NON ANODIZ)(FG)">COVER THERMO 2CF/2AG (NON ANODIZ)(FG)</option>
                        <option value="COVER THERMO 2SJ/2MD (NON ANODIZ)(FG)">COVER THERMO 2SJ/2MD (NON ANODIZ)(FG)</option>
                        <option value="COVER THERMO 55AA 2MD (FG)">COVER THERMO 55AA 2MD (FG)</option>
                        <option value="CROWN HANDLE MATT BLACK 2 (FG)">CROWN HANDLE MATT BLACK 2 (FG)</option>
                        <option value="CYLINDER BLOCK GZ52 - 632.EFI (FG)">CYLINDER BLOCK GZ52 - 632.EFI (FG)</option>
                        <option value="CYLINDER BLOCK GZ52 HOLE-642.CARBU (FG)">CYLINDER BLOCK GZ52 HOLE-642.CARBU (FG)</option>
                        <option value="CYLINDER BLOCK GZ520 - EG633 (FG)">CYLINDER BLOCK GZ520 - EG633 (FG)</option>
                        <option value="CYLINDER COMP K25 (FG)">CYLINDER COMP K25 (FG)</option>
                        <option value="CYLINDER COMP KVY (FG)">CYLINDER COMP KVY (FG)</option>
                        <option value="CYLINDER COMP KZL (FG)">CYLINDER COMP KZL (FG)</option>
                        <option value="FAN BRACKET EA 330-E3-NB1 (FG)">FAN BRACKET EA 330-E3-NB1 (FG)</option>
                        <option value="FAN BRACKET R K70-T (FG)">FAN BRACKET R K70-T (FG)</option>
                        <option value="FAN EA 330-E3-NB 1 (FG)">FAN EA 330-E3-NB 1 (FG)</option>
                        <option value="FAN R K70-T (FG)">FAN R K70-T (FG)</option>
                        <option value="FLANGE DRIVEN K41A (FG)">FLANGE DRIVEN K41A (FG)</option>
                        <option value="FLANGE DRIVEN K41A SPAREPART (FG)">FLANGE DRIVEN K41A SPAREPART (FG)</option>
                        <option value="FLANGE DRIVEN KYZ (FG)">FLANGE DRIVEN KYZ (FG)</option>
                        <option value="FRONT COVER (FG)">FRONT COVER (FG)</option>
                        <option value="FRONT COVER 4HG-1 (FG)">FRONT COVER 4HG-1 (FG)</option>
                        <option value="GARNISH L KCJV (FG)">GARNISH L KCJV (FG)</option>
                        <option value="GARNISH R KCJV (FG)">GARNISH R KCJV (FG)</option>
                        <option value="HOLDER  R K47A (FG)">HOLDER  R K47A (FG)</option>
                        <option value="HOLDER ASSY L K45 (FG)">HOLDER ASSY L K45 (FG)</option>
                        <option value="HOLDER ASSY L STEP K15G (FG)">HOLDER ASSY L STEP K15G (FG)</option>
                        <option value="HOLDER ASSY L STEP K15P (FG)">HOLDER ASSY L STEP K15P (FG)</option>
                        <option value="HOLDER ASSY L STEP K3BA (FG)">HOLDER ASSY L STEP K3BA (FG)</option>
                        <option value="HOLDER ASSY R K45 (FG)">HOLDER ASSY R K45 (FG)</option>
                        <option value="HOLDER FORK UPPER LX 150 BLACK (FG)">HOLDER FORK UPPER LX 150 BLACK (FG)</option>
                        <option value="HOLDER FORK UPPER LX 150 PHANTOM SILVER">HOLDER FORK UPPER LX 150 PHANTOM SILVER</option>
                        <option value="HOLDER L NH-A30M DIG SILVER K41A (FG)">HOLDER L NH-A30M DIG SILVER K41A (FG)</option>
                        <option value="HOLDER L PILL STEP KYZ NH-A30MDIG SV(FG)">HOLDER L PILL STEP KYZ NH-A30MDIG SV(FG)</option>
                        <option value="HOLDER L PILLION K03S (FG)">HOLDER L PILLION K03S (FG)</option>
                        <option value="HOLDER PIVOT ASSY KYZ (FG)">HOLDER PIVOT ASSY KYZ (FG)</option>
                        <option value="HOLDER PIVOT KYZ (FG)">HOLDER PIVOT KYZ (FG)</option>
                        <option value="HOLDER R DD NH-A30M D SIL K41A (FG)">HOLDER R DD NH-A30M D SIL K41A (FG)</option>
                        <option value="HOLDER R PIL KYZ NH-A30M DIG SV (FG)">HOLDER R PIL KYZ NH-A30M DIG SV (FG)</option>
                        <option value="HOLDER R PILL STEP KYZ NH-A30MDIG SV(FG)">HOLDER R PILL STEP KYZ NH-A30MDIG SV(FG)</option>
                        <option value="HOLDER R PILLION K03S (FG)">HOLDER R PILLION K03S (FG)</option>
                        <option value="HOLDER R SD NH-A30M D SIL K41A (FG)">HOLDER R SD NH-A30M D SIL K41A (FG)</option>
                        <option value="HOUSING CLUTCH 37090 - 210W (479 W)(FG)">HOUSING CLUTCH 37090 - 210W (479 W)(FG)</option>
                        <option value="HOUSING SHIFT LEVER D40D (FG)">HOUSING SHIFT LEVER D40D (FG)</option>
                        <option value="HOUSING SUB-ASSY, WATER OUTLET (FG)">HOUSING SUB-ASSY, WATER OUTLET (FG)</option>
                        <option value="HOUSING WATER OUTLET (FG)">HOUSING WATER OUTLET (FG)</option>
                        <option value="HUB COMP REAR KVG (PACKAGING ONLY) (FG)">HUB COMP REAR KVG (PACKAGING ONLY) (FG)</option>
                        <option value="HUB COMP REAR KVG ASPIRA (FG)">HUB COMP REAR KVG ASPIRA (FG)</option>
                        <option value="HUB COMP REAR NH255 SILVER KWB/W (FG)">HUB COMP REAR NH255 SILVER KWB/W (FG)</option>
                        <option value="HUB FRONT DISC KVB ASPIRA (FG)">HUB FRONT DISC KVB ASPIRA (FG)</option>
                        <option value="HUB FRONT WHEEL DISC KVB (PACK.ONLY)(FG)">HUB FRONT WHEEL DISC KVB (PACK.ONLY)(FG)</option>
                        <option value="HUB FRONT WHEEL NH-255M SILVER KWB (FG)">HUB FRONT WHEEL NH-255M SILVER KWB (FG)</option>
                        <option value="INSULATOR , INTAKE MANIFOLD NO.1 (FG)">INSULATOR , INTAKE MANIFOLD NO.1 (FG)</option>
                        <option value="INTAKE MANIFOLD HINO (FG)">INTAKE MANIFOLD HINO (FG)</option>
                        <option value="MANIFOLD INTAKE 715B (FG)">MANIFOLD INTAKE 715B (FG)</option>
                        <option value="OIL PUMP ASSY K2SA (FG)">OIL PUMP ASSY K2SA (FG)</option>
                        <option value="OIL PUMP ASSY KVB (FG)">OIL PUMP ASSY KVB (FG)</option>
                        <option value="OIL PUMP SET K0JA (FG)">OIL PUMP SET K0JA (FG)</option>
                        <option value="OIL PUMP SET K1AA (FG)">OIL PUMP SET K1AA (FG)</option>
                        <option value="OIL PUMP SET K1AA (PACK. ONLY) (FG)">OIL PUMP SET K1AA (PACK. ONLY) (FG)</option>
                        <option value="OIL SEPARATOR ASSY K0JA(FG)">OIL SEPARATOR ASSY K0JA(FG)</option>
                        <option value="OIL SEPARATOR ASSY K2FA (FG)">OIL SEPARATOR ASSY K2FA (FG)</option>
                        <option value="OUTER TUBE L Y2DP METALIC MATT BLACK(FG)">OUTER TUBE L Y2DP METALIC MATT BLACK(FG)</option>
                        <option value="OUTER TUBE R Y2DP METALIC MATT BLACK(FG)">OUTER TUBE R Y2DP METALIC MATT BLACK(FG)</option>
                        <option value="PANEL ASSY REAR BRAKE KWWX GREY (FG)">PANEL ASSY REAR BRAKE KWWX GREY (FG)</option>
                        <option value="PANEL ASSY REAR BRAKE KWWX SILVER (FG)">PANEL ASSY REAR BRAKE KWWX SILVER (FG)</option>
                        <option value="PASSAGE COMP EGR VALVE (FG)">PASSAGE COMP EGR VALVE (FG)</option>
                        <option value="PEDAL COMP BRAKE ASSY K15G (FG)">PEDAL COMP BRAKE ASSY K15G (FG)</option>
                        <option value="PEDAL COMP BRAKE ASSY K15P (FG)">PEDAL COMP BRAKE ASSY K15P (FG)</option>
                        <option value="PEDAL COMP BRAKE ASSY K3BA (FG)">PEDAL COMP BRAKE ASSY K3BA (FG)</option>
                        <option value="PIPE AIR INLET ML288384 (FG)">PIPE AIR INLET ML288384 (FG)</option>
                        <option value="PIPE AIR INLET ML315769 (FG)">PIPE AIR INLET ML315769 (FG)</option>
                        <option value="PIPE ASSY INTAKE 415B (FG)">PIPE ASSY INTAKE 415B (FG)</option>
                        <option value="PIPE COMP INLET KPH (FG)">PIPE COMP INLET KPH (FG)</option>
                        <option value="PIPE COMP INLET KWWX (FG)">PIPE COMP INLET KWWX (FG)</option>
                        <option value="PIPE INTAKE (FG)">PIPE INTAKE (FG)</option>
                        <option value="PIPE INTAKE HPDC 17113-0U050 (FG)">PIPE INTAKE HPDC 17113-0U050 (FG)</option>
                        <option value="PIPE RADIATOR (FG)">PIPE RADIATOR (FG)</option>
                        <option value="PIPE SUB-ASSY WATER BY-PASS 60U020 (FG)">PIPE SUB-ASSY WATER BY-PASS 60U020 (FG)</option>
                        <option value="PIPE SUB-ASSY WATER BY-PASS 60U030 (FG)">PIPE SUB-ASSY WATER BY-PASS 60U030 (FG)</option>
                        <option value="PLATE COMP EGR (FG)">PLATE COMP EGR (FG)</option>
                        <option value="PLATE COMP EGR 2TQ (FG)">PLATE COMP EGR 2TQ (FG)</option>
                        <option value="PROSES ALODIN K84 SET (FG)">PROSES ALODIN K84 SET (FG)</option>
                        <option value="PUMP ASSY WATER K1ZG (FG)">PUMP ASSY WATER K1ZG (FG)</option>
                        <option value="PUMP ASSY WATER K1ZG PACK.ONLY(FG)">PUMP ASSY WATER K1ZG PACK.ONLY(FG)</option>
                        <option value="PUMP ASSY WATER K59J (FG)">PUMP ASSY WATER K59J (FG)</option>
                        <option value="PUMP ASSY WATER KZRA (FG)">PUMP ASSY WATER KZRA (FG)</option>
                        <option value="QUADRANT BOX (FG)">QUADRANT BOX (FG)</option>
                        <option value="RAIL GRAB K396 NH255M SHIMER SILVER (FG)">RAIL GRAB K396 NH255M SHIMER SILVER (FG)</option>
                        <option value="RAIL GRAB K46A NH-303 AXIS GREY (FG)">RAIL GRAB K46A NH-303 AXIS GREY (FG)</option>
                        <option value="RAIL GRAB KYZA NH-303M MATT AXISGREY(FG)">RAIL GRAB KYZA NH-303M MATT AXISGREY(FG)</option>
                        <option value="RAIL GRAB KYZA NH-A30 M DIGITAL SLV (FG)">RAIL GRAB KYZA NH-A30 M DIGITAL SLV (FG)</option>
                        <option value="RAIL GRAB NH-303 AXIS GREY K41A (FG)">RAIL GRAB NH-303 AXIS GREY K41A (FG)</option>
                        <option value="RAIL R GRAB K59J NH-229MU ANCHOR GM(FG)">RAIL R GRAB K59J NH-229MU ANCHOR GM(FG)</option>
                        <option value="RAIL R GRAB K59J NH-B12M AFFINITY BM(FG)">RAIL R GRAB K59J NH-B12M AFFINITY BM(FG)</option>
                        <option value="RAIL REAR GRAB K2SA NH-303 M GREY(FG)">RAIL REAR GRAB K2SA NH-303 M GREY(FG)</option>
                        <option value="RAIL REAR GRAB K59A NH-303 M (FG)">RAIL REAR GRAB K59A NH-303 M (FG)</option>
                        <option value="RAIL REAR GRAB K59J NH-303 M (FG)">RAIL REAR GRAB K59J NH-303 M (FG)</option>
                        <option value="RAIL REAR GRAB KZRA NH-303 M GREY (FG)">RAIL REAR GRAB KZRA NH-303 M GREY (FG)</option>
                        <option value="RAIL RR GRAB KVB NH-255 SILVER ( FG)">RAIL RR GRAB KVB NH-255 SILVER ( FG)</option>
                        <option value="RAIL RR GRAB KVB NH-303M GREY (FG)">RAIL RR GRAB KVB NH-303M GREY (FG)</option>
                        <option value="RAIL RR GRAB KVLP NH-225M SILVER (FG)">RAIL RR GRAB KVLP NH-225M SILVER (FG)</option>
                        <option value="RAIL RR GRAB KVLP NH-303 GREY (FG)">RAIL RR GRAB KVLP NH-303 GREY (FG)</option>
                        <option value="RAIL RR GRAB KZLG NH-303 GREY (FG)">RAIL RR GRAB KZLG NH-303 GREY (FG)</option>
                        <option value="RAILRR GRAB KZRA NH-177 M VOSTOC SV(FG)">RAILRR GRAB KZRA NH-177 M VOSTOC SV(FG)</option>
                        <option value="RAILRR GRAB KZRA NH-MELATITE DEEP BK(FG)">RAILRR GRAB KZRA NH-MELATITE DEEP BK(FG)</option>
                        <option value="RETAINER 2WD (632) (FG)">RETAINER 2WD (632) (FG)</option>
                        <option value="RETAINER 2WD 614 (FG)">RETAINER 2WD 614 (FG)</option>
                        <option value="RETAINER 4WD (632) (FG)">RETAINER 4WD (632) (FG)</option>
                        <option value="RETAINER OK151 4WD (632) (FG)">RETAINER OK151 4WD (632) (FG)</option>
                        <option value="RETAINER OKO61 4WD 614 (FG)">RETAINER OKO61 4WD 614 (FG)</option>
                        <option value="ROCKER COVER 4D34 (FG)">ROCKER COVER 4D34 (FG)</option>
                        <option value="ROCKER COVER 4D56-KZD LOKAL (FG)">ROCKER COVER 4D56-KZD LOKAL (FG)</option>
                        <option value="ROCKER COVER 4D56-SLD (FG)">ROCKER COVER 4D56-SLD (FG)</option>
                        <option value="SELECT LEVER 366L (FG)">SELECT LEVER 366L (FG)</option>
                        <option value="SELECT LEVER D80N (FG)">SELECT LEVER D80N (FG)</option>
                        <option value="SELECT LEVER Y230 (FG)">SELECT LEVER Y230 (FG)</option>
                        <option value="SET BRAKE SHOE & SPRING KZLG (FG)">SET BRAKE SHOE & SPRING KZLG (FG)</option>
                        <option value="SET BRAKE SHOE KZLG (PACKAGING ONLY) (FG">SET BRAKE SHOE KZLG (PACKAGING ONLY) (FG</option>
                        <option value="SHOE SET,BRAKE KVR (FG)">SHOE SET,BRAKE KVR (FG)</option>
                        <option value="SLIDER COMP C-CHAIN TENSIONER 2CF (FG)">SLIDER COMP C-CHAIN TENSIONER 2CF (FG)</option>
                        <option value="SPACER EGR (FG)">SPACER EGR (FG)</option>
                        <option value="STAY L KAWASAKI FLAT METT GREY (FG)">STAY L KAWASAKI FLAT METT GREY (FG)</option>
                        <option value="STAY R KAWASAKI FLAT METT GREY (FG)">STAY R KAWASAKI FLAT METT GREY (FG)</option>
                        <option value="STEERING WHEEL D01 (FG)">STEERING WHEEL D01 (FG)</option>
                        <option value="STEERING WHEEL EFC (FG)">STEERING WHEEL EFC (FG)</option>
                        <option value="STEP  L K47A (FG)">STEP  L K47A (FG)</option>
                        <option value="STEP ASSY L K47A (FG)">STEP ASSY L K47A (FG)</option>
                        <option value="STEP ASSY L NH-A30M DIG SILVER K41A (FG)">STEP ASSY L NH-A30M DIG SILVER K41A (FG)</option>
                        <option value="STEP ASSY L PIL KYZ NH-A30M DIG SV (FG)">STEP ASSY L PIL KYZ NH-A30M DIG SV (FG)</option>
                        <option value="STEP ASSY L PILLION K03S (FG)">STEP ASSY L PILLION K03S (FG)</option>
                        <option value="STEP ASSY L PILLION K07A (FG)">STEP ASSY L PILLION K07A (FG)</option>
                        <option value="STEP ASSY L PILLION K56A (FG)">STEP ASSY L PILLION K56A (FG)</option>
                        <option value="STEP ASSY L PILLION KTM/KPHX  ASSY(FG)">STEP ASSY L PILLION KTM/KPHX  ASSY(FG)</option>
                        <option value="STEP ASSY L PILLION KTMY (FG)">STEP ASSY L PILLION KTMY (FG)</option>
                        <option value="STEP ASSY L PILLION KVLP (ANTI RUST)(FG)">STEP ASSY L PILLION KVLP (ANTI RUST)(FG)</option>
                        <option value="STEP ASSY L PILLION KWB (FG)">STEP ASSY L PILLION KWB (FG)</option>
                        <option value="STEP ASSY L PILLION KWWX (ANTI RUST)(FG)">STEP ASSY L PILLION KWWX (ANTI RUST)(FG)</option>
                        <option value="STEP ASSY L PILLION KWWX (FG)">STEP ASSY L PILLION KWWX (FG)</option>
                        <option value="STEP ASSY L PILLION KWZA (FG)">STEP ASSY L PILLION KWZA (FG)</option>
                        <option value="STEP ASSY R DD NH-A30M D SIL K41A (FG)">STEP ASSY R DD NH-A30M D SIL K41A (FG)</option>
                        <option value="STEP ASSY R K47A (FG)">STEP ASSY R K47A (FG)</option>
                        <option value="STEP ASSY R PIL KVLP D.DISC ANTI RUST/FG">STEP ASSY R PIL KVLP D.DISC ANTI RUST/FG</option>
                        <option value="STEP ASSY R PIL KVLP S.DISC ANTI RUST/FG">STEP ASSY R PIL KVLP S.DISC ANTI RUST/FG</option>
                        <option value="STEP ASSY R PIL KYZ NH-A30M DIG SV (FG)">STEP ASSY R PIL KYZ NH-A30M DIG SV (FG)</option>
                        <option value="STEP ASSY R PILLION K03S (FG)">STEP ASSY R PILLION K03S (FG)</option>
                        <option value="STEP ASSY R PILLION K07A (FG)">STEP ASSY R PILLION K07A (FG)</option>
                        <option value="STEP ASSY R PILLION K56A (FG)">STEP ASSY R PILLION K56A (FG)</option>
                        <option value="STEP ASSY R PILLION KWB (FG)">STEP ASSY R PILLION KWB (FG)</option>
                        <option value="STEP ASSY R PILLION KWWT (FG)">STEP ASSY R PILLION KWWT (FG)</option>
                        <option value="STEP ASSY R PILLION KWWX (ANTI RUST)(FG)">STEP ASSY R PILLION KWWX (ANTI RUST)(FG)</option>
                        <option value="STEP ASSY R PILLION KWWX (FG)">STEP ASSY R PILLION KWWX (FG)</option>
                        <option value="STEP ASSY R PILLION KWZA (FG)">STEP ASSY R PILLION KWZA (FG)</option>
                        <option value="STEP ASSY R SD NH-A30M D SIL K41A (FG)">STEP ASSY R SD NH-A30M D SIL K41A (FG)</option>
                        <option value="STEP ASSY, R PILLION K56F (FG)">STEP ASSY, R PILLION K56F (FG)</option>
                        <option value="STEP L PIL KYZ NH-A30M DIG SV (FG)">STEP L PIL KYZ NH-A30M DIG SV (FG)</option>
                        <option value="SUB ASSY OIL PAN (FG)">SUB ASSY OIL PAN (FG)</option>
                        <option value="SUPPORT CAM POSITION SENSOR (FG)">SUPPORT CAM POSITION SENSOR (FG)</option>
                        <option value="SUPPORT FUEL TANK 1 RD65T(FG)">SUPPORT FUEL TANK 1 RD65T(FG)</option>
                        <option value="SUPPORT FUEL TANK 1 RD85DI - S/EA11">SUPPORT FUEL TANK 1 RD85DI - S/EA11</option>
                        <option value="SUPPORT FUEL TANK RD65T NEW (FG)">SUPPORT FUEL TANK RD65T NEW (FG)</option>
                        <option value="SUPPORTING ARM LH 4D34G (FG)">SUPPORTING ARM LH 4D34G (FG)</option>
                        <option value="SUPPORTING ARM RH 4D34G (FG)">SUPPORTING ARM RH 4D34G (FG)</option>
                        <option value="SWING ARM ABS K2SA (FG)">SWING ARM ABS K2SA (FG)</option>
                        <option value="SWING ARM ASSY K0WL (FG)">SWING ARM ASSY K0WL (FG)</option>
                        <option value="SWING ARM ASSY K59J (FG)">SWING ARM ASSY K59J (FG)</option>
                        <option value="SWING ARM CBS K2SA (FG)">SWING ARM CBS K2SA (FG)</option>
                        <option value="SWING ARM KOWA (FG)">SWING ARM KOWA (FG)</option>
                        <option value="TRANSMISSION CASE 4D56 (FG)">TRANSMISSION CASE 4D56 (FG)</option>
                        <option value="TWIN HEAD SUB ASSY (FG)">TWIN HEAD SUB ASSY (FG)</option>
                        <option value="UPPER BRACKET SUZUKI XB975-CD (FG)">UPPER BRACKET SUZUKI XB975-CD (FG)</option>
                        <option value="UPPER BRACKET SUZUKI XB975-CD BLACK (FG)">UPPER BRACKET SUZUKI XB975-CD BLACK (FG)</option>
                    </select>
                    <script>
                        $(document).ready(function() {
                            $("#nama_part").select2({
                                dropdownParent: $("#staticBackdrop")
                            });
                        });
                    </script>
                </div>
                <div class="col-12 mb-3">
                    <label class="fw-bold" for="problem">problem <sup>*</sup></label>
                    <input type="text" class="form-control" name="problem" id="problem" aria-describedby="problemHelp" required>
                </div>
                <div class="col-4 mb-3">
                    <label class="fw-bold" for="pic">PIC <sup>*</sup></label>
                    <input type="text" class="form-control" name="pic" id="pic" aria-describedby="picHelp" required>
                </div>
                <div class="col-4 mb-3">
                    <label class="fw-bold" for="pic_qc">PIC QC <sup>*</sup></label>
                    <input type="text" class="form-control" name="pic_qc" id="pic_qc" aria-describedby="pic_qcHelp" required>
                </div>
                <div class="col-4 mb-3">
                    <label class="fw-bold" for="pic_penerima">PIC Penerima</label>
                    <input type="text" class="form-control" name="pic_penerima" id="pic_penerima" aria-describedby="pic_penerimaHelp">
                </div>
                <div class="col-6 mb-3">
                    <label class="fw-bold" for="pic_penerima">Facta Occure <sup>*</sup></label>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="occure" value="MAN" id="occure_MAN" >
                                <label class="form-check-label" for="occure_MAN">
                                  MAN
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="occure" value="METHODE" id="occure_METHODE">
                                <label class="form-check-label" for="occure_METHODE">
                                  METHODE
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="occure" value="MACHINE" id="occure_MACHINE">
                                <label class="form-check-label" for="occure_MACHINE">
                                  MACHINE
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="occure" value="MATERIAL" id="occure_MATERIAL">
                                <label class="form-check-label" for="occure_MATERIAL">
                                  MATERIAL
                                </label>
                            </div>
                        </div>
                        <div class="col-8">
                            <textarea class="form-control" name="occure_deskripsi" id="occure_deskripsi" cols="28" rows="4" placeholder="Deskripsi occure"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <label class="fw-bold" for="pic_penerima">Facta Outflow <sup>*</sup></label>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="outflow" value="MAN" id="outflow_MAN" >
                                <label class="form-check-label" for="outflow_MAN">
                                  MAN
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="outflow" value="METHODE" id="outflow_METHODE">
                                <label class="form-check-label" for="outflow_METHODE">
                                  METHODE
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="outflow" value="MACHINE" id="outflow_MACHINE">
                                <label class="form-check-label" for="outflow_MACHINE">
                                  MACHINE
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="outflow" value="MATERIAL" id="outflow_MATERIAL">
                                <label class="form-check-label" for="outflow_MATERIAL">
                                  MATERIAL
                                </label>
                            </div>
                        </div>
                        <div class="col-8">
                            <textarea class="form-control" name="outflow_deskripsi" id="outflow_deskripsi" cols="28" rows="4" placeholder="Deskripsi outflow"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <label class="fw-bold" for="Klasifikasi Masalah mb-3">Klasifikasi Masalah /pcs<sup>*</sup></label>
                    <div class="row">
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Bocor</span>
                                <input type="number" class="form-control" id="bocor" name="bocor" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Flowline</span>
                                <input type="number" class="form-control" id="flowline" name="flowline" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Mach_other</span>
                                <input type="number" class="form-control" id="mach_other" name="mach_other" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">No_tap</span>
                                <input type="number" class="form-control" id="no_tap" name="no_tap" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Paint Meler</span>
                                <input type="number" class="form-control" id="paint_meler" name="paint_meler" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Paint Tipis</span>
                                <input type="number" class="form-control" id="paint_tipis" name="paint_tipis" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Dent</span>
                                <input type="number" class="form-control" id="dent" name="dent" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Gompal</span>
                                <input type="number" class="form-control" id="gompal" name="gompal" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">NG Assy</span>
                                <input type="number" class="form-control" id="ng_assy" name="ng_assy" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Other</span>
                                <input type="number" class="form-control" id="other" name="other" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Paint Other</span>
                                <input type="number" class="form-control" id="paint_other" name="paint_other" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Porosity</span>
                                <input type="number" class="form-control" id="porosity" name="porosity" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Dimensi Cast</span>
                                <input type="number" class="form-control" id="dimensi_cast" name="dimensi_cast" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Jamur</span>
                                <input type="number" class="form-control" id="jamur" name="jamur" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">NG Assy Mach</span>
                                <input type="number" class="form-control" id="ng_assy_mach" name="ng_assy_mach" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">O Proses F</span>
                                <input type="number" class="form-control" id="o_proses_f" name="o_proses_f" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Paint Peel Off</span>
                                <input type="number" class="form-control" id="paint_peel_off" name="paint_peel_off" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Retak</span>
                                <input type="number" class="form-control" id="retak" name="retak" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Dimensi Mach</span>
                                <input type="number" class="form-control" id="dimensi_mach" name="dimensi_mach" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">K Proses Fin</span>
                                <input type="number" class="form-control" id="k_proses_fin" name="k_proses_fin" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">NG ASSY S/C</span>
                                <input type="number" class="form-control" id="ng_assy_sc" name="ng_assy_sc" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Paint Kotor</span>
                                <input type="number" class="form-control" id="paint_kotor" name="paint_kotor" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Paint Scratch</span>
                                <input type="number" class="form-control" id="paint_scratch" name="paint_scratch" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Undercut</span>
                                <input type="number" class="form-control" id="undercut" name="undercut" value="0">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
         <div class="col-4 ">
            <div class="row">
                <div class="col-6 mb-3">
                    <label class="fw-bold" for="Kategori Claim" class="form-label">Kategori Claim : <sup>*</sup></label> <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kategori_claim" id="kategori_claim_RC" value="RC">
                        <label class="form-check-label" for="kategori_claim">RC</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kategori_claim" id="kategori_claim_BNF" value="BNF">
                        <label class="form-check-label" for="kategori_claim">BNF</label>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <label class="fw-bold" for="kejadian Claim" class="form-label">Kejadian Claim : <sup>*</sup></label> <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kejadian_claim" id="kejadian_claim_REPEAT" value="REPEAT">
                        <label class="form-check-label" for="kejadian_claim">RPT</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kejadian_claim" id="kejadian_claim_FIRST" value="FIRST">
                        <label class="form-check-label" for="kejadian_claim">FRS</label>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <label class="fw-bold" for="Kategori Claim" class="form-label">Kategori Claim Market : <sup>*</sup></label> <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kategori_claim_market" id="kategori_claim_market_REGULER" value="REGULER">
                        <label class="form-check-label" for="kategori_claim_market">REGULER</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kategori_claim_market" id="kategori_claim_market_MARKET" value="MARKET">
                        <label class="form-check-label" for="kategori_claim_market">MARKET&ensp;</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kategori_claim_market" id="kategori_claim_market_REM" value="REM">
                        <label class="form-check-label" for="kategori_claim_REM">REM</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kategori_claim_market" id="kategori_claim_market_EXPORT" value="EXPORT">
                        <label class="form-check-label" for="kategori_claim_EXPORT">EXPORT&ensp;</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kategori_claim_market" id="kategori_claim_market_DPWC_YES" value="DPWC_YES">
                        <label class="form-check-label" for="kategori_claim_DPWC">DPWC - Y</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kategori_claim_market" id="kategori_claim_market_DPWC_NO" value="DPWC_NO">
                        <label class="form-check-label" for="kategori_claim_DPWC">DPWC - N</label>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <label class="fw-bold" for="no_dpwc">Nomor Dokumen DPWC</label>
                    <input type="text" class="form-control" name="no_dpwc" id="no_dpwc" aria-describedby="no_dpwcHelp">
                </div>
                <div class="col-12 mb-3">
                    <label for="status_bnf" class="fw-bold">Status BNF : <sup>*</sup></label> <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status_bnf" id="status_bnf_OPEN" value="OPEN">
                        <label class="form-check-label" for="status_bnf">OPEN</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status_bnf" id="status_bnf_CLOSE" value="CLOSE">
                        <label class="form-check-label" for="status_bnf">CLOSE</label>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <label for="opl" class="fw-bold">One Point Lesson : <sup>*</sup></label> <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="opl" id="opl_OPEN" value="OPEN">
                        <label class="form-check-label" for="opl">OPEN</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="opl" id="opl_CLOSE" value="CLOSE">
                        <label class="form-check-label" for="opl">CLOSE</label>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <p class="text-center fw-bold fs-5">SAKANOBORI<sup>*</sup></p>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:150px">CUSTOMER</span>
                                <input type="number" class="form-control" id="customer" name="customer" value="0">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:150px">SELOG</span>
                                <input type="number" class="form-control" id="selog" name="selog" value="0">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:150px">DELSI</span>
                                <input type="number" class="form-control" id="delsi" name="delsi" value="0">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:150px">PDC</span>
                                <input type="number" class="form-control" id="PDC" name="PDC" value="0">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:150px">FSCM</span>
                                <input type="number" class="form-control" id="FSCM" name="FSCM" value="0">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:150px">NM</span>
                                <input type="number" class="form-control" id="NM" name="NM" value="0">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark text-center fw-bold" id="basic-addon1" style="width:165px">TOTAL NG</span>
                                <input type="number" class="form-control text-center" id="total_ng" name="total_ng" value="0" disabled readonly>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark text-center fw-bold" id="basic-addon1" style="width:165px">STOCK</span>
                                <input type="number" class="form-control text-center" id="stock" name="stock" value="0" disabled readonly>
                            </div>
                        </div>
                    </div>
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
@elseif (Request::url() == url('/modal/deliveryQuality'))
<form action="{{ url('/modal/deliveryQuality/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
    @csrf
    <div class="row justify-content-end">
        <div class="col-4 mb-3 align-self-end">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Tanggal</span>
                <input type="date" class="form-control float-end" name="tanggal" id="tanggal" aria-describedby="tanggalHelp" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">All Customer</span>
                <input type="number" class="form-control" id="all_customer" name="all_customer" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">ADM</span>
                <input type="number" class="form-control" id="adm" name="adm" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">AHM P1</span>
                <input type="number" class="form-control" id="ahm_p1" name="ahm_p1" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">AHM P2</span>
                <input type="number" class="form-control" id="ahm_p2" name="ahm_p2" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">AHM P3</span>
                <input type="number" class="form-control" id="ahm_p3" name="ahm_p3" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">AHM P4</span>
                <input type="number" class="form-control" id="ahm_p4" name="ahm_p4" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">AHM P5</span>
                <input type="number" class="form-control" id="ahm_p5" name="ahm_p5" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">AHM REM</span>
                <input type="number" class="form-control" id="ahm_rem" name="ahm_rem" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">AISIN</span>
                <input type="number" class="form-control" id="aisin" name="aisin" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">ASPIRA</span>
                <input type="number" class="form-control" id="aspira" name="aspira" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">CAI</span>
                <input type="number" class="form-control" id="cai" name="cai" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">DENSO</span>
                <input type="number" class="form-control" id="denso" name="denso" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">DNP</span>
                <input type="number" class="form-control" id="dnp" name="dnp" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">HINO</span>
                <input type="number" class="form-control" id="hino" name="hino" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">HPM</span>
                <input type="number" class="form-control" id="hpm" name="hpm" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">IGP</span>
                <input type="number" class="form-control" id="igp" name="igp" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">J-TEKT</span>
                <input type="number" class="form-control" id="j_tekt" name="j_tekt" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">KAWASAKI</span>
                <input type="number" class="form-control" id="kawasaki" name="kawasaki" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">KUBOTA</span>
                <input type="number" class="form-control" id="kubota" name="kubota" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">KAYABA</span>
                <input type="number" class="form-control" id="kayaba" name="kayaba" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">MHASK</span>
                <input type="number" class="form-control" id="mhask" name="mhask" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">MII</span>
                <input type="number" class="form-control" id="mii" name="mii" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">MKM</span>
                <input type="number" class="form-control" id="mkm" name="mkm" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">NISSAN</span>
                <input type="number" class="form-control" id="nissan" name="nissan" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">NKI</span>
                <input type="number" class="form-control" id="nki" name="nki" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">OKAMOTO</span>
                <input type="number" class="form-control" id="okamoto" name="okamoto" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">SUZUKI</span>
                <input type="number" class="form-control" id="suzuki" name="suzuki" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">SKC</span>
                <input type="number" class="form-control" id="skc" name="skc" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">TMMIN</span>
                <input type="number" class="form-control" id="tmmin" name="tmmin" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">TOYODA GOSAI</span>
                <input type="number" class="form-control" id="toyoda_gosai" name="toyoda_gosai" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">YAMAHA</span>
                <input type="number" class="form-control" id="yamaha" name="yamaha" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">YUTAKA</span>
                <input type="number" class="form-control" id="yutaka" name="yutaka" value="0">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="tambahaninputan" id="tambahaninputan"></div>
        <div class="col" >
            <button type="submit" id="submit" class="btn btn-primary float-end"><i class="fa-regular fa-floppy-disk"></i> Save</button>
        </div>
    </div>

</form>
@elseif(Request::url() == url('/modal/detail-henkaten'))
<h1>TESTING AJA</h1>
@else
    <p>THIS IS BAD</p>

    </div>
@endif



