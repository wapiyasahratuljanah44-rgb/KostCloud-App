<form action="/store" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nama Kost" required>
    <input type="text" name="address" placeholder="Alamat" required>
    <input type="number" name="harga" placeholder="Harga" required>
    <button type="submit">Simpan Properti</button>
</form>