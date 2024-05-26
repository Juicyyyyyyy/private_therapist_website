{% extends "base.mvc.php" %}

{% block title %}Réservation{% endblock %}

{% block body %}

<section class="w-screen">
    <div class="relative mx-auto mt-20 mb-20 max-w-screen-lg overflow-hidden rounded-t-xl py-32 text-center shadow-xl shadow-gray-300">
        <h1 class="mt-2 px-8 text-3xl font-bold text-white md:text-5xl">Prenez un rendez-vous</h1>
        <p class="mt-6 text-lg text-white">Prenez rendez-vous avec Céline Allainmat, une psychologue expérimentée.</p>
        <img class="absolute top-0 left-0 -z-10 h-full w-full object-cover"
             src="https://images.unsplash.com/photo-1459664018906-085c36f472af?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
             alt=""/>
    </div>

    <div class="mx-auto grid max-w-screen-lg px-6 pb-20">
        <div class="mb-10">
            <p class="font-serif text-xl font-bold text-blue-900">Adresse du rendez-vous</p>
            <p class="mt-2 text-lg text-blue-900">123 Rue de la Psychologie, 75000 Paris, France</p>
            <div class="mt-4 w-full h-64 rounded-lg border border-emerald-300">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.999021332482!2d2.348391315674745!3d48.85661407928795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e671d8772c6b6b%3A0x2b0c527b54bb9bc8!2s123%20Rue%20de%20la%20Psychologie%2C%2075000%20Paris%2C%20France!5e0!3m2!1sen!2sus!4v1595273154564!5m2!1sen!2sus"
                    width="100%"
                    height="100%"
                    frameborder="0"
                    style="border:0;"
                    allowfullscreen=""
                    aria-hidden="false"
                    tabindex="0">
                </iframe>
            </div>
        </div>

        <form action="/reservations/create" method="POST">
            <?php if (!empty($errors)): ?>
                <div class="mb-4 text-red-500">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
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

            <button type="submit"
                    class="mt-8 w-56 rounded-full border-8 border-emerald-500 bg-emerald-600 px-10 py-4 text-lg font-bold text-white transition hover:translate-y-1">
                Réservez maintenant
            </button>
        </form>
    </div>
</section>

<script src="https://unpkg.com/flowbite@1.5.2/dist/datepicker.js"></script>
{% endblock %}
