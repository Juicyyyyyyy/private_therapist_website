{% extends "base.mvc.php" %}

{% block title %}Mail de Contact Reçu{% endblock %}

{% block body %}
<div class="w-screen">
  <div class="relative mx-auto mt-20 mb-20 max-w-screen-lg overflow-hidden rounded-t-xl py-32 text-center">
    <h1 class="mt-2 px-8 text-3xl font-bold text-gray-800 md:text-5xl">Mail de Contact Reçu</h1>
    <p class="mt-6 text-lg text-gray-800">Merci de m'avoir contactée, votre message a bien été reçu et je vous répondrais d'ici peu.</p>
    <img class="absolute top-0 left-0 -z-10 h-full w-full object-cover opacity-50" src="/images/therapist_4.png" alt="Contact Confirmation Background Image" />
  </div>

  <div class="mx-auto max-w-screen-lg px-6 pb-20 text-center">
    <a href="/" class="mt-8 inline-block rounded-full border-8 border-emerald-500 bg-emerald-600 px-10 py-4 text-lg font-bold text-white transition hover:translate-y-1">Retour à l'accueil</a>
  </div>
</div>
{% endblock %}
