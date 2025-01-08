<div class="container text-center my-5">
    <div id="dayname" class="dayname"></div>
    <div id="date" class="date"></div>
    <div id="clock" class="clock text-primary"></div>
</div>

<script>
    // Fungsi untuk menampilkan nama hari dan tanggal dalam bahasa Indonesia
    function getDayName() {
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const today = new Date();
        const formattedDate = today.toLocaleDateString('id-ID', options); // Format lengkap dengan hari, bulan, tahun
        document.getElementById('dayname').textContent = `${formattedDate}`;
    }

    // Fungsi untuk memperbarui waktu jam sekarang
    function updateClock() {
        const now = new Date(); // Mendapatkan waktu sekarang
        const hours = String(now.getHours()).padStart(2, '0'); // Menampilkan jam dengan 2 digit
        const minutes = String(now.getMinutes()).padStart(2, '0'); // Menampilkan menit dengan 2 digit
        const seconds = String(now.getSeconds()).padStart(2, '0'); // Menampilkan detik dengan 2 digit
        const timeString = `${hours}:${minutes}:${seconds}`; // Format waktu
        document.getElementById('clock').textContent = `${timeString}`; // Menampilkan waktu ke elemen dengan ID 'clock'
    }

    // Panggil fungsi getDayName dan updateClock ketika halaman dimuat
    getDayName();
    setInterval(updateClock, 1000); // Panggil updateClock setiap 1000ms (1 detik) untuk memperbarui jam
    updateClock(); // Panggil fungsi sekali untuk menampilkan waktu saat pertama kali dimuat
</script>

<style>
    .clock {
        font-size: 1.5rem;
        font-weight: bold;
    }
    .dayname, .date {
        font-size: 1.2rem;
        font-weight: bold;
    }
</style>
