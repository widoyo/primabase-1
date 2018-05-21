# primabase
# Fungsi
* Manajemen pos
* Lihat daftar pos
* Kesehatan pos
* Alert
# Data
* Pos {nama, lonlat, desa, kec, kab, pengamat}
* Logger {sn}
* SettingLogger{loggerid, tinggisonar, tippingfactor, wlpressureoffset, wlpressurefactor, battcorrection}
* User {username, password, fullname}
* Tenant {name, addr}
* Anomali {sampling, posid, loggerid, }
* Periodic {posid, loggerid, sampling, wlevel, rain, temperature, humidity, altitude, battery, signalquality}
* Pengamat {nama, alamat, desa, kec, kab, noktp}
* Foto {objtype, objid, taken, keterangan}
# Use Case
* Login/logout, menu berbeda user group Tenant dan admin
* CRUD Tenant
* CRUD Logger
* CRUD Pos
* View Periodic
