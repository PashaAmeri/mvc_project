<!-- component -->

<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

<main class="profile-page">

    <div class="flex justify-center items-center font-medium py-1 px-2 bg-white text-red-100 bg-red-600 border border-red-800 ">
        <div slot="avatar">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon w-5 h-5 mx-2">
                <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
        </div>
        <div class="text-xl font-normal  max-w-full flex-initial">You need to complete your profile first.</div>
    </div>

    <section class="relative block h-500-px">

        <div class="absolute top-0 w-full h-full bg-center bg-cover" style="background-image: url('https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80');">

            <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>

        </div>

        <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px)">

            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">

                <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>

            </svg>

        </div>

    </section>

    <section class="relative py-16 bg-blueGray-200">

        <div class="container mx-auto px-4">

            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">

                <div class="px-6">

                    <div class="flex flex-wrap justify-around">

                        <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">

                            <div class="relative">

                                <img alt="..." src="https://demos.creative-tim.com/notus-js/assets/img/team-2-800x800.jpg" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">

                            </div>

                        </div>

                        <div class="w-full lg:w-4/12 px-4 lg:order-1">

                            <div class="flex justify-center py-4 lg:pt-4 pt-8">

                                <div class="mr-4 p-3 text-center">

                                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">22</span><span class="text-sm text-blueGray-400">Folowers</span>

                                </div>

                                <div class="mr-4 p-3 text-center">

                                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">10</span><span class="text-sm text-blueGray-400">Posts</span>

                                </div>

                                <div class="lg:mr-4 p-3 text-center">

                                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">89</span><span class="text-sm text-blueGray-400">Comments</span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="text-center mt-12">

                        <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">

                            Jenna Stones
                        </h3>

                        <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">

                            <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>

                            Los Angeles, California
                        </div>

                        <div class="mb-2 text-blueGray-600 mt-10">

                            <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>Solution Manager - Creative Tim Officer
                        </div>

                        <div class="mb-2 text-blueGray-600">

                            <i class="fas fa-university mr-2 text-lg text-blueGray-400"></i>University of Computer Science
                        </div>

                    </div>

                    <div class="mt-10 py-10 border-t border-blueGray-200 text-center">

                        <div class="flex flex-wrap justify-center">

                            <div class="w-full lg:w-9/12 px-4">

                                <p class="mb-4 text-lg leading-relaxed text-blueGray-700">

                                    An artist of considerable range, Jenna the name taken by
                                    Melbourne-raised, Brooklyn-based Nick Murphy writes,
                                    performs and records all of his own music, giving it a
                                    warm, intimate feel with a solid groove structure. An
                                    artist of considerable range.

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <footer class="relative bg-blueGray-200 pt-8 pb-6 mt-8">

            <div class="container mx-auto px-4">

                <div class="flex flex-wrap items-center md:justify-between justify-center">

                    <div class="w-full md:w-6/12 px-4 mx-auto text-center">

                        <div class="text-sm text-blueGray-500 font-semibold py-1">

                            Made with <a href="https://www.creative-tim.com/product/notus-js" class="text-blueGray-500 hover:text-gray-800" target="_blank">Notus JS</a> by <a href="https://www.creative-tim.com" class="text-blueGray-500 hover:text-blueGray-800" target="_blank"> Creative Tim</a>.

                        </div>

                    </div>

                </div>

            </div>

        </footer>

    </section>

</main>