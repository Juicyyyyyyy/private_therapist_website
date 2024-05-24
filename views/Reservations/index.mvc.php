{% extends "base.mvc.php" %}

{% block title %}Réservation{% endblock %}

{% block body %}

<div class="w-screen">
    <div class="relative mx-auto mt-20 mb-20 max-w-screen-lg overflow-hidden rounded-t-xl py-32 text-center shadow-xl shadow-gray-300">
        <h1 class="mt-2 px-8 text-3xl font-bold text-white md:text-5xl">Prenez un rendez-vous</h1>
        <p class="mt-6 text-lg text-white">Prenez rendez-vous avec Céline Allainmat, une psychologue expérimentée.</p>
        <img class="absolute top-0 left-0 -z-10 h-full w-full object-cover"
             src="https://images.unsplash.com/photo-1459664018906-085c36f472af?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
             alt=""/>
    </div>

    <div class="mx-auto grid max-w-screen-lg px-6 pb-20">

        <form action="/reservations/create" method="POST">
            <div class="">
                <p class="font-serif text-xl font-bold text-blue-900">Vos informations</p>
                <div class="mt-4 grid gap-4">
                    <input name="name" type="text"
                           class="block w-full rounded-lg border border-emerald-300 bg-emerald-50 p-2.5 text-emerald-800 placeholder:text-emerald-800 focus:ring focus:ring-emerald-300 sm:text-sm"
                           placeholder="Nom" required/>
                    <input name="first_name" type="text"
                           class="block w-full rounded-lg border border-emerald-300 bg-emerald-50 p-2.5 text-emerald-800 placeholder:text-emerald-800 focus:ring focus:ring-emerald-300 sm:text-sm"
                           placeholder="Prénom" required/>
                    <input name="email" type="email"
                           class="block w-full rounded-lg border border-emerald-300 bg-emerald-50 p-2.5 text-emerald-800 placeholder:text-emerald-800 focus:ring focus:ring-emerald-300 sm:text-sm"
                           placeholder="Email" required/>
                    <textarea name="context"
                              class="block w-full rounded-lg border border-emerald-300 bg-emerald-50 p-2.5 text-emerald-800 placeholder:text-emerald-800 focus:ring focus:ring-emerald-300 sm:text-sm"
                              placeholder="Contexte de la prise de rendez-vous" required></textarea>
                </div>
            </div>

            <div class="">
                <p class="mt-8 font-serif text-xl font-bold text-blue-900">Sélectionnez une date</p>
                <div class="relative mt-4 w-56">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg aria-hidden="true" class="h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input name="date" datepicker="" datepicker-orientation="bottom" type="text"
                           class="datepicker-input block w-full rounded-lg border border-emerald-300 bg-emerald-50 p-2.5 pl-10 text-emerald-800 placeholder:text-emerald-800 focus:ring focus:ring-emerald-300 sm:text-sm"
                           placeholder="Sélectionnez une date" required/>
                </div>
            </div>

            <div class="">
                <p class="mt-8 font-serif text-xl font-bold text-blue-900">Sélectionnez une heure</p>
                <div class="mt-4">
                    <select name="time" id="time"
                            class="block w-full rounded-lg border border-emerald-300 bg-emerald-50 p-2.5 text-emerald-800 focus:ring focus:ring-emerald-300 sm:text-sm"
                            required>
                        <option value="">Sélectionnez une heure</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                        <option value="18:00">18:00</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="mt-8 w-56 rounded-full border-8 border-emerald-500 bg-emerald-600 px-10 py-4 text-lg font-bold text-white transition hover:translate-y-1">
                Réservez maintenant
            </button>
        </form>
    </div>
</div>
<script src="https://unpkg.com/flowbite@1.5.2/dist/datepicker.js"></script>

{% endblock %}
