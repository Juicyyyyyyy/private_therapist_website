{% extends "base_admin.mvc.php" %}

{% block title %}Reservations{% endblock %}

{% block body %}
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-semibold text-gray-700 mb-4">Reservations</h1>

    <!-- Create Reservation Form -->
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-2xl font-bold mb-4">Create Reservation</h2>
        <form action="/reservations/createReservation" method="post">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" placeholder="Name">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">First Name</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="first_name" name="first_name" type="text" placeholder="First Name">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Email">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="context">Context</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="context" name="context" type="text" placeholder="Context">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="date">Date</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="date" name="date" type="text" placeholder="MM/DD/YYYY">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="time">Time</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="time" name="time" type="text" placeholder="HH:MM">
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Create Reservation
                </button>
            </div>
        </form>
    </div>

    <!-- Display Reservations -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">First Name</th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Context</th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                {% foreach ($reservations as $reservation): %}
                <tr>
                    <td class="px-6 py-4 border-b border-gray-200">{{ reservation["name"] }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{ reservation["first_name"] }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{ reservation["email"] }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{ reservation["context"] }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{ reservation["date"] }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{ reservation["time"] }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">
                        <a href="/reservations/{{ reservation['id'] }}/edit_reservation" class="text-blue-600 hover:text-blue-900">Edit</a>
                        <form action="/reservations/{{ reservation['id'] }}/delete" method="post" class="inline">
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
                {% endforeach; %}
            </tbody>
        </table>
    </div>
</div>
{% endblock %}
