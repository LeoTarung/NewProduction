const express = require("express");
const app = express();
const http = require("http");
const server = require("http").createServer(app);
const io = require("socket.io")(server, {
    cors: { origin: "*" },
});

// LIB FOR MYSQL
const mysql = require("mysql2");
const connection = mysql.createConnection({
    host: "localhost",
    user: "root",
    database: "production-app",
});

io.on("connection", (socket) => {
    console.log("Connection Berhasil");

    socket.on("disconnect", (socket) => {
        console.log("Koneksi Terputus");
    });

    var mesin1;
    var shift1;
    var date1;
    var forklift1;
    var material1;
    var mc1;

    // socket.on("Hello", (mesin, shift, date) => {
    //     // console.log("ini adalah shift" + shift); // world
    //     // console.log("ini adalah tanggal" + date); // world
    //     mesin1 = mesin;
    //     shift1 = shift;
    //     date1 = date;
    // });

    // socket.on("levelMolten", (forklift, material) => {
    //     // console.log(forklift, material);
    //     forklift1 = forklift;
    //     material1 = material;
    // });

    // socket.on("ForSettingslevelMolten", (settingsmc) => {
    //     settingsmc = mc;
    // });

    // setInterval(function () {
    //     //==========[' SELECT ALL FROM LHP MELTING ']==========//
    //     if (mesin1 != null && shift1 != null && date1 != null) {
    //         connection.query(
    //             "SELECT * FROM lhp_melting WHERE mesin='" +
    //                 mesin1 +
    //                 "' AND shift='" +
    //                 shift1 +
    //                 "' AND tanggal='" +
    //                 date1 +
    //                 "' ORDER BY id DESC",
    //             (err, res) => {
    //                 socket.emit("tv_melting_kiri", res, mesin1);
    //             }
    //         );
    //     } else {
    //         console.log("Update Untuk LHP Gagal");
    //     }

    //     //==========[' SELECT ALL FROM MESIN CASTING ']==========//
    //     connection.query(
    //         "SELECT * FROM mesin_casting WHERE material='" + material1 + "'",
    //         (err, res) => {
    //             socket.emit("levelMolten_client", res, material1);
    //         }
    //     );

    //     //==========[' SELECT ALL  FROM MESIN CASTING ']==========//
    //     connection.query("SELECT * FROM mesin_casting", (err, res) => {
    //         socket.emit("levelMolten_settings", res);
    //     });

    //     //==========[' SELECT DATA TahunanStriko-1 ']==========//
    //     connection.query(
    //         "SELECT tanggal, SUM(total_charging) AS total_chargings, SUM(ingot) as ingots, IFNULL(SUM(dross) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot + fluxing)* 100, 0 ) as persen_loss, IFNULL(SUM(ingot) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot) * 100, 0) as persen_ingots FROM lhp_melting where mesin = 'Striko-1' AND YEAR(tanggal) = YEAR(now()) GROUP BY MONTH(tanggal)",
    //         // "SELECT * FROM lhp_melting where mesin = 'Striko-1' AND MONTH(tanggal) = MONTH(now()) AND YEAR(tanggal) = YEAR(now())",
    //         (err, res) => {
    //             socket.emit("TahunanStriko-1", res);
    //         }
    //     );

    //     //==========[' SELECT DATA TahunanStriko-2 ']==========//
    //     connection.query(
    //         "SELECT tanggal, SUM(total_charging) AS total_chargings, SUM(ingot) as ingots, IFNULL(SUM(dross) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot + fluxing)* 100, 0 ) as persen_loss, IFNULL(SUM(ingot) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot) * 100, 0) as persen_ingots FROM lhp_melting where mesin = 'Striko-2' AND YEAR(tanggal) = YEAR(now()) GROUP BY MONTH(tanggal)",
    //         // "SELECT * FROM lhp_melting where mesin = 'Striko-1' AND MONTH(tanggal) = MONTH(now()) AND YEAR(tanggal) = YEAR(now())",
    //         (err, res) => {
    //             socket.emit("TahunanStriko-2", res);
    //         }
    //     );

    //     //==========[' SELECT DATA TahunanStriko-3 ']==========//
    //     connection.query(
    //         "SELECT tanggal, SUM(total_charging) AS total_chargings, SUM(ingot) as ingots, IFNULL(SUM(dross) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot + fluxing)* 100, 0 ) as persen_loss, IFNULL(SUM(ingot) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot) * 100, 0) as persen_ingots FROM lhp_melting where mesin = 'Striko-3' AND YEAR(tanggal) = YEAR(now()) GROUP BY MONTH(tanggal)",
    //         // "SELECT * FROM lhp_melting where mesin = 'Striko-1' AND MONTH(tanggal) = MONTH(now()) AND YEAR(tanggal) = YEAR(now())",
    //         (err, res) => {
    //             socket.emit("TahunanStriko-3", res);
    //         }
    //     );

    //     //==========[' SELECT DATA TahunanSwift_Asia ']==========//
    //     connection.query(
    //         "SELECT tanggal, SUM(total_charging) AS total_chargings, SUM(ingot) as ingots, IFNULL(SUM(dross) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot + fluxing)* 100, 0 ) as persen_loss, IFNULL(SUM(ingot) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot) * 100, 0) as persen_ingots FROM lhp_melting where mesin = 'Swift_Asia' AND YEAR(tanggal) = YEAR(now()) GROUP BY MONTH(tanggal)",
    //         // "SELECT * FROM lhp_melting where mesin = 'Striko-1' AND MONTH(tanggal) = MONTH(now()) AND YEAR(tanggal) = YEAR(now())",
    //         (err, res) => {
    //             socket.emit("TahunanSwift_Asia", res);
    //         }
    //     );

    //     //==========[' SELECT DATA bulananStriko-1 ']==========//
    //     connection.query(
    //         "SELECT tanggal, SUM(total_charging) AS total_chargings, SUM(ingot) as ingots, IFNULL(SUM(dross) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot + fluxing)* 100, 0 ) as persen_loss, IFNULL(SUM(ingot) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot) * 100, 0) as persen_ingots FROM lhp_melting WHERE tanggal BETWEEN DATE_SUB(CURDATE(), INTERVAL 15 DAY) AND CURDATE() AND mesin = 'Striko-1' GROUP BY tanggal;",
    //         // "SELECT * FROM lhp_melting where mesin = 'Striko-1' AND MONTH(tanggal) = MONTH(now()) AND YEAR(tanggal) = YEAR(now())",
    //         (err, res) => {
    //             socket.emit("bulananStriko-1", res);
    //         }
    //     );

    //     //==========[' SELECT DATA bulananStriko-2 ']==========//
    //     connection.query(
    //         "SELECT tanggal, SUM(total_charging) AS total_chargings, SUM(ingot) as ingots, IFNULL(SUM(dross) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot + fluxing)* 100, 0 ) as persen_loss, IFNULL(SUM(ingot) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot) * 100, 0) as persen_ingots FROM lhp_melting WHERE tanggal BETWEEN DATE_SUB(CURDATE(), INTERVAL 15 DAY) AND CURDATE() AND mesin = 'Striko-2' GROUP BY tanggal;",
    //         // "SELECT * FROM lhp_melting where mesin = 'Striko-2' AND MONTH(tanggal) = MONTH(now()) AND YEAR(tanggal) = YEAR(now())",

    //         (err, res) => {
    //             socket.emit("bulananStriko-2", res);
    //         }
    //     );

    //     //==========[' SELECT DATA bulananStriko-3 ']==========//
    //     connection.query(
    //         "SELECT tanggal, SUM(total_charging) AS total_chargings, SUM(ingot) as ingots, IFNULL(SUM(dross) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot + fluxing)* 100, 0 ) as persen_loss, IFNULL(SUM(ingot) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot) * 100, 0) as persen_ingots FROM lhp_melting WHERE tanggal BETWEEN DATE_SUB(CURDATE(), INTERVAL 15 DAY) AND CURDATE() AND mesin = 'Striko-3' GROUP BY tanggal;",
    //         // "SELECT * FROM lhp_melting where mesin = 'Striko-3' AND MONTH(tanggal) = MONTH(now()) AND YEAR(tanggal) = YEAR(now())",
    //         (err, res) => {
    //             socket.emit("bulananStriko-3", res);
    //         }
    //     );

    //     //==========[' SELECT DATA bulananSwift_Asia ']==========//
    //     connection.query(
    //         "SELECT tanggal, SUM(total_charging) AS total_chargings, SUM(ingot) as ingots, IFNULL(SUM(dross) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot + fluxing)* 100, 0 ) as persen_loss, IFNULL(SUM(ingot) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot) * 100, 0) as persen_ingots FROM lhp_melting WHERE tanggal BETWEEN DATE_SUB(CURDATE(), INTERVAL 15 DAY) AND CURDATE() AND mesin = 'Swift_Asia' GROUP BY tanggal;",
    //         // "SELECT * FROM lhp_melting where mesin = 'Swift_Asia' AND MONTH(tanggal) = MONTH(now()) AND YEAR(tanggal) = YEAR(now())",
    //         (err, res) => {
    //             socket.emit("bulananSwift_Asia", res);
    //         }
    //     );

    //     //==========[' UPDATE AKTUAL PRODUCTION CASTING ']==========//
    //     connection.query(
    //         "SELECT * FROM input_kv8000 WHERE area='CA'",
    //         (err, HasilQueryA) => {
    //             //==========[' UPDATE MC-47 ']==========//
    //             //========[' UPDATE COUNTER MC-47 ']==========//
    //             connection.query(
    //                 "UPDATE mesin_casting SET total_produksi=" +
    //                     HasilQueryA[0][231] +
    //                     " WHERE mc= 47"
    //             ),
    //                 (err, Hasilupdate) => {};

    //             //========[' UPDATE MOLTEN MC-47 ']==========//
    //             connection.query(
    //                 "UPDATE mesin_casting SET aktual_molten=" +
    //                     HasilQueryA[0][234] +
    //                     " WHERE mc= 47"
    //             ),
    //                 (err, Hasilupdate) => {};

    //             //==========[' UPDATE MC-48 ']==========//
    //             //========[' UPDATE COUNTER MC-48 ']==========//
    //             connection.query(
    //                 "UPDATE mesin_casting SET total_produksi=" +
    //                     HasilQueryA[0][236] +
    //                     " WHERE mc= 48"
    //             ),
    //                 (err, Hasilupdate) => {};

    //             //========[' UPDATE MOLTEN MC-48 ']==========//
    //             connection.query(
    //                 "UPDATE mesin_casting SET aktual_molten=" +
    //                     HasilQueryA[0][239] +
    //                     " WHERE mc= 48"
    //             ),
    //                 (err, Hasilupdate) => {};

    //             //==========[' UPDATE MC-51 ']==========//
    //             //========[' UPDATE COUNTER MC-51 ']==========//
    //             connection.query(
    //                 "UPDATE mesin_casting SET total_produksi=" +
    //                     HasilQueryA[0][251] +
    //                     " WHERE mc= 51"
    //             ),
    //                 (err, Hasilupdate) => {};

    //             //========[' UPDATE MOLTEN MC-51 ']==========//
    //             connection.query(
    //                 "UPDATE mesin_casting SET aktual_molten=" +
    //                     HasilQueryA[0][254] +
    //                     " WHERE mc= 51"
    //             ),
    //                 (err, Hasilupdate) => {};

    //             //==========[' UPDATE MC-52 ']==========//
    //             //========[' UPDATE COUNTER MC-52 ']==========//
    //             connection.query(
    //                 "UPDATE mesin_casting SET total_produksi=" +
    //                     HasilQueryA[0][256] +
    //                     " WHERE mc= 52"
    //             ),
    //                 (err, Hasilupdate) => {};

    //             //========[' UPDATE MOLTEN MC-52 ']==========//
    //             connection.query(
    //                 "UPDATE mesin_casting SET aktual_molten=" +
    //                     HasilQueryA[0][259] +
    //                     " WHERE mc= 52"
    //             ),
    //                 (err, Hasilupdate) => {};

    //             //==========[' UPDATE MC-53 ']==========//
    //             //========[' UPDATE COUNTER MC-53 ']==========//
    //             connection.query(
    //                 "UPDATE mesin_casting SET total_produksi=" +
    //                     HasilQueryA[0][261] +
    //                     " WHERE mc= 53"
    //             ),
    //                 (err, Hasilupdate) => {};

    //             //========[' UPDATE MOLTEN MC-52 ']==========//
    //             connection.query(
    //                 "UPDATE mesin_casting SET aktual_molten=" +
    //                     HasilQueryA[0][264] +
    //                     " WHERE mc= 53"
    //             ),
    //                 (err, Hasilupdate) => {};
    //         }
    //     );
    // }, 3000);
});

server.listen(1553, () => {
    console.log("listening on *:1553");
});
