<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="flex items-center justify-center min-h-screen">
    <div class="container px-4 py-16 md:py-0 md:px-0">
        <div class="w-full max-w-lg p-8 mx-auto bg-white shadow-xl rounded-xl">
            <div class="flex justify-center mb-6">
                <span class="inline-block p-3 bg-gray-100 rounded-full">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 8L16 12M16 12L12 16M16 12H3M3.33782 7C5.06687 4.01099 8.29859 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C8.29859 22 5.06687 19.989 3.33782 17" class="stroke-myBlack" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
            </div>
            <h2 class="mb-2 text-2xl font-semibold tracking-wide text-center">Login Admin</h2>
            <p class="mb-6 text-sm tracking-wide text-center text-gray-500">Silakan masukkan informasi Anda untuk login.</p>

            <?php if (session()->getFlashdata('Register Success')) : ?>
                <div class="flex items-center p-3 mb-4 text-sm text-green-800 border border-green-300 rounded-lg md:p-4 bg-green-50" role="alert">
                    <svg class="flex-shrink-0 inline w-3 h-3 md:w-4 md:h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <div class="text-xs font-medium tracking-wide ms-3 md:text-sm">
                            <?= session()->getFlashdata('Register Success'); ?>
                        </div>
                    </div>
                </div>
            <?php elseif (session()->getFlashdata('error')) : ?>
                <div class="flex items-center p-3 mb-4 text-sm text-red-800 border border-red-300 rounded-lg md:p-4 bg-red-50" role="alert">
                    <svg class="flex-shrink-0 inline w-3 h-3 md:w-4 md:h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <div class="text-xs font-medium tracking-wide ms-3 md:text-sm">
                            <?= session()->getFlashdata('error'); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
            <form class="space-y-5" action="<?= base_url('admin/auth/login'); ?>" method="post">
                <?= csrf_field(); ?>
                <div>
                    <label for="username" class="text-sm font-medium tracking-wide text-myBlack">Username <span class="text-red-500">*</span></label>
                    <input type="text" name="username" id="username" class="<?= (isset($validation['username'])) ? 'input-error' : 'input-admin' ?>" <?= (isset($validation['username'])) ? 'autofocus' : '' ?> value="<?= esc(old('username')) ?>" placeholder="johndoe" />
                    <?php if (isset($validation['username'])) : ?>
                        <div class="input-error-message">
                            <?= $validation['username']; ?>
                        </div>
                    <?php endif ?>
                </div>
                <div>
                    <label for="password" class="text-sm font-medium tracking-wide text-myBlack">Password <span class="text-red-500">*</span></label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="<?= (isset($validation['password'])) ? 'input-error' : 'input-admin' ?>" <?= (isset($validation['password'])) ? 'autofocus' : '' ?> value="<?= esc(old('password')); ?>" />
                    <?php if (isset($validation['password'])) : ?>
                        <div class="input-error-message">
                            <?= $validation['password']; ?>
                        </div>
                    <?php endif ?>
                </div>
                <button type="submit" class="w-full btn-admin">Login sebagai Admin</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>