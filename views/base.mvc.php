<!-- myapp/templates/base.html -->
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css' integrity='sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==' crossorigin='anonymous' referrerpolicy='no-referrer' />
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css'/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link href="https://cdn.jsdelivr.net/gh/jonsuh/hamburgers/dist/hamburgers.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinycolor/1.6.0/tinycolor.min.js" integrity="sha512-AvCfbOQzCVi2ctVWF4m89jLwTn/zVPJuS7rhiKyY3zqyCdbPqtvNa0I628GJqPytbowfFjkAGOpq85E5kQc40Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link href="https://cdn.jsdelivr.net/gh/jonsuh/hamburgers/dist/hamburgers.min.css" rel="stylesheet">
    <style>
    body {
        overflow-x: hidden;
    }
</style>
</head>
<body>
    <style>
  .header-links li span {
    position: relative;
    z-index: 0;
  }

  .header-links li span::before {
    content: '';
    position: absolute;
    z-index: -1;
    bottom: 2px;
    left: -4px;
    right: -4px;
    display: block;
    height: 6px;
  }

  .header-links li.active span::before {
    background-color: #fcae04;
  }

  .header-links li:not(.active):hover span::before {
    background-color: #ccc;
  }
</style>

<!-- header -->

<header id="mainHeader"
        class="bg-white p-4 w-full z-10 top-0 shadow-lg transition-transform duration-300 ease-in-out">

    <div class="container mx-auto flex justify-between items-center header">
        <a href="/" id="brandName"
           class="z-50 text-4xl sm:text-3xl font-semibold text-emerald-400 hover:underline transition-colors duration-300">Céline Allainmat</a>

        <div class="relative lg:hidden block z-40">
            <div id="menuToggle" class="hamburger hamburger--squeeze" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>
        <nav class="hidden lg:flex space-x-6" id="always-displayed-header">
            <a class="text-gray-800 hover:text-gray-900 hover:underline py-2 px-4 js-smooth-scroll"
                   data-duration="300" href="/#about">Mon Parcours</a>
                <a class="text-gray-800 hover:text-gray-900 hover:underline py-2 px-4 js-smooth-scroll"
                   data-duration="300" href="/#contact">Me Contacter</a>
                <a class="font-semibold text-emerald-400 hover:underline py-2 px-4 border border-emerald-400 rounded-full js-smooth-scroll"
                   data-duration="300" href="/reservation">Prendre RDV</a>
        </nav>

        <nav id="burger-menu-header"
             class="fixed top-0 left-0 w-full h-full bg-gray-800 text-white flex flex-col justify-center items-center space-y-6 hidden z-30 shadow-lg">
            <a href="/"
               class="block text-left text-3xl font-medium px-8 py-3 hover:bg-opacity-10 hover:bg-gray-700 transform transition-transform duration-200 hover:scale-105 full-width-hover-menu">
                <i class="fas fa-home"></i> Home
            </a>
            <a href="/blog"
               class="block text-left text-3xl font-medium px-8 py-3 hover:bg-opacity-10 hover:bg-gray-700 transform transition-transform duration-200 hover:scale-105 full-width-hover-menu">
                <i class="fas fa-book"></i> Blog
            </a>
            <a href="/#contact"
               class="block text-left text-3xl font-medium px-8 py-3 hover:bg-opacity-10 hover:bg-gray-700 transform transition-transform duration-200 hover:scale-105 full-width-hover-menu">
                <i class="fas fa-envelope"></i> Contact
            </a>
        </nav>
    </div>
</header>
<style>

.full-width-hover-menu {
    width: 100vw;
    text-align: center;
}

.header{
    width: 80%;
    margin: 0 auto;
}

.hamburger.is-active .hamburger-inner,
.hamburger.is-active .hamburger-inner::before,
.hamburger.is-active .hamburger-inner::after {
}

    html {
            scroll-behavior: smooth;
        }

</style>
<script>
    const menuToggle = document.getElementById('menuToggle');
    const menu = document.getElementById('burger-menu-header');
    const menuLinks = menu.querySelectorAll('a');
    const brandName = document.getElementById('brandName');

    menuToggle.addEventListener('click', toggleMenu);

    menuLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (!menu.classList.contains('hidden')) {
                toggleMenu();
            }
        });
    });

    function toggleMenu() {

        menuToggle.classList.toggle('is-active');

        if (menu.classList.contains('hidden')) {
            gsap.fromTo(menu, {opacity: 0, y: "100%"}, {
                duration: 0.3,
                opacity: 1,
                y: "0%",
                onStart: () => menu.classList.remove('hidden')
            });
        } else {
            gsap.to(menu, {duration: 0.3, opacity: 0, y: "100%", onComplete: () => menu.classList.add('hidden')});
        }
    }
</script>


<script>
// Burger menus
document.addEventListener('DOMContentLoaded', function() {
    // open
    const burger = document.querySelectorAll('.navbar-burger');
    const menu = document.querySelectorAll('.navbar-menu');

    if (burger.length && menu.length) {
        for (var i = 0; i < burger.length; i++) {
            burger[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    // close
    const close = document.querySelectorAll('.navbar-close');
    const backdrop = document.querySelectorAll('.navbar-backdrop');

    if (close.length) {
        for (var i = 0; i < close.length; i++) {
            close[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    if (backdrop.length) {
        for (var i = 0; i < backdrop.length; i++) {
            backdrop[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }
});
</script>

    <main>
        {% yield body %}
    </main>

    <!-- Foooter -->
<footer class="bg-white">
    <div class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
        <nav class="flex flex-wrap justify-center -mx-5 -my-2">
            <div class="px-5 py-2">
                <a href="/#about" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                    Mon Parcours
                </a>
            </div>
            <div class="px-5 py-2">
                <a href="/#contact" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                    Me Contacter
                </a>
            </div>
            <div class="px-5 py-2">
                <a href="/reservation" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                    Prendre RDV
                </a>
            </div>
        </nav>
    </div>
</footer>

</body>
</html>
