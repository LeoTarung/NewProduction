const express = require("express");
const app = express();
const http = require("http");
const server = require("http").createServer(app);
const io = require("socket.io")(server, {
    cors: { origin: "*" },
});

//==========[' LIB FOR MYSQL ']==========//
const mysql = require("mysql2");
const connection = mysql.createConnection({
    host: "localhost",
    user: "root",
    database: "production_nusametal",
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

    setInterval(function () {
        //==========[' SELECT ALL FROM MESIN CASTING ']==========//
        // connection.query(
        //     "SELECT * FROM mesin_casting WHERE material='" + material1 + "'",
        //     (err, res) => {
        //         socket.emit("levelMolten_client", res, material1);
        //     }
        // );

        // connection.query(
        //     "SELECT * FROM mesin_casting WHERE mc='" + mc1 + "'",
        //     (err, res) => {
        //         socket.emit("levelMolten_settings", res);
        //     }
        // );

        //==========[' SELECT ALL  FROM MESIN CASTING ']==========//
        // connection.query("SELECT * FROM mesin_casting", (err, res) => {
        //     socket.emit("levelMolten_settings", res);
        // });

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
    }, 3000);
});

server.listen(1553, () => {
    console.log("listening on *:1553");
});
