<div class="w-full flex flex-col shadow-umkm-card border border-ijo">
    {{-- Image --}}
    <img class="w-full object-contain aspect-[267/176]" src="{{ App\Models\Umkm::findOrFail($umkm->id)->getPhoto() }}" />

    {{-- Data --}}
    <div class="w-full flex flex-col justify-between h-full items-center py-6 px-8">
        <h1 class="text-ijo text-xl font-bold text-center">{{ $umkm->name }}</h1>
        {{-- <p class="text-center mt-4 text-slate-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis auctor cursus pulvinar. Curabitur ut libero metus.</p> --}}

        <div class="flex flex-col items-center">
            <i class="bi bi-geo-alt-fill text-ijo text-xl mt-4 inline"></i>
            <p class="text-center text-slate-600">{{ $umkm->address }}</p>
        </div>

        <div class="flex flex-col items-center">
            <i class="bi bi-telephone-fill text-ijo text-xl mt-4 inline"></i>
            <p class="text-center text-slate-600">
                <?php
                    if ($umkm->whatsapp) echo(preg_replace('/^62/','0',$umkm->whatsapp));
                    else if ($umkm->phone) echo(preg_replace('/^62/','0',$umkm->phone));
                    else echo("-");
                ?>
            </p>
            @if ($umkm->whatsapp)
                <a type="button" target="_blank" href="https://wa.me/{{ $umkm->whatsapp }}?text=Halo%20kak%2C%20Saya%20ingin%20bertanya%20tentang%20link%20google%20maps%20alamat%20toko%20Bapak%2FIbu%2C%20terimakasih." class="bg-[#25D366] rounded-md flex items-center gap-2 py-3 px-4 text-white font-medium mt-4 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#25D366]">
                    <i class="bi bi-whatsapp"></i>
                    <span class="font-medium roboto">Hubungi via Whatsapp</span>
                </a>
            @else
                <button type="button" disabled class="bg-[#25D366] rounded-md flex items-center gap-2 py-3 px-4 text-white font-medium mt-4 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#25D366] opacity-70">
                    <i class="bi bi-whatsapp"></i>
                    <span class="font-medium roboto">Hubungi via Whatsapp</span>
                </button>
            @endif
        </div>
    </div>
</div>