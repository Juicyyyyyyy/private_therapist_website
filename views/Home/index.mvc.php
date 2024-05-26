{% extends "base.mvc.php" %}

{% block title %}Home{% endblock %}

{% block body %}

<section class="bg-gray-100 text-gray-800">
    <div class="container flex flex-col justify-center p-6 mx-auto sm:py-12 lg:py-24 lg:flex-row lg:justify-between">
        <div class="flex flex-col justify-center p-6 text-center rounded-sm lg:max-w-md xl:max-w-lg lg:text-left">
            <h1 class="text-5xl font-bold sm:text-6xl">Bienvenue sur le site de <br/>
                <span class="text-emerald-300">Céline Allainmat</span>
            </h1>
            <p class="mt-4 mb-6 text-lg sm:mb-10">Psychologue indépendante de plus de 30 ans d'expérience.
            </p>
            <div class="flex flex-col space-y-4 sm:items-center sm:justify-center sm:flex-row sm:space-y-0 sm:space-x-4 lg:justify-start">
                <a rel="noopener noreferrer" href="/reservation"
                   class="px-8 py-3 text-lg font-semibold rounded bg-emerald-300 text-gray-900 hover:bg-emerald-400">Prendre
                    RDV</a>
                <a rel="noopener noreferrer" href="/#contact"
                   class="px-8 py-3 text-lg font-semibold border rounded border-emerald-300 hover:bg-emerald-300">Me
                    contacter</a>
            </div>
        </div>
        <div class="flex items-center justify-center p-6 mt-4 lg:mt-0 h-80 sm:h-96 lg:h-[30rem] xl:h-[35rem] 2xl:h-[40rem]">
            <img src="/images/pia.png" alt="Photo de la psychologue" class="object-contain h-full">
        </div>
    </div>
</section>
<div class="bg-gray-200">
    <section class="sm:flex items-center max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-gray-200" id="about">
        <div class="sm:w-1/2 flex justify-center sm:justify-end mb-8 sm:mb-0">
            <img src="/images/therapist_3-removebg-preview.png" class="w-full  alt=" Therapist">
        </div>
        <div class="sm:w-1/2 sm:pl-12">
            <div class="text-center sm:text-left">
                <h2 class="text-4xl font-bold leadi lg:text-5xl">Mon <span class="text-emerald-300">parcours</span></h2>
                <p class="mt-4 mb-6 text-lg sm:mb-10 leading-relaxed">
                    Je suis psychologue diplômée, spécialisée en [spécialité]. Avec plus de 30 années d'expérience,
                    j'accompagne les individus dans leur parcours de vie en offrant un soutien professionnel et
                    bienveillant.
                    <br class="hidden md:inline lg:hidden"> Mon approche repose sur l'écoute active, l'empathie et des
                    méthodes thérapeutiques adaptées à chaque situation.
                </p>
            </div>
        </div>
    </section>
</div>


<section id="contact"
        class="grid w-full grid-cols-1 gap-8 px-8 py-16 mx-auto rounded-lg md:grid-cols-2 md:px-12 lg:px-16 xl:px-32 bg-gray-100 text-gray-800">
    <div class="flex flex-col justify-between">
        <img src="/images/therapist-removebg-preview.png" alt="" class="p-6 ">
    </div>
    <form class="space-y-6" action="/send_mail" method="POST">
        <?php if (!empty($errors)): ?>
            <div class="mb-4 text-red-500">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="space-y-2">
            <h2 class="text-4xl font-bold leadi lg:text-5xl">Me <span class="text-emerald-300">contacter</span></h2>
            <div class="text-gray-800">Souhaitez vous un renseignement ? Avez-vous une question ? <br/> N'hésitez pas !
            </div>
        </div>
        <div>
            <label for="name" class="text-sm">Votre nom</label>
            <input name="name" id="name" type="text" placeholder="" class="w-full p-3 rounded bg-white">
        </div>

        <div>
            <label for="first_name" class="text-sm">Votre prénom</label>
            <input name="first_name" id="first_name" type="text" placeholder="" class="w-full p-3 rounded bg-white">
        </div>
        <div>
            <label for="email" class="text-sm">Votre Email</label>
            <input name="email" id="email" type="email" class="w-full p-3 rounded bg-white">
        </div>
        <div>
            <label for="message" class="text-sm">Votre message</label>
            <textarea name="message" id="message" rows="3" class="w-full p-3 rounded bg-white"></textarea>
        </div>
        <button type="submit"
                class="w-full p-3 text-sm font-bold tracki uppercase rounded bg-emerald-300 text-gray-900 hover:bg-emerald-400">
            Envoyez votre message
        </button>
    </form>
</section>

{% endblock %}