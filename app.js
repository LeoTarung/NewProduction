const express = require("express");
const app = express();
const http = require("http");
const server = require("http").createServer(app);
const io = require("socket.io")(server, {
    cors: { origin: "*" },
});
const net = require("net"); //untuk timbangan

//==========[' LIB FOR MYSQL ']==========//
const mysql = require("mysql2");
const connection = mysql.createConnection({
    host: "localhost",
    user: "root",
    database: "production_nusametal",
});


//==========[' FUNCTION CONVERT TO ID FROM MATERIAL ']==========//
function ConvertMaterialToID(material){
    var data;
    if(material == "AC2B"){
       data = 1;
    }else if(material == "AC2BF"){
       data = 2;
    }else if(material == "AC4B"){
       data = 3;
    }else if(material == "AC4CH"){
       data = 4;
    }else if(material == "ADC 12"){
       data = 5;
    }else if(material == "ADC 12 NK"){
       data = 6;
    }else if(material == "HD-2"){
       data = 7;
    }else if(material == "HD-4"){
       data = 8;
    }else if(material == "YH3R"){
       data = 9;
    }else if(material == "BM HD-2"){
       data = 10;
    }else{
       data = 0;
    }
    return data;
}

//==========[' TIMBANGAN SAMPING MUSHOLA ']==========//
const tcpServer = net.createServer((socket) => {
    console.log("TIMBANGAN connected");

    socket.on("data", (data) => {
        console.log(`Received data from TIMBANGAN: ${data}`);
        var elements = data.toString().split(" | ");
        if(elements[7] == ""){
            // elements[7] = ""
            query = "INSERT INTO db_fromtimbanganingot (kode_sap, material, nrp_penimbang, nama_penimbang, id_vendor, nama_vendor, berat, store_location, bisnis_unit, kedatangan, diverifikasi) VALUES ('"+elements[0]+"', '"+elements[1]+"', '"+elements[2]+"', '"+elements[3]+"', '"+elements[4]+"', '"+elements[5]+"', '"+elements[6]+"', '"+elements[8]+"', '"+elements[9]+"', '"+elements[10]+"', '"+elements[10]+"')"
        }else{
            // elements[7] = elements[7]
            query = "INSERT INTO db_fromtimbanganingot (kode_sap, material, nrp_penimbang, nama_penimbang, id_vendor, nama_vendor, berat, lot_bundle, store_location, bisnis_unit, kedatangan, diverifikasi) VALUES ('"+elements[0]+"', '"+elements[1]+"', '"+elements[2]+"', '"+elements[3]+"', '"+elements[4]+"', '"+elements[5]+"', '"+elements[6]+"', '"+elements[7]+"', '"+elements[8]+"', '"+elements[9]+"', '"+elements[10]+"', '"+elements[10]+"')"
        }
        connection.query( query, (err, res) => {
            console.log("ini adalah errornya INSERT: "+err);
                var id_material = ConvertMaterialToID(elements[1]);
                    connection.query("SELECT * FROM db_stockmaterial WHERE sloc='1001' AND material_id="+id_material, (erre, ress) => {
                        console.log("ini adalah errornya GET db_stockmaterial: "+erre);
                        console.log("id materialnya ini : "+id_material);
                            console.log("acktual stock : "+ress[0].actual_stock)
                            console.log("total berat : "+total_berat)
                            console.log("berat ditimabang : "+elements[6])
                            console.log("tipe data aktual stock = "+(typeof ress[0].actual_stock))
                            console.log("tipe data elements[6] = "+(typeof elements[6]))
                            console.log("tipe data elements[6] integer = "+(typeof parseInt(elements[6])))
                            var total_berat = ress[0].actual_stock + parseInt(elements[6])
                            connection.query("UPDATE `db_stockmaterial` SET `actual_stock`='"+total_berat+"' WHERE sloc='1001' AND material_id="+id_material, (erree, res) => {
                                console.log("ini adalah errornya UPDATE db_stockmaterial: "+erree);
                            });
                    });
        });
    });

    socket.on("end", () => {
      console.log("TIMBANGAN disconnected");
    });
  });




