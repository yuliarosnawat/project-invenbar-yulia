<div class="position-relative">
    <!-- Tombol Previous -->
    <button class="carousel-control-prev position-absolute" type="button" data-bs-target="#dashboardCarousel" data-bs-slide="prev" style="left: -50px; top: 50%; transform: translateY(-50%); width: 40px; height: 40px; background: rgba(0,0,0,0.5); border-radius: 50%;">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>

    <!-- Carousel -->
    <div id="dashboardCarousel" class="carousel slide" data-bs-ride="false">
        <div class="carousel-inner">
            @php
                $kartu = [
                    [
                        'text' => 'TOTAL BARANG',
                        'total' => $jumlahBarang,
                        'route' => 'barang.index',
                        'icon' => 'bi-box-seam',
                        'color' => 'primary',
                    ],
                    [
                        'text' => 'TOTAL KATEGORI',
                        'total' => $jumlahKategori,
                        'route' => 'kategori.index',
                        'icon' => 'bi-tag',
                        'color' => 'secondary',
                    ],
                    [
                        'text' => 'TOTAL LOKASI',
                        'total' => $jumlahLokasi,
                        'route' => 'lokasi.index',
                        'icon' => 'bi-geo-alt',
                        'color' => 'success',
                    ],
                    [
                        'text' => 'TOTAL PEMINJAMAN',
                        'total' => $jumlahPeminjaman,
                        'route' => 'peminjaman.index',
                        'icon' => 'bi-arrow-left-right',
                        'color' => 'warning',
                    ],
                    [
                        'text' => 'TOTAL USER',
                        'total' => $jumlahUser,
                        'route' => 'user.index',
                        'icon' => 'bi-people',
                        'color' => 'danger',
                        'role' => 'admin',
                    ],
                ];

                // Filter kartu berdasarkan role jika perlu
                $kartuFiltered = collect($kartu)->filter(function($item) {
                    if (isset($item['role'])) {
                        return auth()->user()->hasRole($item['role']);
                    }
                    return true;
                })->values();

                // Bagi kartu menjadi grup (4 kartu per slide)
                $kartuPerSlide = 4;
                $kartuGroups = $kartuFiltered->chunk($kartuPerSlide);
            @endphp

            @foreach($kartuGroups as $index => $group)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="row">
                        @foreach($group as $skartu)
                            <x-kartu-total 
                                :text="$skartu['text']" 
                                :route="$skartu['route']" 
                                :total="$skartu['total']" 
                                :icon="$skartu['icon']" 
                                :color="$skartu['color']" 
                            />
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Tombol Next -->
    <button class="carousel-control-next position-absolute" type="button" data-bs-target="#dashboardCarousel" data-bs-slide="next" style="right: -50px; top: 50%; transform: translateY(-50%); width: 40px; height: 40px; background: rgba(0,0,0,0.5); border-radius: 50%;">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>

<style>
    #dashboardScroll::-webkit-scrollbar {
        height: 8px;
    }
    
    #dashboardScroll::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    #dashboardScroll::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }
    
    #dashboardScroll::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>