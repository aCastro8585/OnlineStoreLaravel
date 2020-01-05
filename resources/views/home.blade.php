@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3 " >
            <div class="row no-gutters">
                <div class="col-md-4 " style="padding:10px; display: flex;  align-items: center;  justify-content: center">
                <img src="{{ asset('img/laptop.jpg') }}" class="card-img "  alt="laptop">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Acer Aspire 5 Slim Laptop, 15.6" Full HD IPS Display, AMD Ryzen 7 3700U, RX Vega 10 Graphics, 8GB DDR4, 512GB SSD, Backlit Keyboard, Windows 10 Home, A515-43-R6DE </h5>
                    <p class="card-text"> 
                    <ul>
                    <li> Amd Ryzen 7 3700U dual-core processor (Up to 4. 0GHz) | 8GB DDR4 Memory | 512GB PCIe NVMe SSD
                    <li>15. 6" Full HD (1920 x 1080) widescreen LED-backlit IPS display | AMD Radeon RX Vega 10 mobile Graphics
                    <li>1 - USB 3. 1 Gen 1 port, 2 - USB 2. 0 Ports & 1 - HDMI Port with HDCP support
                    <li>802. 11AC Wi-Fi | Backlit keyboard | up to 7. 5 hours Battery Life
                    <li>Windows 10 Home 
                    </ul>
                    </p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
