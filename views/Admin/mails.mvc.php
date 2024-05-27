{% extends "base_admin.mvc.php" %}

{% block title %}Mails{% endblock %}

{% block body %}
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-semibold text-gray-700 mb-4">Mails</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">First Name</th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Time</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                {% foreach ($mails as $mail): %}
                <tr>
                    <td class="px-6 py-4 border-b border-gray-200">{{ mail["name"] }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{ mail["first_name"] }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{ mail["email"] }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{ mail["message"] }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{ mail["datetime"] }}</td>
                </tr>
                {% endforeach; %}
            </tbody>
        </table>
    </div>
</div>
{% endblock %}
