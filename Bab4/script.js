// script.js
var waktuSekarang = new Date();
var jam = waktuSekarang.getHours();

if (jam >= 5 && jam < 12) {
    alert("Selamat Pagi!");
} else if (jam >= 12 && jam < 18) {
    alert("Selamat Siang!");
} else {
    alert("Selamat Malam!");
}