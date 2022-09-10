<p> Rp. {{number_format($produk->harga)}} |
    Stok : {{$produk->stok}} |
    Berat : {{$produk->berat}} kg |

    Tanggal Ditambahkan : {{$produk->created_at->diffForHumans()}}
</p>