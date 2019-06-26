<h2>Laravel App Builder</h2>
A simple laravel app to build other laravel apps using a frontend without executing composer commands.

<h2>Setup</h2>
<ul>
    <li>Clone this repository</li>
    <li>Recommended to use with a local development server (Must not be used on a live server as the commands traverse directory paths)        </li>
    <li>Run the app on the browser</li>
</ul>

<h2>Usage</h2>
Simply provide the app name, required version of Laravel and whether or not you are using the default authentication scaffold that comes with laravel. The project will be built outside the folder of the app. Therefore it is recommended to use a local development server such as xampp or wamp. Wait for the build and find the project outside the app directory.
The default migration will not be run due to the Laravel bug which exists in older MySQL versions.

<h2>To do</h2>
<ul>
    <li>Work around string length bug</li>
</ul>

