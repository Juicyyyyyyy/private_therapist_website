{% extends "base.mvc.php" %}

{% block title %}Réservation Confirmée{% endblock %}

{% block body %}
<div class="w-screen">
  <div class="relative mx-auto mt-20 mb-20 max-w-screen-lg overflow-hidden rounded-t-xl py-32 text-center shadow-xl shadow-gray-300">
    <h1 class="mt-2 px-8 text-3xl font-bold text-white md:text-5xl">Réservation Confirmée</h1>
    <p class="mt-6 text-lg text-white">Merci d'avoir pris rendez-vous avec Céline Allainmat. Vous recevrez un email de confirmation sous peu.</p>
    <img class="absolute top-0 left-0 -z-10 h-full w-full object-cover" src="https://images.unsplash.com/photo-1459664018906-085c36f472af?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Confirmation Background Image" />
  </div>

  <div class="mx-auto max-w-screen-lg px-6 pb-20 text-center">
    <a href="/" class="mt-8 inline-block rounded-full border-8 border-emerald-500 bg-emerald-600 px-10 py-4 text-lg font-bold text-white transition hover:translate-y-1">Retour à l'accueil</a>
  </div>
</div>
{% endblock %}