//==========[' DECLARE VARIABLE ']==========//
var shift;
var tanggal;
var forklift1;
var material1;

//==========[' DECLARE SHIFT ']==========//
function showTime() {
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var d = ("0" + date.getDate()).slice(-2);
    var b = ("0" + (date.getMonth() + 1)).slice(-2);
    var t = date.getFullYear();

    h = h < 10 ? "0" + h : h;
    m = m < 10 ? "0" + m : m;
    s = s < 10 ? "0" + s : s;
    var time = h + ":" + m + ":" + s + " ";
    var tanggall = t + "-" + b + "-" + d;
    if (time >= "00:00:00" && time < "07:10:00") {
        shiftt = "SHIFT-1";
    } else if (time >= "07:10:00" && time < "16:00:00") {
        shiftt = "SHIFT-2";
    } else if (time >= "16:00:00" && time <= "23:59:59") {
        shiftt = "SHIFT-3";
    } else {
        shiftt = "SHIFT TIDAK TERDEFINISI";
    }
    // console.log("SEKARANG ADALAH SHIFT " + shift);
    // console.log("SEKARANG ADALAH tanggal " + tanggal);
    shift = shiftt;
    tanggal = tanggall;
    setTimeout(showTime, 1000);
}
showTime();

io.on("connection", (socket) => {
    console.log("Connection Berhasil");

    socket.on("disconnect", (socket) => {
        console.log("Koneksi Terputus");
    });

    socket.on("levelMolten", (forklift, material) => {
        forklift1 = forklift;
        material1 = material;
    });

    function AmbilDariDB(){
        //==========[' SELECT ALL STOCK INGOT ']==========//
            connection.query("SELECT * FROM db_stockmaterial WHERE id= 1", (err, res) => {
                socket.emit("stockmaterial-1", res);
            });
            connection.query("SELECT * FROM db_stockmaterial WHERE id= 2", (err, res) => {
                socket.emit("stockmaterial-2", res);
            });
            connection.query("SELECT * FROM db_stockmaterial WHERE id= 3", (err, res) => {
                socket.emit("stockmaterial-3", res);
            });
            connection.query("SELECT * FROM db_stockmaterial WHERE id= 4", (err, res) => {
                socket.emit("stockmaterial-4", res);
            });
            connection.query("SELECT * FROM db_stockmaterial WHERE id= 5", (err, res) => {
                socket.emit("stockmaterial-5", res);
            });
            connection.query("SELECT * FROM db_stockmaterial WHERE id= 6", (err, res) => {
                socket.emit("stockmaterial-6", res);
            });
            connection.query("SELECT * FROM db_stockmaterial WHERE id= 7", (err, res) => {
                socket.emit("stockmaterial-7", res);
            });
            connection.query("SELECT * FROM db_stockmaterial WHERE id= 8", (err, res) => {
                socket.emit("stockmaterial-8", res);
            });
            connection.query("SELECT * FROM db_stockmaterial WHERE id= 9", (err, res) => {
                socket.emit("stockmaterial-9", res);
            });
            connection.query("SELECT * FROM db_stockmaterial WHERE id= 10", (err, res) => {
                socket.emit("stockmaterial-10", res);
            });
            connection.query("SELECT * FROM db_stockmaterial WHERE id= 11", (err, res) => {
                socket.emit("stockmaterial-11", res);
            });
            connection.query("SELECT * FROM db_stockmaterial WHERE id= 12", (err, res) => {
                socket.emit("stockmaterial-12", res);
            });
            connection.query("SELECT * FROM db_stockmaterial WHERE id= 13", (err, res) => {
                socket.emit("stockmaterial-13", res);
            });
            connection.query("SELECT * FROM db_stockmaterial WHERE id= 14", (err, res) => {
                socket.emit("stockmaterial-14", res);
            });
            connection.query("SELECT * FROM db_stockmaterial WHERE id= 15", (err, res) => {
                socket.emit("stockmaterial-15", res);
            });
            connection.query("SELECT * FROM db_stockmaterial WHERE id= 16", (err, res) => {
                socket.emit("stockmaterial-16", res);
            });
            connection.query("SELECT * FROM db_stockmaterial WHERE id= 17", (err, res) => {
                socket.emit("stockmaterial-17", res);
            });
            connection.query("SELECT * FROM db_stockmaterial WHERE id= 18", (err, res) => {
                socket.emit("stockmaterial-18", res);
            });
            connection.query("SELECT * FROM db_stockmaterial WHERE id= 19", (err, res) => {
                socket.emit("stockmaterial-19", res);
            });
            connection.query("SELECT * FROM db_stockmaterial WHERE id= 20", (err, res) => {
                socket.emit("stockmaterial-20", res);
            });

        //==========[' SELECT ALL  FROM MESIN CASTING ']==========//
            connection.query("SELECT * FROM db_mesincasting WHERE material_id=7", (err, res) => {
                socket.emit("MesinCastingHD-2", res);
            });
            connection.query("SELECT * FROM db_mesincasting WHERE material_id=8", (err, res) => {
                socket.emit("MesinCastingHD-4", res);
            });
            connection.query("SELECT * FROM db_mesincasting WHERE material_id=5", (err, res) => {
                socket.emit("MesinCastingADC12", res);
            });
            connection.query("SELECT * FROM db_mesincasting WHERE material_id=9", (err, res) => {
                socket.emit("MesinCastingYH3R", res);
            });


        //==========[' SELECT ALL  FROM MESIN CASTING ']==========//
        connection.query("SELECT * FROM db_mesincasting", (err, res) => {
            socket.emit("AllMesinCasting", res);
        });

        //==========[' SELECT DATA LHPSTRIKO-1 ']==========//
        connection.query(
            "SELECT * FROM db_lhpmelting WHERE mesin='STRIKO-1' AND shift='" +
                shift +
                "' AND tanggal='" +
                tanggal +
                "' ORDER BY id DESC",
            (err, res) => {
                socket.emit("KiriSTRIKO-1", res);
            }
        );

        //==========[' SELECT DATA LHPSTRIKO-2 ']==========//
        connection.query(
            "SELECT * FROM db_lhpmelting WHERE mesin='STRIKO-2' AND shift='" +
                shift +
                "' AND tanggal='" +
                tanggal +
                "' ORDER BY id DESC",
            (err, res) => {
                socket.emit("KiriSTRIKO-2", res);
            }
        );

        //==========[' SELECT DATA LHPSTRIKO-3 ']==========//
        connection.query(
            "SELECT * FROM db_lhpmelting WHERE mesin='STRIKO-3' AND shift='" +
                shift +
                "' AND tanggal='" +
                tanggal +
                "' ORDER BY id DESC",
            (err, res) => {
                socket.emit("KiriSTRIKO-3", res);
            }
        );

        //==========[' SELECT DATA LHPSWIF ASIA ']==========//
        connection.query(
            "SELECT * FROM db_lhpmelting WHERE mesin='SWIF ASIA' AND shift='" +
                shift +
                "' AND tanggal='" +
                tanggal +
                "' ORDER BY id DESC",
            (err, res) => {
                socket.emit("KiriSWIF ASIA", res);
            }
        );

        //==========[' SELECT DATA TahunanSTRIKO-1 ']==========//
        connection.query(
            "SELECT tanggal, SUM(total_charging) AS total_chargings, SUM(ingot) as ingots, IFNULL(SUM(dross) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot + fluxing)* 100, 0 ) as persen_loss, IFNULL(SUM(ingot) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot) * 100, 0) as persen_ingots FROM db_lhpmelting where mesin = 'STRIKO-1' AND YEAR(tanggal) = YEAR(now()) GROUP BY MONTH(tanggal)",
            // "SELECT * FROM db_lhpmelting where mesin = 'STRIKO-1' AND MONTH(tanggal) = MONTH(now()) AND YEAR(tanggal) = YEAR(now())",
            (err, res) => {
                socket.emit("TahunanSTRIKO-1", res);
            }
        );

        //==========[' SELECT DATA TahunanSTRIKO-2 ']==========//
        connection.query(
            "SELECT tanggal, SUM(total_charging) AS total_chargings, SUM(ingot) as ingots, IFNULL(SUM(dross) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot + fluxing)* 100, 0 ) as persen_loss, IFNULL(SUM(ingot) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot) * 100, 0) as persen_ingots FROM db_lhpmelting where mesin = 'STRIKO-2' AND YEAR(tanggal) = YEAR(now()) GROUP BY MONTH(tanggal)",
            // "SELECT * FROM db_lhpmelting where mesin = 'STRIKO-1' AND MONTH(tanggal) = MONTH(now()) AND YEAR(tanggal) = YEAR(now())",
            (err, res) => {
                socket.emit("TahunanSTRIKO-2", res);
            }
        );

        //==========[' SELECT DATA TahunanSTRIKO-3 ']==========//
        connection.query(
            "SELECT tanggal, SUM(total_charging) AS total_chargings, SUM(ingot) as ingots, IFNULL(SUM(dross) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot + fluxing)* 100, 0 ) as persen_loss, IFNULL(SUM(ingot) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot) * 100, 0) as persen_ingots FROM db_lhpmelting where mesin = 'STRIKO-3' AND YEAR(tanggal) = YEAR(now()) GROUP BY MONTH(tanggal)",
            // "SELECT * FROM db_lhpmelting where mesin = 'STRIKO-1' AND MONTH(tanggal) = MONTH(now()) AND YEAR(tanggal) = YEAR(now())",
            (err, res) => {
                socket.emit("TahunanSTRIKO-3", res);
            }
        );

        //==========[' SELECT DATA TahunanSWIF ASIA ']==========//
        connection.query(
            "SELECT tanggal, SUM(total_charging) AS total_chargings, SUM(ingot) as ingots, IFNULL(SUM(dross) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot + fluxing)* 100, 0 ) as persen_loss, IFNULL(SUM(ingot) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot) * 100, 0) as persen_ingots FROM db_lhpmelting where mesin = 'SWIF ASIA' AND YEAR(tanggal) = YEAR(now()) GROUP BY MONTH(tanggal)",
            // "SELECT * FROM db_lhpmelting where mesin = 'STRIKO-1' AND MONTH(tanggal) = MONTH(now()) AND YEAR(tanggal) = YEAR(now())",
            (err, res) => {
                socket.emit("TahunanSWIF ASIA", res);
            }
        );

        //==========[' SELECT DATA bulananSTRIKO-1 ']==========//
        connection.query(
            "SELECT tanggal, SUM(total_charging) AS total_chargings, SUM(ingot) as ingots, IFNULL(SUM(dross) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot + fluxing)* 100, 0 ) as persen_loss, IFNULL(SUM(ingot) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot) * 100, 0) as persen_ingots FROM db_lhpmelting WHERE tanggal BETWEEN DATE_SUB(CURDATE(), INTERVAL 15 DAY) AND CURDATE() AND mesin = 'STRIKO-1' GROUP BY tanggal;",
            // "SELECT * FROM db_lhpmelting where mesin = 'STRIKO-1' AND MONTH(tanggal) = MONTH(now()) AND YEAR(tanggal) = YEAR(now())",
            (err, res) => {
                socket.emit("bulananSTRIKO-1", res);
            }
        );

        //==========[' SELECT DATA bulananSTRIKO-2 ']==========//
        connection.query(
            "SELECT tanggal, SUM(total_charging) AS total_chargings, SUM(ingot) as ingots, IFNULL(SUM(dross) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot + fluxing)* 100, 0 ) as persen_loss, IFNULL(SUM(ingot) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot) * 100, 0) as persen_ingots FROM db_lhpmelting WHERE tanggal BETWEEN DATE_SUB(CURDATE(), INTERVAL 15 DAY) AND CURDATE() AND mesin = 'STRIKO-2' GROUP BY tanggal;",
            // "SELECT * FROM db_lhpmelting where mesin = 'STRIKO-2' AND MONTH(tanggal) = MONTH(now()) AND YEAR(tanggal) = YEAR(now())",

            (err, res) => {
                socket.emit("bulananSTRIKO-2", res);
            }
        );

        //==========[' SELECT DATA bulananSTRIKO-3 ']==========//
        connection.query(
            "SELECT tanggal, SUM(total_charging) AS total_chargings, SUM(ingot) as ingots, IFNULL(SUM(dross) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot + fluxing)* 100, 0 ) as persen_loss, IFNULL(SUM(ingot) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot) * 100, 0) as persen_ingots FROM db_lhpmelting WHERE tanggal BETWEEN DATE_SUB(CURDATE(), INTERVAL 15 DAY) AND CURDATE() AND mesin = 'STRIKO-3' GROUP BY tanggal;",
            // "SELECT * FROM db_lhpmelting where mesin = 'STRIKO-3' AND MONTH(tanggal) = MONTH(now()) AND YEAR(tanggal) = YEAR(now())",
            (err, res) => {
                socket.emit("bulananSTRIKO-3", res);
            }
        );

        //==========[' SELECT DATA bulananSWIF ASIA ']==========//
        connection.query(
            "SELECT tanggal, SUM(total_charging) AS total_chargings, SUM(ingot) as ingots, IFNULL(SUM(dross) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot + fluxing)* 100, 0 ) as persen_loss, IFNULL(SUM(ingot) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot) * 100, 0) as persen_ingots FROM db_lhpmelting WHERE tanggal BETWEEN DATE_SUB(CURDATE(), INTERVAL 15 DAY) AND CURDATE() AND mesin = 'SWIF ASIA' GROUP BY tanggal;",
            // "SELECT * FROM db_lhpmelting where mesin = 'SWIF ASIA' AND MONTH(tanggal) = MONTH(now()) AND YEAR(tanggal) = YEAR(now())",
            (err, res) => {
                socket.emit("bulananSWIF ASIA", res);
            }
        );

        //==========[' SELECT DATA CHART TV SHIPPING ']==========//

        // FOR COUNT
        connection.query(
            "SELECT DATE(updated_at) AS tanggal, COUNT(*) AS jumlah_scan, docking FROM db_scanshipping WHERE docking = 'SHIPPING' AND status = 2 AND DATE(updated_at) = CURDATE() GROUP BY tanggal;",
            (err, res) => {
                socket.emit("CountScanSHIPPING", res);
            }
        );

        connection.query(
            "SELECT DATE(updated_at) AS tanggal, COUNT(*) AS jumlah_scan, docking FROM db_scanshipping WHERE docking = 'FSCM' AND status = 2 AND DATE(updated_at) = CURDATE() GROUP BY tanggal;",
            (err, res) => {
                socket.emit("CountScanFSCM", res);
            }
        );

        connection.query(
            "SELECT DATE(updated_at) AS tanggal, COUNT(*) AS jumlah_scan, docking FROM db_scanshipping WHERE docking = 'DELSI' AND status = 2 AND DATE(updated_at) = CURDATE() GROUP BY tanggal;",
            (err, res) => {
                socket.emit("CountScanDELSI", res);
            }
        );

        connection.query(
            "SELECT DATE(updated_at) AS tanggal, COUNT(*) AS jumlah_scan, docking FROM db_scanshipping WHERE docking = 'NUSAMETAL' AND status = 2 AND DATE(updated_at) = CURDATE() GROUP BY tanggal;",
            (err, res) => {
                socket.emit("CountScanNUSAMETAL", res);
            }
        );

        // FOR CHART
        connection.query(
            'SELECT DATE(updated_at) AS tanggal,  (SELECT COUNT(*) FROM db_scanshipping x WHERE docking="SHIPPING" AND DATE(x.updated_at)=DATE(a.updated_at) AND status = 2 ) AS Shipping,  (SELECT COUNT(*) FROM db_scanshipping x WHERE docking="NUSAMETAL" AND DATE(x.updated_at)=DATE(a.updated_at) AND status = 2) AS NM,  (SELECT COUNT(*) FROM db_scanshipping x WHERE docking="FSCM" AND DATE(x.updated_at)=DATE(a.updated_at) AND  status = 2) AS FSCM,  (SELECT COUNT(*) FROM db_scanshipping x WHERE docking="DELSI" AND DATE(x.updated_at)=DATE(a.updated_at) AND status  = 2) AS Delsi  FROM db_scanshipping a WHERE DATE(updated_at) BETWEEN DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND CURDATE() GROUP BY DATE(updated_at)',
            (err, res) => {
                socket.emit("DataChartSHIPPING", res);
            }
        );


        //==========[' UPDATE AKTUAL PRODUCTION CASTING ']==========//
        // connection.query(
        //     "SELECT * FROM input_kv8000 WHERE area='CA'",
        //     (err, HasilQueryA) => {
        //         //==========[' UPDATE MC-47 ']==========//
        //         //========[' UPDATE COUNTER MC-47 ']==========//
        //         connection.query(
        //             "UPDATE mesin_casting SET total_produksi=" +
        //                 HasilQueryA[0][231] +
        //                 " WHERE mc= 47"
        //         ),
        //             (err, Hasilupdate) => {};

        //         //========[' UPDATE MOLTEN MC-47 ']==========//
        //         connection.query(
        //             "UPDATE mesin_casting SET aktual_molten=" +
        //                 HasilQueryA[0][234] +
        //                 " WHERE mc= 47"
        //         ),
        //             (err, Hasilupdate) => {};

        //         //==========[' UPDATE MC-48 ']==========//
        //         //========[' UPDATE COUNTER MC-48 ']==========//
        //         connection.query(
        //             "UPDATE mesin_casting SET total_produksi=" +
        //                 HasilQueryA[0][236] +
        //                 " WHERE mc= 48"
        //         ),
        //             (err, Hasilupdate) => {};

        //         //========[' UPDATE MOLTEN MC-48 ']==========//
        //         connection.query(
        //             "UPDATE mesin_casting SET aktual_molten=" +
        //                 HasilQueryA[0][239] +
        //                 " WHERE mc= 48"
        //         ),
        //             (err, Hasilupdate) => {};

        //         //==========[' UPDATE MC-51 ']==========//
        //         //========[' UPDATE COUNTER MC-51 ']==========//
        //         connection.query(
        //             "UPDATE mesin_casting SET total_produksi=" +
        //                 HasilQueryA[0][251] +
        //                 " WHERE mc= 51"
        //         ),
        //             (err, Hasilupdate) => {};

        //         //========[' UPDATE MOLTEN MC-51 ']==========//
        //         connection.query(
        //             "UPDATE mesin_casting SET aktual_molten=" +
        //                 HasilQueryA[0][254] +
        //                 " WHERE mc= 51"
        //         ),
        //             (err, Hasilupdate) => {};

        //         //==========[' UPDATE MC-52 ']==========//
        //         //========[' UPDATE COUNTER MC-52 ']==========//
        //         connection.query(
        //             "UPDATE mesin_casting SET total_produksi=" +
        //                 HasilQueryA[0][256] +
        //                 " WHERE mc= 52"
        //         ),
        //             (err, Hasilupdate) => {};

        //         //========[' UPDATE MOLTEN MC-52 ']==========//
        //         connection.query(
        //             "UPDATE mesin_casting SET aktual_molten=" +
        //                 HasilQueryA[0][259] +
        //                 " WHERE mc= 52"
        //         ),
        //             (err, Hasilupdate) => {};

        //         //==========[' UPDATE MC-53 ']==========//
        //         //========[' UPDATE COUNTER MC-53 ']==========//
        //         connection.query(
        //             "UPDATE mesin_casting SET total_produksi=" +
        //                 HasilQueryA[0][261] +
        //                 " WHERE mc= 53"
        //         ),
        //             (err, Hasilupdate) => {};

        //         //========[' UPDATE MOLTEN MC-52 ']==========//
        //         connection.query(
        //             "UPDATE mesin_casting SET aktual_molten=" +
        //                 HasilQueryA[0][264] +
        //                 " WHERE mc= 53"
        //         ),
        //             (err, Hasilupdate) => {};
        //     }
        // );
    }
    AmbilDariDB()
    setInterval(AmbilDariDB, 3000);
});

server.listen(1553, () => {
    console.log("listening on *:1553");
});
tcpServer.listen(1552, () => {
    console.log("listening on *:1552");
});
