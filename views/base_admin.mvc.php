<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'
          integrity='sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=='
          crossorigin='anonymous' referrerpolicy='no-referrer'/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css'/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"
            integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/gh/jonsuh/hamburgers/dist/hamburgers.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinycolor/1.6.0/tinycolor.min.js"
            integrity="sha512-AvCfbOQzCVi2ctVWF4m89jLwTn/zVPJuS7rhiKyY3zqyCdbPqtvNa0I628GJqPytbowfFjkAGOpq85E5kQc40Q=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/gh/jonsuh/hamburgers/dist/hamburgers.min.css" rel="stylesheet">
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
    <title>Admin</title>
</head>
<body>

<div class="min-h-screen bg-gray-50/50">
<aside class="bg-gradient-to-br from-gray-800 to-gray-900 -translate-x-80 fixed inset-0 z-50 my-4 ml-4 h-[calc(100vh-32px)] w-72 rounded-xl transition-transform duration-300 xl:translate-x-0">
    <div class="relative border-b border-white/20">
        <a class="flex items-center gap-4 py-6 px-8" href="#/">
            <h6 class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-white">
                Material Tailwind Dashboard</h6>
        </a>
        <button class="middle none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-8 max-w-[32px] h-8 max-h-[32px] rounded-lg text-xs text-white hover:bg-white/10 active:bg-white/30 absolute right-0 top-0 grid rounded-br-none rounded-tl-none xl:hidden"
                type="button">
        <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
               stroke="currentColor" aria-hidden="true" class="h-5 w-5 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </span>
        </button>
    </div>
    <div class="m-4">
        <ul class="mb-4 flex flex-col gap-1">
            <li>
                <a aria-current="page" class="active" href="#">
                    <button class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-md shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] w-full flex items-center gap-4 px-4 capitalize"
                            type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             aria-hidden="true" class="w-5 h-5 text-inherit">
                            <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z"></path>
                            <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z"></path>
                        </svg>
                        <a class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize" href="/admin">
                            dashboard</a>
                    </button>
                </a>
            </li>
            <li>
                <a class="" href="/admin/mails">
                    <button class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize"
                            type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             aria-hidden="true" class="w-5 h-5 text-inherit">
                            <path fill-rule="evenodd"
                                  d="M21 8L17.4392 9.97822C15.454 11.0811 14.4614 11.6326 13.4102 11.8488C12.4798 12.0401 11.5202 12.0401 10.5898 11.8488C9.53864 11.6326 8.54603 11.0811 6.5608 9.97822L3 8M6.2 19H17.8C18.9201 19 19.4802 19 19.908 18.782C20.2843 18.5903 20.5903 18.2843 20.782 17.908C21 17.4802 21 16.9201 21 15.8V8.2C21 7.0799 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V15.8C3 16.9201 3 17.4802 3.21799 17.908C3.40973 18.2843 3.71569 18.5903 4.09202 18.782C4.51984 19 5.07989 19 6.2 19Z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">
                            Mails reçus</p>
                    </button>
                </a>
            </li>
            <li>
                <a class="" href="/admin/reservations">
                    <button class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize"
                            type="button">
                        <svg class="w-5 h-5 text-inherit" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg" transform="matrix(1, 0, 0, 1, 0, 0)">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M20 10V7C20 5.89543 19.1046 5 18 5H6C4.89543 5 4 5.89543 4 7V10M20 10V19C20 20.1046 19.1046 21 18 21H6C4.89543 21 4 20.1046 4 19V10M20 10H4M8 3V7M16 3V7"
                                      stroke="#ffffff" stroke-width="2" stroke-linecap="round"></path>
                                <rect x="6" y="12" width="3" height="3" rx="0.5" fill="#ffffff"></rect>
                                <rect x="10.5" y="12" width="3" height="3" rx="0.5" fill="#ffffff"></rect>
                                <rect x="15" y="12" width="3" height="3" rx="0.5" fill="#ffffff"></rect>
                            </g>
                        </svg>
                        <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">
                            Reservations</p>
                    </button>

                </a>
            </li>
            <li>
                <a class="" href="#">
                    <button class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize"
                            type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             aria-hidden="true" class="w-5 h-5 text-inherit">
                            <path fill-rule="evenodd"
                                  d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">
                            notifactions</p>
                    </button>
                </a>
            </li>
        </ul>
        <ul class="mb-4 flex flex-col gap-1">
            <li class="mx-3.5 mt-4 mb-2">
                <p class="block antialiased font-sans text-sm leading-normal text-white font-black uppercase opacity-75">
                    auth pages</p>
            </li>
            <li>
                <a class="" href="/logout">
                    <button class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize"
                            type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             aria-hidden="true" class="w-5 h-5 text-inherit">
                            <path fill-rule="evenodd"
                                  d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm10.72 4.72a.75.75 0 011.06 0l3 3a.75.75 0 010 1.06l-3 3a.75.75 0 11-1.06-1.06l1.72-1.72H9a.75.75 0 010-1.5h10.94l-1.72-1.72a.75.75 0 010-1.06z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">
                            Se déconnecter</p>
                    </button>
                </a>
            </li>
            <li>
            </li>
        </ul>
    </div>
</aside>

<main>
    {% yield body %}
</main>

<div class="text-blue-gray-600">
    <footer class="py-2">
        <div class="flex w-full flex-wrap items-center justify-center gap-6 px-2 md:justify-between">
            <ul class="flex items-center gap-4">
                <li>
                    <a href="https://www.creative-tim.com" target="_blank"
                       class="block antialiased font-sans text-sm leading-normal py-0.5 px-1 font-normal text-inherit transition-colors hover:text-blue-500">Creative
                        Tim</a>
                </li>
                <li>
                    <a href="https://www.creative-tim.com/presentation" target="_blank"
                       class="block antialiased font-sans text-sm leading-normal py-0.5 px-1 font-normal text-inherit transition-colors hover:text-blue-500">About
                        Us</a>
                </li>
                <li>
                    <a href="https://www.creative-tim.com/blog" target="_blank"
                       class="block antialiased font-sans text-sm leading-normal py-0.5 px-1 font-normal text-inherit transition-colors hover:text-blue-500">Blog</a>
                </li>
                <li>
                    <a href="https://www.creative-tim.com/license" target="_blank"
                       class="block antialiased font-sans text-sm leading-normal py-0.5 px-1 font-normal text-inherit transition-colors hover:text-blue-500">License</a>
                </li>
            </ul>
        </div>
    </footer>
</div>
</div>
</body>
</html>

