{% extends "base.mvc.php" %}

{% block title %}Home{% endblock %}

{% block body %}

<section class="bg-gray-100 text-gray-800">
    <div class="container flex flex-col justify-center p-6 mx-auto sm:py-12 lg:py-24 lg:flex-row lg:justify-between">
        <div class="flex flex-col justify-center p-6 text-center rounded-sm lg:max-w-md xl:max-w-lg lg:text-left">
            <h1 class="text-5xl font-bold sm:text-6xl">Bienvenue sur le site de
                <span class="text-emerald-400">Céline Allainmat</span>
            </h1>
            <p class="mt-4 mb-6 text-lg sm:mb-10">Je suis psychologue diplômée, spécialisée en [spécialité]. Avec plus de 30 années d'expérience, j'accompagne les individus dans leur parcours de vie en offrant un soutien professionnel et bienveillant.
                <br class="hidden md:inline lg:hidden"> Mon approche repose sur l'écoute active, l'empathie et des méthodes thérapeutiques adaptées à chaque situation.
            </p>
            <div class="flex flex-col space-y-4 sm:items-center sm:justify-center sm:flex-row sm:space-y-0 sm:space-x-4 lg:justify-start">
                <a rel="noopener noreferrer" href="/reservation" class="px-8 py-3 text-lg font-semibold rounded bg-emerald-400 text-gray-900 hover:bg-emerald-500">Prendre RDV</a>
                <a rel="noopener noreferrer" href="#" class="px-8 py-3 text-lg font-semibold border rounded border-emerald-400 hover:bg-emerald-400">Me contacter</a>
            </div>
        </div>
        <div class="flex items-center justify-center p-6 mt-4 lg:mt-0 h-80 sm:h-96 lg:h-[30rem] xl:h-[35rem] 2xl:h-[40rem]">
            <img src="/images/pia.png" alt="Photo de la psychologue" class="object-contain h-full">
        </div>
    </div>
</section>





    <section class="grid w-full grid-cols-1 gap-8 px-8 py-16 mx-auto rounded-lg md:grid-cols-2 md:px-12 lg:px-16 xl:px-32 bg-gray-200 text-gray-800">
	<div class="flex flex-col justify-between">
		<div class="space-y-2">
			<h2 class="text-4xl font-bold leadi lg:text-5xl">Me contacter</h2>
			<div class="text-gray-800">Souhaitez vous un renseignement ? Avez-vous une question ? <br/> N'hésitez pas !</div>
		</div>
		<img src="https://mambaui.com/assets/svg/doodle.svg" alt="" class="p-6 h-52 md:h-64">
	</div>
	<form novalidate="" class="space-y-6">
		<div>
			<label for="name" class="text-sm">Votre nom</label>
			<input id="name" type="text" placeholder="" class="w-full p-3 rounded bg-gray-100">
		</div>
		<div>
			<label for="email" class="text-sm">Votre Email</label>
			<input id="email" type="email" class="w-full p-3 rounded bg-gray-100">
		</div>
		<div>
			<label for="message" class="text-sm">Votre message</label>
			<textarea id="message" rows="3" class="w-full p-3 rounded bg-gray-100"></textarea>
		</div>
		<button type="submit" class="w-full p-3 text-sm font-bold tracki uppercase rounded bg-emerald-400 text-gray-900 hover:bg-emerald-500">Envoyez votre message</button>
	</form>
</section>

{% endblock %}