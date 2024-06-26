{% extends "base.mvc.php" %}

{% block title %}Register{% endblock %}

{% block body %}

<main class="bg-white rounded-lg py-5">
    <div class="container flex flex-col mx-auto bg-white rounded-lg my-5">
        <div class="flex justify-center w-full h-full my-auto xl:gap-14 lg:justify-normal md:gap-5 draggable">
            <div class="flex items-center justify-center w-full lg:p-12">
                <div class="flex items-center xl:p-10">
                    <form class="flex flex-col w-full h-full pb-6 text-center bg-white rounded-3xl"
                          action="/authentication/register" method="post">
                        <h3 class="mb-3 text-4xl font-extrabold text-dark-grey-900">Register</h3>
                        <p class="mb-4 text-grey-700">Create your account</p>

                        <?php if (!empty($errors)): ?>
                            <div class="mb-4 text-red-500">
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li><?= htmlspecialchars($error) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <label for="username" class="mb-2 text-sm text-start text-grey-900">Username*</label>
                        <input name="username" id="username" placeholder="Enter your username"
                               class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 mb-7 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"/>

                        <label for="email" class="mb-2 text-sm text-start text-grey-900">Email*</label>
                        <input name="email" id="email" type="email" placeholder="mail@example.com"
                               class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 mb-7 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"/>

                        <label for="password" class="mb-2 text-sm text-start text-grey-900">Password*</label>
                        <input name="password" id="password" type="password" placeholder="Enter a password"
                               class="flex items-center w-full px-5 py-4 mb-5 mr-2 text-sm font-medium outline-none focus:bg-grey-400 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"/>

                        <label for="password2" class="mb-2 text-sm text-start text-grey-900">Password Confirmation*</label>
                        <input name="password2" id="password2" type="password" placeholder="Confirm your password"
                               class="flex items-center w-full px-5 py-4 mb-5 mr-2 text-sm font-medium outline-none focus:bg-grey-400 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"/>

                        <button class="w-full px-6 py-5 mb-5 text-sm font-bold leading-none text-black transition duration-300 md:w-96 rounded-2xl hover:bg-purple-blue-600 focus:ring-4 focus:ring-purple-blue-100 bg-purple-blue-500">
                            Sign Up
                        </button>
                        <p class="text-sm leading-relaxed text-grey-900">Already have an account? <a href="/login"
                                                                                                     class="font-bold text-grey-700">Sign
                            In</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

{% endblock %}
