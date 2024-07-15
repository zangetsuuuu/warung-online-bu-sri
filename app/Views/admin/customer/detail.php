<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="min-h-screen">
    <div class="p-4 sm:ml-64">
        <div class="h-full p-4 mt-16 bg-white rounded-lg shadow-sm md:mt-14">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2 md:space-x-3">
                    <svg class="w-5 h-5 md:w-6 md:h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM12 17.75C12.4142 17.75 12.75 17.4142 12.75 17V11C12.75 10.5858 12.4142 10.25 12 10.25C11.5858 10.25 11.25 10.5858 11.25 11V17C11.25 17.4142 11.5858 17.75 12 17.75ZM12 7C12.5523 7 13 7.44772 13 8C13 8.55228 12.5523 9 12 9C11.4477 9 11 8.55228 11 8C11 7.44772 11.4477 7 12 7Z" fill="currentColor" />
                    </svg>
                    <h1 class="text-lg font-semibold tracking-wide md:text-xl">Detail Pelanggan</h1>
                </div>
                <a href="<?= base_url('admin/customers'); ?>" class="flex items-center space-x-2 text-xs tracking-wide text-gray-500 md:text-sm hover:underline">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <div>Kembali</div>
                </a>
            </div>
        </div>

        <div class="h-full p-4 mt-3 bg-white rounded-lg shadow-sm md:mt-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-y-8 md:gap-5">
                <div class="relative w-56 h-56 mx-auto overflow-hidden border rounded-full">
                    <img src="<?= base_url('img/avatars/customer/' . esc($customer['avatar'])); ?>" class="object-cover w-full h-full" alt="<?= esc($customer['fullname']); ?>">
                    <div class="absolute inset-0 flex items-center justify-center duration-300 ease-in-out opacity-0 cursor-pointer hover:opacity-100 bg-myBlack/50">
                        <button type="button" data-modal-target="profile-image-modal#<?= esc($customer['id']) ?>" data-modal-toggle="profile-image-modal#<?= esc($customer['id']) ?>" data-tooltip-target="profile-image-tooltip#<?= esc($customer['id']) ?>" class="p-3 text-white duration-300 ease-in-out rounded-full hover:text-gray-300">
                            <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 9V5.6C4 5.03995 4 4.75992 4.10899 4.54601C4.20487 4.35785 4.35785 4.20487 4.54601 4.109C4.75992 4 5.03995 4 5.6 4L9 4M4 15V18.4C4 18.9601 4 19.2401 4.10899 19.454C4.20487 19.6422 4.35785 19.7951 4.54601 19.891C4.75992 20 5.03995 20 5.6 20L9 20M15 4H18.4C18.9601 4 19.2401 4 19.454 4.10899C19.6422 4.20487 19.7951 4.35785 19.891 4.54601C20 4.75992 20 5.03995 20 5.6V9M20 15V18.4C20 18.9601 20 19.2401 19.891 19.454C19.7951 19.6422 19.6422 19.7951 19.454 19.891C19.2401 20 18.9601 20 18.4 20H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                        <div id="profile-image-tooltip#<?= esc($customer['id']) ?>" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-xs font-medium tracking-wide text-white transition-opacity duration-300 rounded-lg shadow-sm opacity-0 bg-myBlack tooltip group">
                            Lihat Foto
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 space-y-6">
                    <div class="space-y-2">
                        <p class="text-xs font-semibold tracking-wide text-gray-400 uppercase">Nama Lengkap</p>
                        <h1 class="text-lg font-semibold tracking-wide"><?= esc($customer['fullname']); ?></h1>
                    </div>
                    <div class="space-y-2">
                        <p class="text-xs font-semibold tracking-wide text-gray-400 uppercase">Username</p>
                        <h1 class="text-lg font-semibold tracking-wide">@<?= esc($customer['username']); ?></h1>
                    </div>
                    <div class="space-y-2">
                        <p class="text-xs font-semibold tracking-wide text-gray-400 uppercase">Email</p>
                        <h1 class="text-lg font-semibold tracking-wide"><?= esc($customer['email']); ?></h1>
                    </div>
                    <div class="space-y-2">
                        <p class="text-xs font-semibold tracking-wide text-gray-400 uppercase">Jenis Kelamin</p>
                        <h1 class="text-lg font-semibold tracking-wide"><?= esc($customer['gender']); ?></h1>
                    </div>
                    <div class="space-y-2">
                        <p class="text-xs font-semibold tracking-wide text-gray-400 uppercase">No. HP</p>
                        <a href="https://wa.me/62<?= substr(esc($customer['phone_number']), 1); ?>" class="text-lg font-semibold tracking-wide duration-200 ease-in-out hover:text-emerald-500"><?= esc($customer['phone_number']); ?></a>
                    </div>
                    <div class="space-y-2">
                        <p class="text-xs font-semibold tracking-wide text-gray-400 uppercase">Alamat</p>
                        <h1 class="text-lg font-semibold tracking-wide"><?= esc($customer['address']); ?></h1>
                    </div>
                    <div class="space-y-2">
                        <p class="text-xs font-semibold tracking-wide text-gray-400 uppercase">Tanggal Terdaftar</p>
                        <h1 class="text-lg font-semibold tracking-wide"><?= date('d F Y', strtotime(esc($customer['created_at']))); ?></h1>
                    </div>
                    <hr class="my-4">
                    <div class="space-y-2">
                        <p class="text-xs font-semibold tracking-wide text-gray-400 uppercase">Total Pesanan</p>
                        <h1 class="text-lg font-semibold tracking-wide"><?= esc($customer['total_order']); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('layout/admin/customer/avatar'); ?>

<?= $this->endSection(); ?>