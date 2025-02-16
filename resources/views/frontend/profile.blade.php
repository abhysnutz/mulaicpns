@extends('frontend.layout')
@section('content')
    <div class="pt-4 pb-20 sm:pt-6 sm:pb-6">
        <div class="mx-auto px-4 sm:px-6 md:px-5">
            <div class="bg-white px-5 pt-5 pb-8 rounded-lg">
                <div>
                    <nav aria-label="Back" class="sm:hidden">
                        <a href="https://ayopppk.com/user/referral" class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="flex-shrink-0 -ml-1 mr-1 h-5 w-5 text-gray-400">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Kembali
                        </a>
                    </nav>
                    <nav aria-label="Breadcrumb" class="hidden sm:flex mb-6">
                        <ol class="flex items-center space-x-4">
                            <li>
                                <div>
                                    <a href="https://ayopppk.com/user" class="text-sm font-medium text-gray-500 hover:text-gray-700">
                                        <svg x-description="Heroicon name: solid/home" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="flex-shrink-0 h-5 w-5">
                                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" ></path>
                                        </svg>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="flex-shrink-0 h-5 w-5 text-gray-400">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <a href="https://ayopppk.com/user/akun" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">
                                        Akun Saya
                                    </a>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="mt-5 md:mt-2 md:flex md:items-center md:justify-between bg-white mb-5">
                    <div class="flex-1 min-w-0">
                        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Akun Saya</h2>
                    </div>
                </div>
                <div>
                    @if (session('status') === 'profile-updated' || session('status') === 'password-updated')
                        <div class="rounded-md bg-green-50 p-4 my-5">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="h-5 w-5 text-green-400">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-bold text-green-800">
                                        Berhasil!
                                    </p>
                                    <p class="text-sm font-medium text-green-800">
                                        @if (session('status') === 'profile-updated')
                                            Informasi akun berhasil disimpan
                                        @elseif(session('status') === 'password-updated')
                                            Password baru berhasil disimpan.
                                        @endif
                                    </p>
                                </div>
                                <div class="ml-auto pl-3">
                                    <div class="-mx-1.5 -my-1.5">
                                        <button class="inline-flex bg-green-50 rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none">
                                            <span class="sr-only">Dismiss</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="h-5 w-5">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($errors->updatePassword->any())
                        <div class="rounded-md bg-red-50 p-4 my-5">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="h-5 w-5 text-red-400">
                                        <path
                                            fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                            clip-rule="evenodd"
                                        ></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-bold text-pink-800">
                                        Terjadi Kesalahan!
                                    </p>
                                    <ul class="text-sm font-medium text-pink-800 list-disc">
                                        @foreach ($errors->updatePassword->get('current_password') as $error) <li class="ml-4"> <a>{{ $error }}</a></li> @endforeach
                                        @foreach ($errors->updatePassword->get('password') as $error) <li class="ml-4"><a>{{ $error }}</a></li> @endforeach
                                        @foreach ($errors->updatePassword->get('password_confirmation') as $error) <li class="ml-4"><a>{{ $error }}</a></li> @endforeach
                                    </ul>
                                </div>
                                <div class="ml-auto pl-3">
                                    <div class="-mx-1.5 -my-1.5">
                                        <button class="inline-flex bg-red-50 rounded-md p-1.5 text-red-500 hover:bg-red-100 focus:outline-none">
                                            <span class="sr-only">Dismiss</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="h-5 w-5">
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"
                                                ></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <div class="xl:grid xl:grid-cols-12 xl:space-y-0 space-y-4 xl:space-x-4">
                        <div class="xl:col-span-3">
                            <aside class="bg-white rounded-md shadow border py-4">
                                <div class="flex-shrink-0 flex border-b border-gary-300 px-4 pb-4">
                                    <div class="flex-shrink-0 w-full group block">
                                        <div class="flex items-center">
                                            <div><img src="https://ui-avatars.com/api/?name=Mohamad Syafri Lamato&amp;background=6366f1&amp;color=fff" alt="" class="h-8 sm:h-10 w-8 sm:w-10 rounded-full" /></div>
                                            <div class="ml-3 truncate">
                                                <p class="text-sm font-medium text-gray-800 truncate">Mohamad Syafri Lamato</p>
                                                <p class="text-xs font-medium text-gray-500 group-hover:text-gray-800 truncate">maps.abhy25@gmail.com</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <nav aria-label="Tabs" class="space-y-1">
                                    <a href="#" class="bg-blue-50 border-blue-700 text-blue-700 hover:bg-blue-50 hover:text-blue-700 group border-l-4 px-3 py-2 flex items-center text-sm font-medium profile-button" data-profile="akun">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="text-blue-700 group-hover:text-blue-700 flex-shrink-0 -ml-1 mr-3 h-5 sm:h-6 w-5 sm:w-6 profile-svg" data-profile="akun">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" ></path>
                                        </svg>
                                        <span class="truncate">Akun</span>
                                    </a>
                                    <a href="#" class="border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-800 group border-l-4 px-3 py-2 flex items-center text-sm font-medium profile-button" data-profile="profil">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true" class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-5 sm:h-6 w-5 sm:w-6 profile-svg" data-profile="profil">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" ></path>
                                        </svg>
                                        <span class="truncate">Profil</span>
                                    </a>
                                    <a href="#" class="border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-800 group border-l-4 px-3 py-2 flex items-center text-sm font-medium profile-button" data-profile="password">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true" class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-5 sm:h-6 w-5 sm:w-6 profile-svg" data-profile="password">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" ></path>
                                        </svg>
                                        <span class="truncate">Ubah Password</span>
                                    </a>
                                </nav>
                            </aside>
                        </div>
                        <div class="xl:col-span-9">
                            <div class="block profile akun">
                                <form method="post" action="{{ route('profile.update') }}">
                                    @csrf
                                    @method('patch')

                                    <div class="grid grid-cols-1 gap-4">
                                        <div>
                                            <label class="text-sm font-medium">Nama:</label>
                                            <input type="text" name="name" placeholder="Nama" required class="shadow-sm mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md py-3" value="{{ $user?->name }}"/>
                                        </div>
                                        <div>
                                            <label class="text-sm font-medium">Email:</label>
                                            <input readonly name="email" type="email" placeholder="Alamat email" class="shadow-sm mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md py-3 bg-gray-200" value="{{ $user?->email }}"/>
                                        </div>
                                    </div>
                                    <button type="submit" class="mt-5 bg-blackinline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-offset-2 focus:ring-indigo-500" >
                                        Simpan Perubahan
                                    </button>
                                </form>
                            </div>
                            <div class="hidden profile profil">
                                <form>
                                    <div class="grid md:grid-cols-1 lg:grid-cols-2 gap-4">
                                        <div class="grid grid-cols-1 gap-4">
                                            <div>
                                                <label class="text-sm font-medium">Telepon:</label>
                                                <input type="text" placeholder="Telepon" class="shadow-sm mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md py-3" />
                                            </div>
                                            <div>
                                                <label class="text-sm font-medium">Tanggal Lahir Anda: -</label>
                                                <input type="date" class="shadow-sm mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md py-3" />
                                            </div>
                                            <div>
                                                <label class="text-sm font-medium">Pendidikan Terakhir:</label>
                                                <select class="shadow-sm mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md py-3">
                                                    <option selected="selected" value="" disabled="disabled">-- Pilih Pendidikan --</option>
                                                    <option value="SD">SD/MI Sederajat</option>
                                                    <option value="SMP">SMP/MTs Sederajat</option>
                                                    <option value="SMA">SMA/SMK/MA Sederajat</option>
                                                    <option value="D1">D1</option>
                                                    <option value="D2">D2</option>
                                                    <option value="D3">D3</option>
                                                    <option value="D4">D4</option>
                                                    <option value="S1">S1</option>
                                                    <option value="S2">S2</option>
                                                    <option value="S3">S3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 gap-4">
                                            <div>
                                                <label class="text-sm font-medium">Jurusan:</label>
                                                <input type="text" placeholder="Jurusan" class="shadow-sm mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md py-3" />
                                            </div>
                                            <div>
                                                <label class="text-sm font-medium">Provinsi:</label>
                                                <select class="shadow-sm mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md py-3">
                                                    <option value="" selected="selected" disabled="disabled">-- Pilih Provinsi --</option>
                                                    <option value="1">Bali</option>
                                                    <option value="2">Bangka Belitung</option>
                                                    <option value="3">Banten</option>
                                                    <option value="4">Bengkulu</option>
                                                    <option value="5">DI Yogyakarta</option>
                                                    <option value="6">DKI Jakarta</option>
                                                    <option value="7">Gorontalo</option>
                                                    <option value="8">Jambi</option>
                                                    <option value="9">Jawa Barat</option>
                                                    <option value="10">Jawa Tengah</option>
                                                    <option value="11">Jawa Timur</option>
                                                    <option value="12">Kalimantan Barat</option>
                                                    <option value="13">Kalimantan Selatan</option>
                                                    <option value="14">Kalimantan Tengah</option>
                                                    <option value="15">Kalimantan Timur</option>
                                                    <option value="16">Kalimantan Utara</option>
                                                    <option value="17">Kepulauan Riau</option>
                                                    <option value="18">Lampung</option>
                                                    <option value="19">Maluku</option>
                                                    <option value="20">Maluku Utara</option>
                                                    <option value="21">Nanggroe Aceh Darussalam (NAD)</option>
                                                    <option value="22">Nusa Tenggara Barat (NTB)</option>
                                                    <option value="23">Nusa Tenggara Timur (NTT)</option>
                                                    <option value="24">Papua</option>
                                                    <option value="25">Papua Barat</option>
                                                    <option value="26">Riau</option>
                                                    <option value="27">Sulawesi Barat</option>
                                                    <option value="28">Sulawesi Selatan</option>
                                                    <option value="29">Sulawesi Tengah</option>
                                                    <option value="30">Sulawesi Tenggara</option>
                                                    <option value="31">Sulawesi Utara</option>
                                                    <option value="32">Sumatera Barat</option>
                                                    <option value="33">Sumatera Selatan</option>
                                                    <option value="34">Sumatera Utara</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="text-sm font-medium">Kota/Kabupaten:</label>
                                                <select class="shadow-sm mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md py-3">
                                                    <option value="" selected="selected" disabled="disabled">-- Pilih Kota/Kabupaten --</option>
                                                    <option value="46">Kabupaten Boalemo</option>
                                                    <option value="47">Kabupaten Bone Bolango</option>
                                                    <option value="48">Kabupaten Gorontalo</option>
                                                    <option value="49">Kota Gorontalo</option>
                                                    <option value="50">Kabupaten Gorontalo Utara</option>
                                                    <option value="51">Kabupaten Pohuwato</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="text-sm font-medium">Alamat:</label>
                                            <textarea cols="30" rows="5" class="shadow-sm mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md py-3"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="mt-5 bg-blackinline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-offset-2 focus:ring-indigo-500" >
                                        Simpan Profil
                                    </button>
                                </form>
                            </div>
                            <div class="hidden profile password">
                                <form method="post" action="{{ route('password.update') }}" data-gtm-form-interact-id="3">
                                    @csrf
                                    @method('put')

                                    <div class="grid grid-cols-1 gap-4">
                                        <div>
                                            <x-input-label for="update_password_current_password" :value="__('Password Sekarang:')" class="text-sm font-medium" />
                                            <x-text-input id="update_password_current_password" name="current_password" type="password" class="shadow-sm mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md py-3" autocomplete="current-password" placeholder="Password Sekarang" data-gtm-form-interact-field-id="3" />
                                        </div>
                                        <div>
                                            <x-input-label for="update_password_password" :value="__('Password Baru:')" class="text-sm font-medium"/>
                                            <x-text-input id="update_password_password" name="password" type="password" class="shadow-sm mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md py-3" autocomplete="new-password" placeholder="Password Baru"/>
                                        </div>
                                        <div>
                                            <x-input-label for="update_password_password_confirmation" :value="__('Ulangi Password Baru:')" class="text-sm font-medium" />
                                            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="shadow-sm mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md py-3" autocomplete="new-password" placeholder="Ulangi Password Baru"/>
                                        </div>
                                    </div>
                                    <button type="submit" class="mt-5 bg-blackinline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-offset-2 focus:ring-indigo-500" >
                                        Simpan Password Baru
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js-bottom')
    <script>
        $(document).ready(function(){
            $(document).on('click', '.profile-button', function(){
                let data = $(this).data('profile');
                
                // left menu
                $('.profile-button').removeClass('bg-blue-50 border-blue-700 text-blue-700 hover:bg-blue-50 hover:text-blue-700').addClass('border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-800')
                $(this).removeClass('border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-800').addClass('bg-blue-50 border-blue-700 text-blue-700 hover:bg-blue-50 hover:text-blue-700')

                $('.profile-svg').removeClass('text-blue-700 group-hover:text-blue-700').addClass('text-gray-400 group-hover:text-gray-500')
                $(`.profile-svg[data-profile="${data}"]`).removeClass('text-gray-400 group-hover:text-gray-500').addClass('text-blue-700 group-hover:text-blue-700')

                $('.profile').removeClass('block').addClass('hidden')
                $(`.profile.${data}`).removeClass('hidden').addClass('block')
            })
        })
    </script>
@endpush