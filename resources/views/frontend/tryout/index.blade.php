@extends('frontend.layout')
@section('content')
<div class="pt-4 pb-20 sm:pt-6 sm:pb-6">
    <div class="mx-auto px-4 sm:px-6 md:px-5">
        <div class="bg-white px-5 pt-5 pb-8 rounded-lg">
            @include('frontend.breadcrumb', ['content' => 'Tryout'])
            
            <div>
                <ul role="list" class="mt-3 grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-3">
                    <li class="col-span-1 shadow-sm rounded-lg border border-gray-300 p-3 bg-white">
                        <div class="flex justify-between border-b pb-2 mb-1">

                            <div>
                                <svg 
                                class="w-12 h-12 text-indigo-600" 
                                fill="currentColor" 
                                viewBox="0 0 24 24" 
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 2h12a2 2 0 012 2v16a2 2 0 01-2 2H6a2 2 0 01-2-2V4a2 2 0 012-2zm0 2v16h12V4H6zm2 4h8v2H8V8zm0 4h8v2H8v-2zm0 4h5v2H8v-2z"/>
                                </svg>
                              </div>
                            <div>
                                <p href="#" class="text-gray-800 font-medium mr-1 text-sm sm:text-base">Try Out PPPK UIN Malang</p>
                                <div>
                                    <p class="text-gray-500 text-xs sm:text-sm inline-flex items-center mr-1.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 mr-1">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg> 55 Soal
                                    </p>
                                    <p class="text-gray-500 text-xs sm:text-sm inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 mr-1">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg> 40 Menit
                                    </p>
                                </div>
                            </div>
                            <div>
                                <div class="bg-orange-instive text-xxs sm:text-xs px-2 py-0.5 text-white rounded">77&nbsp;Kuota</div>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="flex items-center justify-between bg-white rounded-r-md">
                                <div class="pr-2 pt-1">
                                    <div>
                                        <p class="text-gray-700 text-xs sm:text-sm font-medium inline-flex items-center">Tanggal Mulai :</p>
                                        <br>
                                        <p class="text-gray-500 text-xs sm:text-sm inline-flex items-center">Senin, 25 Nov 2024 00:01 WIB</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-700 text-xs sm:text-sm font-medium inline-flex items-center">Tanggal Selesai :</p>
                                        <br>
                                        <p class="text-gray-500 text-xs sm:text-sm inline-flex items-center">Senin, 25 Nov 2024 23:59 WIB</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 space-y-2">
                            <!---->
                            <a href="https://ayopppk.com/user/tryout-event/try-out-pppk-uin-malang/ranking" class="bg-blue-100 hover:bg-blue-200 text-blue-instive px-5 py-2 font-medium text-xs sm:text-sm rounded-md inline-flex items-center justify-center w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 sm:h-5 w-4 sm:w-5 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg> Peringkat </a>
                            <!---->
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection