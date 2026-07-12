<form action="/store" method="POST">
    @if(session('success'))<p style="color:green">{{ session('success') }}</p>@endif
    @csrf
    <input type="text" name="name" placeholder="Nama Kost" required>
    <input type="text" name="address" placeholder="Alamat" required>
    <input type="number" name="harga" placeholder="Harga" required>
    <button type="submit">Simpan Properti</button>
</form>